@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
<div class="container">

    <div class="row">
        <hr>
        <div class="large-4 medium-4 columns">
            <h5>
                {!! $vehicle[0]->year !!}
                {!! $vehicle[0]->make !!}
                {!! $vehicle[0]->model !!}

            </h5>

            <p>
                {!! nl2br($vehicle[0]->comments) !!}

            </p>
            <hr>


        </div>
        <div class="large-6 medium-6 columns">
            @if($vehicle[0]->dealers_id == $dealer)
                <a class="button" href="#" data-open="vehicle-modal" >Edit vehicle</a>
                <a class="button" data-open="deleteVeh{!! $vehicle[0]->id !!}">Delete Vehicle</a>
                <div class="reveal text-center" id="deleteVeh{!! $vehicle[0]->id !!}" data-reveal>
                    <h1 class="warning">Are you sure?</h1>
                    <p>
                        <a class="button" data-close aria-label="Close modal" >
                            Cancel
                        </a>
                        <a class="button" href="/vehicles/{!! $vehicle[0]->id !!}/delete">Delete</a>
                    </p>

                </div>
            @endif
            <h1>Images</h1>
            <div class="row imageGallery panel callout" style="background: #cccccc">
                @foreach($vehicleImages as $image)
                    <div class="large-4 columns text-center">
                        <a data-open="vehImage{!! $image->id  !!}">
                            <img class="thumbnail " src="{!! $image->file_name !!}" alt=""></a>


                    </div>
                    <div class="reveal" id="vehImage{!! $image->id  !!}" data-reveal>
                        <img class="thumbnail " src="{!! $image->file_name !!}" alt="">
                        <button class="close-button" data-close aria-label="Close modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endforeach

            </div>
            @foreach($vehicleImages as $image)
                <div class="large-4 columns text-center">
                    <span class="thumbnail">
                    <a data-open="vehImage{!! $image->id  !!}"> <img  src="{!! $image->file_name !!}" alt=""></a>

                    </span>
                    @if($vehicle[0]->dealers_id == $dealer)
                        <a class="deleteImage"> <i class="fi-x-circle large"></i> Delete</a> <a
                                class="deleteImageConfirm hide"
                                data-url="/vehicleImage/{!! $image->id !!}/delete"><strong><br>Are you sure?<br> [ YES ]</strong></a>
                    @endif

                </div>
                <div class="reveal" id="vehImage{!! $image->id  !!}" data-reveal>
                    <img class="thumbnail " src="{!! $image->file_name !!}" alt="">
                    <button class="close-button" data-close aria-label="Close modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
            @if($vehicle[0]->dealers_id == $dealer)

            {!! Form::open(array('url' => '/vehicleImages', 'data-abide' => '','files' => TRUE)) !!}
                {{--{!! Form::label('file_name','Image') !!}--}}
                <div class="hide">
                    <div class="image-field" id="image-field">

                        {!! Form::file('file_name[]', array('class' => 'button')) !!}
                    </div>
                </div>
                <div class="image-field">

                    {!! Form::file('file_name[]', array('class' => 'button')) !!}
                </div>
                <div class="image-fields"></div>
                <a class="addImage"><i class="fi-plus large"></i> add more images</a>
                {!! Form::hidden('vehicles_id',$vehicle[0]->id, array('class' => 'form-control')) !!}
                <div class="form-group">
                    {!! Form::submit('Upload', array('class' => 'button')) !!}
                </div>
                {!! Form::close() !!}


                <div class="reveal" id="vehicle-modal" data-reveal>
                    <div class="large-12 columns">

                        {!! Form::open(array('url' => '/vehicles/update', 'data-abide' => '')) !!}
                        <div class="name-field">
                            {!! Form::label('vin','Vin', array()) !!}
                            {!! Form::text('vin',$vehicle[0]->vin, array('class' => 'form-control', 'required' => 'true','id' => 'vin')) !!}
                            <span id="decode" class="button small">Decode</span>
                        </div>
                        <div class="name-field">
                            {!! Form::label('make','Make') !!}
                            {!! Form::text('make',$vehicle[0]->make, array('class' => 'form-control', 'required' => 'true','id' => 'make')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('model','Model') !!}
                            {!! Form::text('model',$vehicle[0]->model, array('class' => 'form-control','id' => 'model')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('year','Year') !!}
                            {!! Form::text('year',$vehicle[0]->year, array('class' => 'form-control','id' => 'year')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('transmission','Transmission') !!}
                            {!! Form::text('transmission',$vehicle[0]->transmission, array('class' => 'form-control','id' => 'transmission')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('veh_condition', 'Condition (new/used)') !!}
                            {!! Form::text('veh_condition',$vehicle[0]->veh_condition, array('class' => 'form-control','id' => 'veh_condition')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('comments','Comments') !!}
                            {!! Form::textarea('comments',$vehicle[0]->comments, array('class' => 'form-control','id' => 'comments')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price','Price') !!}
                            {!! Form::text('price',$vehicle[0]->price, array('class' => 'form-control','id'=>'price')) !!}
                        </div>
                        <div class="form-group">
                            <!-- {!! Form::label('dealers_id') !!} -->
                            {!! Form::hidden('dealers_id',$dealer, array('class' => 'form-control')) !!}
                            {!! Form::hidden('id',$vehicle[0]->id, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save Vehicle', array('class' => 'button')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <button class="close-button" data-close aria-label="Close modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

    </div>
</div>
<!-- End Content -->
@stop