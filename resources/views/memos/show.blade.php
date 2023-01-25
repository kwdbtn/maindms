@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5>
                <strong><i class="fa fa-sliders" aria-hidden="true"></i>&nbsp; Toolbar</strong>
                <div class="float-end d-grid gap-2 d-md-block">
                    <a class="btn btn-sm btn-dark" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</a>
                    @if ($memo->status == "Draft")
                        <a href="{{ route('memos.edit', $memo) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit</a>
                    @endif
                    <a class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Minute Memo</a>
                    <a href="{{ route('memos.index') }}" class="btn btn-sm btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</a>
                </div>
            </h5>
        </div>
    </div>
    <div class="card">
        <div id="printableArea" class="card-body">
            <h2>
                <strong>Memo</strong>
            </h2>
            <span><strong>TO:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $memo->to()->job_title }}</span><br>
            <span><strong>FROM:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $memo->from()->job_title }}</span><br>
            <span><strong>DATE:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $memo->date }}</span><br>
            <span><strong>FILE NO.: &nbsp;&nbsp;</strong>{{ $memo->file_no }}</span><br>
            <span><strong>SUBJECT:</strong>&nbsp;<strong> {{ $memo->subject }}</strong></span><br><br>

            {!! $memo->body !!}
            <br>

            <strong>SIGNED</strong><br>
            {{ $memo->from()->name }} <br>
            <strong>{{ $memo->from()->job_title }}</strong><br><br>

            cc: <span>
                    @foreach ($memo->carbon_copies as $cc)
                        {{ $cc->job_title }} <br> &nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </span>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Minute Memo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'foo/bar']) !!}
            <div class="form-group row">
                {!! Form::label('body', 'Body:', ['class' => 'control-label col-sm-2 text-end']) !!}
                <div class="col-sm-10">
                    {!! Form::textArea('body', null, ['class'=>'form-control col-md-12 col-xs-12 summernote']) !!}
                </div>
            </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

@endsection