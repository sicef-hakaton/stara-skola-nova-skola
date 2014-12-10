@extends('layouts.master')

@section('content')

        {{ HTML::script('js/jquery-2.1.1.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::style('css/custom.css') }}


@if ($errors->count() > 0)
    <div class="container">
        <div class="row" >
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                    <span class="glyphicon glyphicon-hand-right"></span> <strong>Greška</strong>
                    <hr class="message-inner-separator">
            @foreach ($errors->all('<li>:message</li>') as $error)
                    <p> {{ $error }}</p>
            @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

@if (isset($error))
    <div class="container">
        <div class="row" >
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                    <span class="glyphicon glyphicon-hand-right"></span> <strong>Greška</strong>
                    <hr class="message-inner-separator">
                    <p> {{ $error }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
        
    <script type="text/javascript">
        $(function(){
            $('.button-checkbox').each(function(){
                var $widget = $(this),
                    $button = $widget.find('button'),
                    $checkbox = $widget.find('input:checkbox'),
                    color = $button.data('color'),
                    settings = {
                            on: {
                                icon: 'glyphicon glyphicon-check'
                            },
                            off: {
                                icon: 'glyphicon glyphicon-unchecked'
                            }
                    };

                $button.on('click', function () {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                });

                $checkbox.on('change', function () {
                    updateDisplay();
                });

                function updateDisplay() {
                    var isChecked = $checkbox.is(':checked');
                    // Set the button's state
                    $button.data('state', (isChecked) ? "on" : "off");

                    // Set the button's icon
                    $button.find('.state-icon')
                        .removeClass()
                        .addClass('state-icon ' + settings[$button.data('state')].icon);

                    // Update the button's color
                    if (isChecked) {
                        $button
                            .removeClass('btn-default')
                            .addClass('btn-' + color + ' active');
                    }
                    else
                    {
                        $button
                            .removeClass('btn-' + color + ' active')
                            .addClass('btn-default');
                    }
                }
                function init() {
                    updateDisplay();
                    // Inject the icon if applicable
                    if ($button.find('.state-icon').length == 0) {
                        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                    }
                }
                init();
            });
        });
    </script>

{{ Form::open() }}

        <div class="container">
            <div class="row" style="margin-top:20px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form">
                        <fieldset>
                            <h2>Prijava</h2>
                            <hr class="colorgraph">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Korisničko ime/Email Adresa">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Lozinka">
                            </div>
                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="info">Zapamti me</button>
                                <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                                <a href="" class="btn btn-link pull-right">Zaboravljena lozinka?</a>
                            </span>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Prijava">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="/register" class="btn btn-lg btn-primary btn-block">Registracija</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
{{ Form::token() . Form::close() }}

@stop