@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <strong><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp; {{ $memo->exists ? "Editing '".$memo->file_no."'" : "Memo" }}</strong>
                        <span>
                            <a href="{{ route('memos.index') }}" class="btn btn-sm btn-dark float-end"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</a>
                        </span>
                    </h4>
                    <hr>

                    {!! Form::model($memo, ['method' => $memo->exists ? 'PUT' : 'POST', 
                    'route' => $memo->exists ? ['memos.update', $memo] : ['memos.store'],
                    'class' => 'form-horizontal'])
                    !!}

                    <div class="form-group row">
                        {!! Form::label('sender', 'Sender:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-10">
                            {{Form::select('sender', $senders, null, ['class' => 'form-control col-md-10 col-xs-10'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('recipient', 'Recipient:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-10">
                            {{Form::select('recipient', $arr['users'], null, ['class' => 'form-control col-md-10 col-xs-10'])}}
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                        {!! Form::label('carbon_copies', 'CC:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-10">
                        {!! Form::select('carbon_copies[]',$arr['users'],isset($memo->carbon_copies) ? $memo->carbon_copies->pluck('id')->toArray() : null,['class'=>'form-control col-md-10 col-xs-12 select2', 'multiple']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                            {!! Form::label('date', 'Date:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-10">
                            <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                {!! Form::text('date', null, ['class'=>'form-control datetimepicker-input col-md-10 col-xs-12','placeholder'=>'Date', 'data-target'=>'#datetimepicker7', 'data-toggle'=>"datetimepicker", 'required']) !!}
                                <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                    <div class="input-group-text form-control"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('file_no', 'File No.:', ['class' => 'control-label col-sm-2 text-end'])
                        !!}
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('file_no', null,['class'=>'form-control col-md-10 col-xs-8
                            ','placeholder'=>'File No.', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('subject', 'Subject:', ['class' => 'control-label col-sm-2 text-end'])
                        !!}
                        <div class="col-sm-12 col-md-10">
                            {!! Form::text('subject', null,['class'=>'form-control col-md-10 col-xs-8
                            ','placeholder'=>'Subject', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('body', 'Body:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-10">
                            {!! Form::textArea('body', null, ['class'=>'form-control col-md-12 col-xs-12 summernote']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-2 mt-1">
                            <button type="submit" class="btn btn-dark">{{ $memo->exists ? @"Update" : @"Save" }}</button>

                            @if ($memo->status == 'Draft' && auth()->user()->id == $memo->sender)
                                <button type="submit" name="send" class="btn btn-dark">Send</button>
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection