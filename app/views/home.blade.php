@extends('layouts.master')

@section('title')
@parent
:: Home
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
                  <input type="text" class="form-control" name="searchQuery">
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


            <h2>Popularne Smernice</h2>

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

        </div>

        <div class="row">
            <h2>Fakulteti</h2>
            <a href="/search/2">
                <div class="col-sm-3 col-md-3">
                    <div class="post">
                        <div class="post-img-content">
                            <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10254000_790130967698042_3467819734373070677_n.png?oh=8ece2dc533fdeb774c2fb64811570fd1&oe=550F1F3C&__gda__=1423578336_1444717c1db2f787d84fcd6aaa327265" class="img-responsive"/>
                            <span class="post-title"><br />
                                <b>RAF</b></span>
                        </div>
                        <div class="content">
                            <div class="description">
                                RAF, 11000 Beograd
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/search/3">
                <div class="col-sm-3 col-md-3">
                    <div class="post">
                        <div class="post-img-content">
                            <img src="http://plasmalab.elfak.ni.ac.rs/wp-content/uploads/2012/12/Znak-Fakulteta.gif" class="img-responsive"/>
                            <span class="post-title"><br />
                                <b>Elektronski fakultet</b></span>
                        </div>
                        <div class="content">
                            <div class="description">
                                Elektronski fakultet, 18000 Niš
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/search/7">
                <div class="col-sm-3 col-md-3">
                    <div class="post">
                        <div class="post-img-content">
                            <img src="http://www.pmf.ni.ac.rs/pmf/o_fakultetu/eduroam/Logo-pmf.png" class="img-responsive"/>
                            <span class="post-title"><br />
                                <b>PMF</b></span>
                        </div>
                        <div class="content">
                            <div class="description">
                                Prirodno-matematički fakultet, 18000 Niš
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@stop