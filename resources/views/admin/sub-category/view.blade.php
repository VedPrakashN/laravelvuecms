@extends('layouts.master')

@section('title', "Sub Category | View")

@section('crumbs')
<div class="bg-warning py-2">
    <div class="container">
        <ol class="breadcrumb bg-warning breadcrumb-alt">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/sub-category">Sub Category</a>
            </li>
            <li class="breadcrumb-item text-capitalize active"> List</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div id="vue-app">
        <sub-category-table-component></sub-category-table-component>
    </div>
</div>

@endsection
