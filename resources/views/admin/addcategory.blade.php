@extends('layoutAdmin')
@section('title', 'Add Categoies')
@section('adminContent')

<div class="container py-5">
    <h1>Add category</h1>
    <form action="/admin/category" method="post">
        @csrf

        <div class="col-12 ">
            <div class="form-group mb-4">
                <label for="name" class="text-decoration-underline">Categories Name *</label>
                <input type="text" name="name" class="form-control" required>
                <hr>
                <label for="status" class="text-decoration-underline">Status *</label>
                <div class="d-flex gap-3">
                    <label>
                        <span class="text-warning fw-medium">Show</span>
                        <input type="radio" name="status" value="1" required>
                    </label>
                    <label>
                        <span class="text-warning fw-medium">Hide</span>
                        <input type="radio" name="status" value="0" required>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark button text-bg-dark btn-dark">Add category</button>
        </div>
    </form>

</div>
@endsection