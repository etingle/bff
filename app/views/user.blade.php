@extends('base')
@section('title')
Bird User Generator
@stop
@section('header')
<a class="back button-small pure-button" href="/">Back</a>

<h2>Bird User Generator</h2>
<p>For Birds Who Think They're People</p>
@stop
@section('content')

<img src="{{ $image }}" alt="bird picture">
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