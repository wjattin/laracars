@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">
                    <div class="reveal" id="vehicle-modal" data-reveal>
                    <div class="large-12 columns">

                    {!! Form::open(array('url' => '/vehicles', 'data-abide' => '')) !!}
                    <div class="name-field">
                        {!! Form::label('vin','Vin', array()) !!}
                        {!! Form::text('vin','', array('class' => 'form-control', 'required' => 'true','id' => 'vin')) !!}
                        <span id="decode" class="button small">Decode</span>
                    </div>
                    <div class="name-field">
                    {!! Form::label('make','Make') !!}
                    {!! Form::text('make','', array('class' => 'form-control', 'required' => 'true','id' => 'make')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('model','Model') !!}
                    {!! Form::text('model','', array('class' => 'form-control','id' => 'model')) !!}
                    </div>
                        <div class="form-group">
                    {!! Form::label('year','Year') !!}
                    {!! Form::text('year','', array('class' => 'form-control','id' => 'year')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('transmission','Transmission') !!}
                    {!! Form::text('transmission','', array('class' => 'form-control','id' => 'transmission')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('veh_condition', 'Condition (new/used)') !!}
                    {!! Form::text('veh_condition','', array('class' => 'form-control','id' => 'veh_condition')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('comments','Comments') !!}
                    {!! Form::textarea('comments','', array('class' => 'form-control','id' => 'comments')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price','Price') !!}
                        {!! Form::text('price','', array('class' => 'form-control','id'=>'price')) !!}
                    </div>
                    <div class="form-group">
                    <!-- {!! Form::label('dealers_id') !!} -->
                    {!! Form::hidden('dealers_id',$dealer, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::submit('Save Vehicle', array('class' => 'button')) !!}
                    </div>
                    {!! Form::close() !!}
</div>    <button class="close-button" data-close aria-label="Close modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <div class="large-12 columns">
                        <h1>My Vehicles</h1>
                        @if($dealer != "")

                            <a href="#" class="button row" data-open="vehicle-modal" >Add new vehicle <i class="fi-plus"></i></a>

                        @else
                            <hr>
                            <b>TO DO: </b> <a href="#" data-open="dealer-modal" >add new dealer</a>
                            <div class="alert callout" data-closable>
                                <h5>Remember to add your location to our <a href="/dealers">dealers list</a> and create a <a href="/profiles">profile.</a></h5>
                                <p>Your account will be limited and <b>you won't be able to add vehicles </b>until you create a <a href="/dealers">dealer</a> and a <a href="/profiles">buyer/seller profile.</a></p>
                                <a href="#">It's dangerous to go alone, take this.</a>
                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if($vehicles)

                            @foreach($vehicles as $vehicle)

                              <div class="row">
                                  <div class="large-6 columns"><h6 >
                                        {!! $vehicle->year !!}
                                        {!! $vehicle->make !!}
                                        {!! $vehicle->model !!}

                                    </h6>
                                  </div>
                            <div class="large-6 columns text-right"> <a href="/vehicleImages/{!! $vehicle->id !!}"><i class="fi-photo fi-large"></i> Add/Edit Vehicle and Images</a>
                                |
                                <a data-open="deleteVeh{!! $vehicle->id !!}">Delete Vehicle</a></div>
                                  </div>
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
                            @else
                            <hr>ain' got no'ing
                        @endif

                    </div>

            </div>
        </div>
<div class="reveal" id="dealer-modal" data-reveal>
    <div class="large-12 columns">
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
            {!! Form::hidden('login_id', $request->user()->id , array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save Dealer', array('class' => 'button')) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
        <!-- End Content -->
@stop
