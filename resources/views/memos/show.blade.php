@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>
                <strong>Memo</strong>
                <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                    <a href="{{ route('memos.index') }}" class="btn btn-sm btn-dark">Back</a>
                </div>
            </h1>
            <span><strong>TO:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $memo->to()->job_title }}</span><br>
            <span><strong>FROM:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $memo->from()->job_title }}</span><br>
            <span><strong>DATE:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $memo->date }}</span><br>
            <span><strong>FILE NO.: &nbsp;&nbsp;</strong>{{ $memo->file_no }}</span><br>
            <span><strong>SUBJECT:</strong>&nbsp;<strong> {{ $memo->subject }}</strong></span><br><br>

            {!! $memo->body !!}
            <br><br>

            {{ $memo->from()->name }} <br>
            <strong>{{ $memo->from()->job_title }}</strong>
        </div>
    </div>
    
</div>

@endsection