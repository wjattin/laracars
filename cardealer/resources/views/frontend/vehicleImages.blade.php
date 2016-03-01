@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
<div class="container">

    <div class="row">
        <div class="large-6 medium-6 columns">
            <h5>
                {!! $vehicle[0]->year !!}
                {!! $vehicle[0]->make !!}
                {!! $vehicle[0]->model !!}
                Images
            </h5>
            <hr>
            {!! Form::open(array('url' => '/vehicleImages', 'data-abide' => '','files' => TRUE)) !!}
            {!! Form::label('file_name','Image') !!}
            <div class="image-field" id="image-field">

                {!! Form::file('file_name[]', array('class' => 'button')) !!}
            </div>
            <div class="image-fields"></div>
            <a class="addImage"><i class="fi-plus large"></i> add more images</a>
            {!! Form::text('vehicles_id',$vehicle[0]->id, array('class' => 'form-control')) !!}
            <div class="form-group">
                {!! Form::submit('Upload', array('class' => 'button')) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="large-6 medium-6 columns">
            <h1>Images</h1>
            <div class="row">
                @foreach($vehicleImages as $image)
                    <div class="large-4 columns text-center">
                        <a data-open="vehImage{!! $image->id  !!}"> <img class="thumbnail "
                                                                         src="{!! $image->file_name !!}" alt=""></a>

                        <a class="deleteImage"> <i class="fi-x-circle large"></i> Delete Image</a> <a
                                class="deleteImageConfirm hide"
                                data-url="/vehicleImage/{!! $image->id !!}/delete"><strong>Delete ?</strong></a>
                    </div>
                    <div class="reveal" id="vehImage{!! $image->id  !!}" data-reveal>
                        <img class="thumbnail " src="{!! $image->file_name !!}" alt="">
                        <button class="close-button" data-close aria-label="Close modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endforeach

            </div>
        </div>

    </div>
</div>
<!-- End Content -->
@stop