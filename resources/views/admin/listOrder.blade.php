@extends('layoutAdmin')
@section('title', 'List Orders')
@section('adminContent')
<main class="content px-3 py-5">
    <div class="container">
        <div class="container-fluid">
            <div class="mb-3">
                <h3 class="fw-bold fs-4 my-3">List Orders</h3>
                <h6 class="text-danger">Total Order: {{ count($listOrder) }}</h6>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="highlight text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Money</th>
                                    <th scope="col">Order by</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($listOrder as $item)
                                <tr class="table-{{ 
                                        ($item->status == 'Success') ? 'success' : 
                                        (($item->status == 'Cancel') ? 'danger' : 
                                        (($item->status == 'Prepare') ? 'secondary' : 
                                        (($item->status == 'Shipping') ? 'primary' : 'warning'))) 
                                    }}">
                                    <th>{{ $item->id }}</th>
                                    <td>{{ $item->total_quantity }}</td>
                                    <td>${{ number_format($item->total_money) }}</td>
                                    <td>{{ $item->user_fullname }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td class="d-flex justify-content-center gap-3">
                                        <a href="/admin/orders/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="container d-flex justify-content-center mt-3">
                    <div class="">{{$listOrder->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection