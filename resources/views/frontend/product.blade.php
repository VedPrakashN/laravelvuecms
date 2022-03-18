@extends('layouts.app')

@section('title', "All Product | View")

@section('crumbs')
<div class="bg-warning py-3">
    <div class="container">
        <h5 class="mb-0">All Products</h5>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div id="vue-app">
        <frontend-product-component
            id="{{ $id }}"
        ></frontend-product-component>
    </div>
</div>

@endsection
