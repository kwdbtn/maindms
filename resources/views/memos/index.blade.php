@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>Memos</strong>
                <span class="float-right"><a href="{{ route('memos.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
            </h4>
            <hr>
            <div class="table-responsive table-striped">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">From</th>
                            <th scope="col">File No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($memos->isEmpty())
                            @else @foreach ($memos as $memo)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $memo->from()->name }}</td>
                                <td>{{ $memo->file_no }}</td>
                                <td>{{ $memo->date }}</td>
                                <td class="text-center">
                                    <a href="{{ route('memos.show', $memo) }}"
                                    class="btn btn-sm btn-outline-primary">View</a>
                                    <a href="{{ route('memos.edit', $memo) }}"
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