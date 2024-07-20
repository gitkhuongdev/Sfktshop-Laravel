@extends('layoutAdmin')
@section('title', 'Update Order')
@section('adminContent')
<div class="container py-5">
    <h1>Update Order</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="col-12">
            <div class="form-group mb-4">
                <label for="name" class="">Order ID *</label>
                <input type="text" name="name" class="form-control" required value="{{ $order->id }}" readonly>
                <hr>
                <label for="status" class="">Status *</label>
                <select name="status" class="form-select">
                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Prepare" {{ $order->status == 'Prepare' ? 'selected' : '' }}>Prepare</option>
                    <option value="Shipping" {{ $order->status == 'Shipping' ? 'selected' : '' }}>Shipping</option>
                    <option value="Success" {{ $order->status == 'Success' ? 'selected' : '' }}>Success</option>
                    <option value="Cancel" {{ $order->status == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark button text-bg-dark btn-dark">Update Order</button>
        </div>
    </form>
</div>
@endsection