@extends('layouts.app')

@section('title', "Category | View")

@section('crumbs')
<div class="bg-warning py-3">
    <div class="container">
        <h5 class="mb-0">All Categories</h5>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div id="vue-app">
        <frontend-category-component></frontend-category-component>
    </div>
</div>

@endsection
