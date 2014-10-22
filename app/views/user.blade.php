@extends('base')
@section('header')
<a class="back button-small pure-button" href="/">Back</a>

<h2>Bird User Generator</h2>
<p>For Birds Who Think They're People</h4>
@stop
@section('content')

<div>
<img src="{{ $image }}">
<br>
<span class="name">{{ $name }}</span>
<br>
Address: <span class="info">{{ $address }}</span>
<br>
Email: <span class="info">{{ $email }}</span>
<br>
Birthday: <span class="info">{{ $birthday }}</span>
<br>
<a class="button-medium pure-button" href="/user">Another!</a>

@stop