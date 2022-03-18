@extends('layouts.app')

@section('title', "Sub Category | View")

@section('crumbs')
<div class="bg-warning py-3">
    <div class="container">
        <h5 class="mb-0">All Sub Categories</h5>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div id="vue-app">
        <frontend-sub-category-component
            id="{{ $id }}"
        ></frontend-sub-category-component>
    </div>
</div>

@endsection
