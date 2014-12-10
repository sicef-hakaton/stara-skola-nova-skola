@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('custom_styles')
    {{ HTML::style('css/view.css') }}
@stop

@section('scripts')
        {{ HTML::script('js/jquery-2.1.1.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::style('css/custom.css') }}
        {{ HTML::style('js/jquery.rating.js') }}


    <script type="text/javascript">
        $(window).load(function() {
            $("#messagesContainer").load("/Comment/1/{{ $path->id }}");
        });

        $("#postComment").click(function() {
            $.post("/Comment/1/{{ $path->id }}", { body: $("#commentBody").val() }, function() {
                $("#commentBody").val("");
                $("#messagesContainer").load("/Comment/1/{{ $path->id }}");
            });
        });

        $( ".progressClass" ).click(function() {
//                    alert('hehe');
        		     	var button = $(this);

        		     	var step_id = button.attr("button-step");

        	     		if ($(this).hasClass("completed")) {
        		     		$.post( "/UncompleteStep/" + step_id, function(data) {
        		     			button.removeClass("completed").addClass("uncomplete");
        		     			button.removeClass("btn-success").addClass("btn-warning");
        		     			button.html("Završi korak");
        					});
        	     		} else {
        	     			$.post( "/CompleteStep/" + step_id, function(data) {
        		     			button.removeClass("uncomplete").addClass("completed");
        		     			button.removeClass("btn-warning").addClass("btn-success");
        		     			button.html("Poništi korak");
        					});
        	     		}
        			});

        $('#rate1').rating('www.url.php', {maxvalue:5, increment:.5});

    </script>

@stop

@section('content')

    {{--<span class="label label-default">{{ $path->title }}</span>--}}
    {{--<span class="label label-primary">{{ $path->title }}</span>--}}


    <div class="page-header text-center" style="margin-left: 20px;">
      <h1>{{ $path->title }}<br/><small>{{ $path->description }}</small></h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example" class="carousel slide" data-ride="carousel" data-interval="">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <?php $current = 0; ?>
                    @foreach ($steps as $step)
                    <li data-target="#carousel-example" data-slide-to="<?php echo $current;?>" <?php if ($current == 0) echo 'class="active"'; ?>></li>
                    <?php $current++; ?>
                    @endforeach
                    
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <?php $current = 0; ?>
                    @foreach ($steps as $step)
                    <div class="item <?php if ($current == 0) echo 'active';?>">
                      <div style="background:url('http://placehold.it/1200x700/3498db/2980b9&text=%20') center center;
                                background-size:cover;" class="slider-size">
                          <div class="carousel-caption">
                            <h2>{{ $step->title }}</h2>
                            <p>{{ $step->description }}</p>

                            <button button-step={{$step->id}} type="button" class="btn btn-warning progressClass uncomplete" style="margin-left: 0px; margin-top: 30px">Završi korak</button>

                            <?php 
                            $current++;
                            $links = $step->links()->get();
                            ?>
                          </div>
                          <div class="carousel-inner">

                                 <div id="stars" class="starrr"></div>

                                <div class="col-lg-1" style="margin-left: 40px"></div>

                                @foreach ($links as $link)
                                <?php if (strpos($link->url, "youtube") !== FALSE) { ?>
                                <div class="col-lg-3">
                                    <div class="link-content">
                                        <iframe style="margin-top: 150px;" width="420" height="315" src="//www.youtube.com/embed/DG5-UyRBQD4" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                
                                <?php }
                                else { ?>
                                <a href="<?php echo $link->url ?>">
                                <div class="col-lg-3">
                                    <div class="link-content">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">{{ $link->title }}</div>
                                          <div class="panel-body">

                                            {{ $link->description }}
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <?php } ?>
                                @endforeach

                          </div>
                        </div>


                    </div>
                    @endforeach

                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="javascript:void(0)" data-target="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="javascript:void(0)" data-target="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>

                <div class="main-text hidden-xs">
                    <div class="col-md-12 text-center">
                        {{--<h1>--}}
                            {{--Static Headline And Content</h1>--}}
                        {{--<h3>--}}
                            {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
                        {{--</h3>--}}
                        {{--<div class="">--}}
                            {{--<a class="btn btn-clear btn-sm btn-min-block" href="http://www.jquery2dotnet.com/">Login</a><a class="btn btn-clear btn-sm btn-min-block"--}}
                                {{--href="http://www.jquery2dotnet.com/">Registration</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="push">
    </div>

<?php if (Auth::check()) { ?>
<div class="container" id="messagesContainer"> </div>

<div class="container">
    <div class="row">
        {{--<div class="panel panel-default widget">--}}
            <div class="panel panel-default">
                <div class="panel-body">
                    <textarea id="commentBody" class="form-control counted" name="body" placeholder="Komentar" rows="5" style="margin-bottom:10px;"></textarea>
                    <button id="postComment" class="btn btn-primary" type="submit">Komentariši</button>
                </div>
            </div>
        {{--</div>--}}
    </div>
</div>

<?php } ?>

@stop