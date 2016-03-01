@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">
                    <div class="large-6 columns">

                    <hr>
                    {!! Form::open(array('url' => '/vehicles', 'data-abide' => '')) !!}
                    <div class="name-field">
                        {!! Form::label('vin','Vin') !!}
                        {!! Form::text('vin','', array('class' => 'form-control', 'required' => 'true')) !!}
                    </div>
                    <div class="name-field">
                    {!! Form::label('make','Make') !!}
                    {!! Form::text('make','', array('class' => 'form-control', 'required' => 'true')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('model','Model') !!}
                    {!! Form::text('model','', array('class' => 'form-control')) !!}
                    </div>
                        <div class="form-group">
                    {!! Form::label('year','Year') !!}
                    {!! Form::text('year','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('transmission','Transmission') !!}
                    {!! Form::text('transmission','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('veh_condition', 'Condition (new/used)') !!}
                    {!! Form::text('veh_condition','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('comments','Comments') !!}
                    {!! Form::textarea('comments','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price','Price') !!}
                        {!! Form::text('price','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('dealers_id') !!}
                    {!! Form::text('dealers_id','', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::submit('Save Vehicle', array('class' => 'button')) !!}
                    </div>
                    {!! Form::close() !!}
</div>
                    <div class="large-6 columns">
                        <h1>Vehicles</h1>

                        @foreach($vehicles as $vehicle)
                            <h6>
                                {!! $vehicle->year !!}
                                {!! $vehicle->make !!}
                                {!! $vehicle->model !!}
                                <a href="/vehicleImages/{!! $vehicle->id !!}"><i class="fi-photo fi-large"></i> Add/Edit Images</a>
                                |
                                <a data-open="deleteVeh{!! $vehicle->id !!}">Delete Vehicle</a>
                            </h6>
                            <div class="reveal text-center" id="deleteVeh{!! $vehicle->id !!}" data-reveal>
                                <h1 class="warning">Are you sure?</h1>
                                <p>
                                <a class="button" data-close aria-label="Close modal" >
                                    Cancel
                                </a>
                                <a class="button" href="/vehicles/{!! $vehicle->id !!}/delete">Delete</a>
                               </p>

                            </div>
                            <hr>
                        @endforeach

                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop
