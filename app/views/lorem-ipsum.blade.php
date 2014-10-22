@extends('base')
@section('body')

@if (isset($paragraphs))
{{ $paragraphs }}
@endif

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
	{{ Form::radio('length','short') }} Short
	{{ Form::radio('length','medium') }} Medium
	{{ Form::radio('length','long') }} Long
<br><br>
	{{ Form::submit('Search',array('class'=>'pure-button')); }}

{{ Form::close() }}
@stop