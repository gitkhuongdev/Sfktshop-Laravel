@extends('layoutAdmin')
@section('title', 'List Categoies')
@section('adminContent')
<div class="container py-5">
    <h1>Update category</h1>
    <form action="{{route('category.update', $category->id )}}" method="post">
        @csrf
        @method('PATCH')
        <div class="col-12 ">
            <div class="form-group mb-4">
                <label for="name" class="">Categories Name *</label>
                <input type="text" name="name" class="form-control" required value="{{$category->name}}">
                <hr>
                <label for="status" class="">Status *</label>
                <div class="d-flex gap-3">
                    <label>
                        <span class="text-warning fw-medium">Show</span>
                        <input type="radio" name="status" value="1"
                            {{ old('status', $category->status) == 1 ? 'checked' : '' }} required>
                    </label>
                    <label>
                        <span class="text-warning fw-medium">Hide</span>
                        <input type="radio" name="status" value="0"
                            {{ old('status', $category->status) == 0 ? 'checked' : '' }} required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark button text-bg-dark btn-dark">Update category</button>
        </div>
    </form>

</div>
@endsection