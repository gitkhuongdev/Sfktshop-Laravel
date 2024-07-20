@extends('layoutAdmin')
@section('title', 'Dashboard')
@section('adminContent')

<section class="container">
    @if(session()->has('warn'))
    <div class="alert alert-warning p-2 text-center rounded-0">
        {!! session('warn') !!}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger p-2 text-center rounded-0">
        {!! session('error') !!}
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success p-2 text-center rounded-0">
        {!! session('success') !!}
    </div>
    @endif
</section>
<div class="container py-5">
    <h1 class="text-center py-5">Dashboard</h1>

    <div class="d-flex gap-4">
        <a href="admin/category/create" class="btn btn-outline-dark btn-warning">Add category</a>
        <a href="admin/products/create" class="btn btn-outline-dark btn-danger">Add product</a>
        <a href="admin/products/create" class="btn btn-outline-dark btn-success">Manage Orders</a>
        <a href="admin/products/create" class="btn btn-outline-dark btn-pinterest">Manage comments</a>
    </div>

    <div class="row py-5">
        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th>Total Categories</th>
                        <th>Total Products</th>
                        <th>Total Orders</th>
                        <th>Total Comments</th>
                        <th>Incoms</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $categoryCount }}</td>
                        <td>{{ $productCount }}</td>
                        <td>{{ $orderCount }}</td>
                        <td>{{ $commentCount }}</td>
                        <td>${{number_format($revenue) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection