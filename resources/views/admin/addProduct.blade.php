@extends('layoutAdmin')
@section('title', 'Add product')
@section('adminContent')
<div class="container py-5">
    <h1>Create New Product</h1>

    <form action="/admin/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12 ">
            <div class="form-group mb-4">
                <div class="py-2">
                    <label class="text-decoration-underline" for="name">Product Name:</label>
                    <input type="text" id="name" name="name" required class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="idCategory">Category:</label>
                    <select id="idCategory" name="idCategory" required class="form-control">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="price">Price:</label>
                    <input type="number" id="price" name="price" required class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="sale">Sale:</label>
                    <input type="number" id="sale" name="sale" class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="image_1">Image 1:</label>
                    <input type="file" id="image_1" name="image_1" required class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="image_2">Image 2:</label>
                    <input type="file" id="image_2" name="image_2" class="form-control">
                </div>

                <div class="py-2">
                    <label class="text-decoration-underline" for="image_3">Image 3:</label>
                    <input type="file" id="image_3" name="image_3" class="form-control">
                </div>

                <div class="d-flex gap-3 py-2">
                    <label for="status" class="text-decoration-underline">Product Hot:</label>

                    <label>
                        <span class="text-warning fw-medium">Hot</span>
                        <input type="radio" name="hot" value="1" required>
                    </label>
                    <label>
                        <span class="text-warning fw-medium">Not Hot</span>
                        <input type="radio" name="hot" value="0" required>
                    </label>
                </div>

                <div class="d-flex gap-3 py-2">
                    <label for="status" class="text-decoration-underline">Status:</label>
                    <label>
                        <span class="text-warning fw-medium">Show</span>
                        <input type="radio" name="status" value="1" required>
                    </label>
                    <label>
                        <span class="text-warning fw-medium">Hide</span>
                        <input type="radio" name="status" value="0" required>
                    </label>
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="color">Color:</label>
                    <input type="text" id="color" name="color" class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="description">Description:</label>
                    <textarea id="description" name="description" required class="form-control"></textarea>
                </div>
                <button type="submit" class="mt-3 btn btn-outline-dark button text-bg-dark btn-dark">Add
                    Product</button>
    </form>
</div>


<script>
CKEDITOR.replace('description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
</script>

</div>
@endsection