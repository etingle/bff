@extends('base')
@section('body')

<img src="{{ $image }}">
<br>
{{ $name }}
<br>
{{ $address }}
<br>
{{ $email }}
<br>
{{ $birthday }}

@stop