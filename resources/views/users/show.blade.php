@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body pb-2">
                    <h6>
                        <strong><span style="color: red">|</span>{{ $user->name }}</strong>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-dark">Back</a>
                          </div>
                    </h6>
                    {{-- <small>{{ $outage->status }}</small> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-0">
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('onbehalf', 'On Behalf:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>
                                        @foreach ($user->onbehalf as $onbehalf)
                                            {!! Form::label('onbehalf', $onbehalf->name, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                        @endforeach
                                    </h6>
                                </div>
                            </div>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary float-end">Assign</a>
                            {{-- <hr> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection