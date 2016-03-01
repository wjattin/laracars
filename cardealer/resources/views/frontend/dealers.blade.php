@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">
                    <div class="large-6 columns">

                    <hr>
                    {!! Form::open(array('url' => '/dealers', 'data-abide' => '')) !!}
                    <div class="name-field">
                    {!! Form::label('location_name','Location Name') !!}
                    {!! Form::text('location_name','', array('class' => 'form-control', 'required' => 'true')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Address') !!}
                    {!! Form::text('address1','', array('class' => 'form-control')) !!}
                        <br>
                    {!! Form::text('address2','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('City') !!}
                    {!! Form::text('city','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('State') !!}
                    {!! Form::text('state','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Zip') !!}
                    {!! Form::text('zip','', array('class' => 'form-control')) !!}
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
                    {!! Form::label('email') !!}
                    {!! Form::text('email','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::submit('Save Dealer', array('class' => 'button')) !!}
                    </div>
                    {!! Form::close() !!}
</div>
                    <div class="large-6 columns">
                        <h1>Dealers</h1>

                        @foreach($dealers as $dealer)
                            <h4>{!! $dealer->location_name !!}</h4>
                            <h6>{!! $dealer->address1 !!} {!! $dealer->address2 !!}
                                {!! $dealer->city !!}, {!! $dealer->state !!} {!! $dealer->zip !!}
                                <br>
                                <em>{!! $dealer->phone1 !!}</em>
                                </h6>
                            <hr>
                        @endforeach

                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop