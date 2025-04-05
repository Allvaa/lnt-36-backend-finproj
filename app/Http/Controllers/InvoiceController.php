<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|min:10|max:100',
            'postal_code' => 'required|regex:/^\\d{5}$/',
            'quantities' => 'required|array',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->withErrors('Keranjang kosong.');
        }

        $total = 0;
        $items = [];

        DB::beginTransaction();
        try {
            foreach ($cart as $item) {
                $qty = $request->input("quantities.{$item['product_id']}", $item['qty']);
                $product = Product::find($item['product_id']);
                if (!$product || $product->stock < $qty) {
                    throw new \Exception("Stok tidak cukup untuk {$item['name']}");
                }

                $product->decrement('stock', $qty);

                $subtotal = $qty * $product->price;
                $total += $subtotal;

                $items[] = [
                    'product_id' => $item['product_id'],
                    'product_name' => $product->name,
                    'quantity' => $qty,
                    'subtotal' => $subtotal,
                ];
            }

            $invoice = Invoice::create([
                'user_id' => Auth::id(),
                'invoice_number' => $this->generateInvoiceNumber(),
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'total_price' => $total,
            ]);

            foreach ($items as $item) {
                $item['invoice_id'] = $invoice->id;
                InvoiceItem::create($item);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('invoices.show', $invoice->id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    private function generateInvoiceNumber()
    {
        return 'INV-' . strtoupper(Str::random(8));
    }
}
