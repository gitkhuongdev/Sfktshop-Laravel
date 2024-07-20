@extends('layoutAdmin')
@section('title', 'List Products')
@section('adminContent')

<main class="content px-3 py-5">
    <div class="container">
        <div class="container-fluid">
            <h3 class="fw-bold fs-4 my-3">List Product</h3>
            <h6 class="text-danger">Total Product: {{count($listProduct)}}</h6>
            <div class="row">
                <div class="col-12 table-responsive">
                    <div>
                        <div colspan="6">
                            <select id="selLoai" class="py-1 px-3 shadow-none" onchange="filteeProduct(this.value)">
                                <option value="-1">Filter by Category</option>
                                @foreach ($listCategory as $item)
                                <option value="{{$item->id}}" {{$item->id == $idCategory? "selected":""}}>
                                    {{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            <script>
                            function filteeProduct(idCategory) {
                                document.location = `/admin/products?idCategory=${idCategory}`;
                            }
                            </script>
                        </div>
                    </div>
                    <table class="table table-striped ">
                        <thead>
                            <tr class="highlight text-center">
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Sale</th>
                                <th scope="col">Status</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($listProduct as $item)
                            <tr>
                                <td class="text-start overflow-hidden" style="width: 150px; height:70px;">
                                    {{$item->name}}</td>
                                <td><img src="{{$item->image_1}}" alt="{{$item->name}}"
                                        style="height: 100px; width: 80px;"></td>
                                <td>${{number_format($item->price,0)}}</td>
                                <td>{{$item->sale}}%</td>
                                <td class="text-danger">
                                    @if ($item->status == 1)
                                    Show
                                    @else
                                    Hide
                                    @endif
                                </td>
                                <td>{{$item->categories->name}}</td>
                                <td>{{$item->quantity}}</td>

                                <td>
                                    <a href="/admin/products/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- PAGINATION -->
        <div class="container d-flex justify-content-center mt-3">
            <div class="">{{$listProduct->links()}}</div>
        </div>
    </div>


</main>
@endsection