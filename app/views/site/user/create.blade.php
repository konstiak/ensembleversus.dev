@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{{ Lang::get('user.signup') }}}</h1>
</div>
{{ Confide::makeSignupForm()->render() }}
@stop
