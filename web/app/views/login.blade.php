@extends('layouts.main')

@section('contenido')
<h1>Formulario de Login</h1>
<p>Para ingresar por favor utilice sus credenciales del sistema dirdoc.</p>

{{ Form::open(array('url' => 'login')) }}

@if (Session::has('login_errors'))
<span class="error">Usuario o contraseña incorrectas.</span>
@endif

<p>{{ Form::label('rut', 'Rut') }}</p>
<p>{{ Form::text('rut') }}</p>

<p>{{ Form::label('password', 'Password') }}</p>
<p>{{ Form::password('password') }}</p>

<p>{{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary')) }}</p>

{{ Form::close() }}


<?php echo HTML::script('js/jquery.Rut.min.js'); ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#rut").Rut();
    });
</script>

@stop
