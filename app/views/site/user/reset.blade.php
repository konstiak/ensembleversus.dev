@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{{ Lang::get('user.forgot_password') }}}</h1>
</div>
{{ Confide::makeResetPasswordForm($token)->render() }}
@stop
