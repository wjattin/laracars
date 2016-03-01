@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">

                    <div class="large-6 medium-6 columns">
                        <h1>Profile Details</h1>

                        @foreach($profiles as $profile)
                            <h4>{!! $profile->first !!} {!! $profile->last !!} </h4>
                            <h5>{!! $profile->phone1 !!} {!! $profile->phone2 !!} </h5>
                            <h5>{!! $profile->email !!} {!! $profile->dealers_id !!} </h5>

                            <hr>
                            {!! Form::open(array('url' => '/createLogin', 'data-abide' => '')) !!}
                            <div class="form-field" >
                                {!! Form::label('username','Username') !!}

                                {!! Form::text('username','', array('class' => '')) !!}
                            </div>
                            <div class="form-field" >
                                {!! Form::label('password','Password') !!}

                                {!! Form::text('password','', array('class' => '')) !!}
                            </div>
                            {!! Form::text('profile_id',$profile->id, array('class' => 'form-control')) !!}
                            <div class="form-group">
                                {!! Form::submit('Save', array('class' => 'button')) !!}
                            </div>
                            {!! Form::close() !!}
                        @endforeach

                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop