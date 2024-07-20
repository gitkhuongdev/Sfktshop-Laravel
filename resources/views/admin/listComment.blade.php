@extends('layoutAdmin')
@section('title', 'List Comment')
@section('adminContent')

<main class="content px-3 py-5">
    <div class="container">
        <div class="container-fluid">
            <div class="mb-3">
                <h3 class="fw-bold fs-4 my-3">List Comment</h3>
                <h6 class="text-danger">Total Comments: </h6>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="highlight text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Comment At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user_name }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td class="d-flex justify-content-center gap-3">
                                        <a href="/admin/comment/{{$comment->id}}" class="btn btn-danger">Delete</a>
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