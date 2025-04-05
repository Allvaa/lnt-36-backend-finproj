@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div>
        <h2>Edit Employee</h2>
        <x-employee-form :employee=$employee />
    </div>
    <x-form-error />
@endsection
