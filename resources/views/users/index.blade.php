@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>Users</strong>
                <span class="float-right"><a href="{{ route('users.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
            </h4>
            <hr>
            <div class="table-responsive table-striped">
                <table class="table table-bordered table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            @else @foreach ($users as $user)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('users.show', $user) }}"
                                    class="btn btn-sm btn-outline-primary">View</a>
                                    <a href="{{ route('users.edit', $user) }}"
                                    class="btn btn-sm btn-outline-info">Edit</a>
                                </td>
                            </tr>
                            @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection