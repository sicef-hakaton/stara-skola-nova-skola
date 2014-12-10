@extends('layouts.master')

@section('title')
@parent
:: Search
@stop

@section('custom_styles')
    {{ HTML::style('css/home.css') }}
@stop

@section('content')

	@if (isset($message))
		Poruka: {{ $message }}
	@endif

    {{-- SEARCH --}}
	<div class="container">
    	<div class="row" style="margin-bottom: 100px;">
    	    <div class="col-md-4 center-block"></div>


            {{ Form::open(array("method" => "get", "url" => "/search/")); }}
    		<div class="col-md-4 center-block">
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" name="searchQuery" value="<?php echo Input::get('searchQuery'); ?>">
                  <span class="input-group-btn">
                  <button onclick="javascript: this.form.submit()" class="btn btn-default" type="button">
                  <span class="glyphicon glyphicon-search"></span>
                 </button>
                 </span>
                 </div><!-- /input-group -->
            </div>
            {{ Form::close(); }}
    	</div>
    </div>

    <div class="container">
        <div class="row">
        	
        	@if(!isset($paths) || count($paths) == 0) 
        		<h2>Nema rezultata za ovu pretragu :(</h2>
        	@endif

            @foreach($paths as $path)
            <a href="/path/{{$path->id}}">
                <div class="col-sm-3 col-md-3">
                    <div class="post">
                        <div class="post-img-content">

                            <?php
                                $group = $path->groups()->orderBy('id','DESC')->first();
                                if (isset($group)) {
                                    $groupTitle = $group->title;
                                } else {
                                    $groupTitle = "/";
                                }
                            ?>

                            <img src="http://placehold.it/460x250/47a447/ffffff&text=<?php echo $groupTitle ?>" class="img-responsive" />
                            <span class="post-title"><br />
                                <b>{{ $path->title }}</b></span>

                            @if (Auth::check())
                            <span class="post-progress">
                                 <b>{{ Auth::user()->completedStepsOnPath($path) }}/{{ $path->countSteps() }} </b>
                             </span>           
                            @endif                                            

                            <span class="post-rating">
                                    <b> <?php printf("%.2f", $path->getRating()); ?> </b></span>
                        </div>
                        <div class="content">
                            <div class="description">
                                {{ $path->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

            {{--
            <a href="/add_path">
                <div class="col-sm-3 col-md-3">
                    <div class="post">
                        <div class="post-img-content">
                            <img src="http://placehold.it/460x250/000044/ffffff&text=NOVA" class="img-responsive" />
                        </div>
                        <div class="content">
                            <div class="description">
                                Dodaj novu smernicu!
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            --}}


        </div>
    </div>

@stop