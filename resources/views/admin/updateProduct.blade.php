@extends('layoutAdmin')
@section('title')
Edit Product {{$product->name}}
@endsection
@section('adminContent')
<div class="container py-5">
    <h1>Edit Product </h1>

    <form action="/admin/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- This line is crucial for the form to be treated as a PUT request -->
        <div class="col-12">
            <div class="form-group mb-4">
                <div class="py-2">
                    <label class="text-decoration-underline" for="name">Product Name:</label>
                    <input type="text" id="name" name="name" value="{{ $product->name }}" required class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="idCategory">Category:</label>
                    <select id="idCategory" name="idCategory" required class="form-control">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->idCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="price">Price:</label>
                    <input type="number" id="price" name="price" value="{{ $product->price }}" required
                        class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="sale">Sale:</label>
                    <input type="number" id="sale" name="sale" value="{{ $product->sale }}" class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="image_1">Image 1:</label>
                    <input type="file" id="image_1" name="image_1" class="form-control">
                    @if($product->image_1)
                    <img src="{{ $product->image_1 }}" alt="Image 1" width="100">
                    @endif
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="image_2">Image 2:</label>
                    <input type="file" id="image_2" name="image_2" class="form-control">
                    @if($product->image_2)
                    <img src="{{ $product->image_2 }}" alt="Image 2" width="100">
                    @endif
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="image_3">Image 3:</label>
                    <input type="file" id="image_3" name="image_3" class="form-control">
                    @if($product->image_3)
                    <img src="{{ $product->image_3 }}" alt="Image 3" width="100">
                    @endif
                </div>
                <div class="d-flex gap-3 py-2">
                    <label for="hot" class="text-decoration-underline">Product Hot:</label>
                    <label>
                        <span class="text-warning fw-medium">Hot</span>
                        <input type="radio" name="hot" value="1" {{ $product->hot == 1 ? 'checked' : '' }} required>
                    </label>
                    <label>
                        <span class="text-warning fw-medium">Not Hot</span>
                        <input type="radio" name="hot" value="0" {{ $product->hot == 0 ? 'checked' : '' }} required>
                    </label>
                </div>
                <div class="d-flex gap-3 py-2">
                    <label for="status" class="text-decoration-underline">Status:</label>
                    <label>
                        <span class="text-warning fw-medium">Show</span>
                        <input type="radio" name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}
                            required>
                    </label>
                    <label>
                        <span class="text-warning fw-medium">Hide</span>
                        <input type="radio" name="status" value="0" {{ $product->status == 0 ? 'checked' : '' }}
                            required>
                    </label>
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="color">Color:</label>
                    <input type="text" id="color" name="color" value="{{ $product->color }}" class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" required
                        class="form-control">
                </div>
                <div class="py-2">
                    <label class="text-decoration-underline" for="description">Description:</label>
                    <textarea id="description" name="description" required
                        class="form-control">{{ $product->description }}</textarea>
                </div>
                <button type="submit" class="mt-3 btn btn-outline-dark button text-bg-dark btn-dark">Update
                    Product</button>
            </div>
        </div>
    </form>

    <script>
    CKEDITOR.replace('description', {
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    </script>
</div>
@endsection