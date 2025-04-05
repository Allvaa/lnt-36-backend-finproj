@extends('layouts.app')

@section('title', 'Add New Employee')

@section('content')
    <div>
        <h2>Add New Employee</h2>
        <x-employee-form />
    </div>
    <x-form-error />
@endsection
