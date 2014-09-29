@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
	@if($page->slug != 'index')
		{{{ $page->title }}} -
	@endif
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
@parent

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@parent

@stop

{{-- Content --}}
@section('content')
<h3>{{ $page->title }}</h3>

<p>{{ $page->content }}</p>
@stop
