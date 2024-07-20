@extends('layoutAdmin')
@section('title', 'List Categoies')
@section('adminContent')

<main class="content px-3 py-5">
    <div class="container">

        <div class="container-fluid">
            <div class="mb-3">


                <h3 class="fw-bold fs-4 my-3">List Category</h3>
                <h6 class="text-danger">Total Categories: {{count($listCategories)}}</h6>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr class="highlight text-center">
                                    <th scope="col">Numerical order</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($listCategories as $item)

                                <tr>
                                    <th>{{ $item->numericalOrder}}</th>
                                    <td>{{$item->name}}</td>
                                    <td class="text-danger">
                                        @if ($item->status == 1)
                                        Show
                                        @else
                                        Hide
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center gap-3">
                                        <a href="/admin/category/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                        <a href="/admin/category/{{$item->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection