@extends('layouts.master')

@section('column-a')
        <!-- Begin Content -->
        <div class="container">


                <div class="row">
                    <div class="reveal" id="profile-modal" data-reveal>
                    <div class="large-12 medium-12 columns">

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
                        {!! Form::text('dealers_id',$dealer_id, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::submit('Save Profile', array('class' => 'button')) !!}
                    </div>
                    {!! Form::close() !!}
</div></div>
                    <div class="large-12 medium-12 columns">
                        <h1>Profiles</h1>
                        @if($profile_id == "")

                            <div class="alert callout" data-closable>
                                <h5>Looks like you don't have a profile yet!</a></h5>
                                <p>Your account will be limited until you  <a href="#" data-open="profile-modal" >add new profile.</a></p>
                                <a href="#">It's dangerous to go alone, take this.</a>
                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @foreach($profiles as $profile)
                            @if($profile_id == $profile->id)
                            <h4><a href="/profiles/{!! $profile->id !!}">{!! $profile->first !!} {!! $profile->last !!} </a></h4>
                            <!-- {!! $profile->user['password'] !!} -->
                                <hr>
                            @endif


                        @endforeach

                    </div>

            </div>
        </div>
        <!-- End Content -->
@stop