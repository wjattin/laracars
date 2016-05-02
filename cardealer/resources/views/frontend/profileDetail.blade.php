@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">

                    <div class="large-6 medium-6 columns">
                        <h1>Profile Details</h1>
                        {!! $user->created_at !!}
                        <h4>{!! $profiles->first !!} {!! $profiles->last !!} </h4>
                        <h5>{!! $profiles->phone1 !!} {!! $profiles->phone2 !!} </h5>
                        <h5>{!! $profiles->email !!} {!! $profiles->dealers_id !!} </h5>
                        {!! $tempLogin = (isset($login->username)?$login->username:'' ); !!}
                        {!! $tempPass = (isset($login->password)?$login->password:'' ); !!}

                        <hr>
                        {!! Form::open(array('url' => '/createLogin', 'data-abide' => '')) !!}
                        <div class="form-field" >
                            {!! Form::label('username','Username') !!}

                            {!! Form::text('username',$tempLogin, array('class' => '')) !!}
                        </div>
                        <div class="form-field" >
                            {!! Form::label('password','Password') !!}

                            {!! Form::text('password',$tempPass, array('class' => '')) !!}
                        </div>
                            {!! Form::text('profile_id',$profiles->id, array('class' => 'form-control')) !!}
                        <div class="form-group">
                            {!! Form::submit('Save', array('class' => 'button')) !!}
                        </div>
                            {!! Form::close() !!}

                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop