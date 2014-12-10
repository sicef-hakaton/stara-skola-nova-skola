@extends('layouts.master')

@section('custom_styles')
    {{ HTML::style('css/home.css') }}
@stop

@section('content')

<!--
<br/>
Zapocete smernice: <?php var_dump($startedPaths); ?> <br/>
<br/>
Odradjene smernice: <?php var_dump($completedPaths); ?> <br/-->

<div class="container">
    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $user->first_name . ' ' . $user->last_name }} </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle" style="width:120px; height:120px"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Korisničko ime:</td>
                        <td>{{ $user->username }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <h2> Nezavršene smernice </h2>
              @foreach($startedPaths as $path)
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
            </div>
        </div>

    <div class="container">
        <div class="row">
            <h2> Završene smernice </h2>
              @foreach($completedPaths as $path)
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
            </div>
        </div>

@stop