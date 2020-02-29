<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fundus') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body class="home-body">
  @include('sidebar')
  @include('topbar')
<div class="form-container">
  <form class="module-card" action="/add/module/create" method="post">
    <input type="text" name="form_modulename" placeholder="Name des Moduls">
    <!--in Backend noch Courseid eintragen.-->
    <input type="submit" name="" value="absenden">
    @csrf
  </form>
</div>
