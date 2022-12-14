@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <strong>{{ $user->exists ? "On behalf of for '".$user->name."'" : "On behalf of" }}</strong>
                        <span>
                            {{-- <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-dark float-end">Back</a> --}}
                        </span>
                    </h4>
                    <hr>

                    {!! Form::model($user, ['method' => $user->exists ? 'PUT' : 'POST', 
                    'route' => $user->exists ? ['users.update', $user] : ['users.store'],
                    'class' => 'form-horizontal'])
                    !!}

                    <div class="form-group row">
                        {!! Form::label('name', 'Officer:', ['class' => 'control-label col-sm-2 text-end'])
                        !!}
                        <div class="col-sm-8 col-md-8">
                            {!! Form::text('name', null,['class'=>'form-control col-md-7 col-xs-8
                            ','placeholder'=>'User', 'required', 'disabled']) !!}
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                        {!! Form::label('onbehalf', 'On behalf:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8 col-md-8">
                            {!! Form::select('onbehalf[]',$arr['users'],isset($user->onbehalf) ? $user->onbehalf->pluck('id')->toArray() : null,['class'=>'form-control col-md-7 col-xs-12 select2', 'multiple']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-2 mt-2">
                            <button type="submit" class="btn btn-dark">{{ $user->exists ? @"Assign" : @"Create" }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection