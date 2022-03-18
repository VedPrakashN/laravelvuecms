@extends('layouts.master')

@section('title', "Sub Category | $scope")

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
            <li class="breadcrumb-item text-capitalize active"> {{ $scope }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div id="vue-app">
        <sub-category-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >
        </sub-category-form-component>
    </div>
</div>

@endsection
