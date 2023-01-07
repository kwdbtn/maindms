@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp; Memos</strong>
                <span class="float-right"><a href="{{ route('memos.create') }}" class="btn btn-sm btn-dark float-end"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add New</a></span>
            </h4>
            <hr>
            <div class="table-responsive table-striped">
                <table class="table table-sm table-borderless table-striped table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject</th>
                            @role('assistant')
                                <th scope="col">From</th>
                            @endrole
                            <th scope="col">To</th>
                            <th scope="col">File No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($memos->isEmpty())
                            @else @foreach ($memos as $memo)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $memo->subject }}</td>
                                @role('assistant')
                                    <td>{{ $memo->from()->name }}</td>
                                @endrole
                                <td>{{ $memo->to()->name }}</td>
                                <td>{{ $memo->file_no }}</td>
                                <td>{{ $memo->date }}</td>
                                @if ($memo->status == "Draft")
                                    <td><em>{{ $memo->status }}</em></td>
                                @else
                                    <td>{{ $memo->status }}</td>
                                @endif
                                <td class="text-center">
                                    <a title="View record" href="{{ route('memos.show', $memo) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @if ($memo->status == "Draft")
                                        <a title="Edit" href="{{ route('memos.edit', $memo) }}" class="btn btn-sm btn-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    @endif
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