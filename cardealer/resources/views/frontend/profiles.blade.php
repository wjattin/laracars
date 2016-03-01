@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">
                    <div class="large-6 medium-6 columns">

                    <hr>
                    {!! Form::open(array('url' => '/profiles', 'data-abide' => '')) !!}
                    <div class="name-field">
                    {!! Form::label('first','First Name') !!}
                    {!! Form::text('first','', array('class' => 'form-control', 'required' => 'true')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Last') !!}
                    {!! Form::text('last','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Primary Phone') !!}
                    {!! Form::text('phone1','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Secondary Phone') !!}
                    {!! Form::text('phone2','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Email') !!}
                    {!! Form::text('email','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('dealers_id') !!}
                    {!! Form::text('dealers_id','', array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::submit('Save Profile', array('class' => 'button')) !!}
                    </div>
                    {!! Form::close() !!}
</div>
                    <div class="large-6 medium-6 columns">
                        <h1>Profiles</h1>

                        @foreach($profiles as $profile)
                            <h4><a href="/profiles/{!! $profile->id !!}">{!! $profile->first !!} {!! $profile->last !!} </a></h4>

                            <hr>
                        @endforeach

                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop