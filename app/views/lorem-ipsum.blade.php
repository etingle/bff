@extends('base')

@section('title')
Principia Generator
@stop

@section('header')
<a class="back button-small pure-button" href="/">Back</a>
<h2>Principia Generator</h2>
<p class="blurb">Isaac Newton's <a href="http://en.wikipedia.org/wiki/Philosophi%C3%A6_Naturalis_Principia_Mathematica">Principia</a> is possibly the most important work in the history of science and marked the beginning of a new era in physics. Make your dummy text smart!</p>

@stop
@section('content')


{{ Form::open(array('url' => 'lorem-ipsum')) }}
	{{ Form::label('paragraph_number','Number of Paragraphs:') }}
	{{ Form::select('paragraph_number', array(
        '1'       => '1',
        '2'     => '2',
        '3'     => '3',
        '4'       => '4',
        '5'     => '5'
    ), '1') }}
<br><br>
	{{ Form::label('length','Paragraph Length') }}
	{{ Form::radio('length','short',true,array('id'=>'short')) }} Short
	{{ Form::radio('length','medium',false,array('id'=>'medium')) }} Medium
	{{ Form::radio('length','long',false,array('id'=>'long')) }} Long
<br><br>
	{{ Form::submit('Search',array('class'=>'pure-button')); }}

{{ Form::close() }}


@if (isset($paragraphs[0]))
@foreach ($paragraphs as $paragraph)
<p class="paragraph">{{ $paragraph }}</p>
@endforeach
@endif

@stop