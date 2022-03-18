@extends('layouts.app')

@section('title', "View Product")

@section('crumbs')
<div class="bg-warning py-3">
    <div class="container">
        <h5 class="mb-0">View Product</h5>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div id="vue-app">
        <frontend-view-product-component
            id="{{ $id }}"
        ></frontend-view-product-component>
    </div>
</div>

@endsection
