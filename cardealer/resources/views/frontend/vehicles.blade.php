@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">

                <div class="row">
                    @if($dealer != "")

                        @else
                        <hr>
                        <div class="alert callout" data-closable>
                            <h5>Remember to add your location to our <a href="/dealers">dealers list</a> and create a <a href="/profiles">profile.</a></h5>
                            <p>Your account will be limited until you create a dealer and a buyer/seller profile.</p>
                            <a href="#">It's dangerous to go alone, take this.</a>
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                        <h1>Vehicles</h1>

                        @foreach($vehicles as $vehicle)
                            <div class="row">
                                <div class="small-2 columns">
                            <a class="thumbnail" href="/vehicleImages/{!! $vehicle->id !!}">
                            @if($vehicle->images->first())
                                    <img class="" src="{{ $vehicle->images->first()['file_name']  }}" alt="">
                            @else
                                    <img class="" src="http://placehold.it/400x400?text=NO IMAGE" alt="">
                            @endif
                                </a>
                                    </div>
                                <div class="small-8 columns">
                            <h6><p>
                                {!! $vehicle->year !!}
                                {!! $vehicle->make !!}
                                {!! $vehicle->model !!}
                                    <br>
                                <small>  {!! substr($vehicle->comments, 0, 200)  !!} ...</small>
                                    <br>
                                    <em>Location: {!! $vehicle->dealer->city !!},
                                    {!! $vehicle->dealer->state !!}
                                    {!! $vehicle->dealer->location_name !!}
                                    <a target="_blank" href="https://www.google.com/maps/place/{!! $vehicle->dealer->address1 !!},+{!! $vehicle->dealer->city !!},+{!! $vehicle->dealer->state !!}+{!! $vehicle->dealer->zip !!}">
                                        View Map <i class="fi-map"></i>
                                    </a>
                                    </em>
                                </p>

                            </h6>

                         </div>
                                <div class="small-2 columns">
                                  <a class="comfortaa button alert expanded" href="/vehicleImages/{!! $vehicle->id !!}">$ {!!  number_format($vehicle->price)  !!}</a>

                                    <a class="button expanded" href="/vehicleImages/{!! $vehicle->id !!}"> View Details <i class="fi-magnifying-glass"></i></a>
                                </div>
                                </div>

                            <hr>
                        @endforeach
{{ $vehicles->links() }}
                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop
