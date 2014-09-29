@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user.profile') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{{ Lang::get('user.user_profile') }}}</h1>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>{{{ Lang::get('user.username') }}}</th>
        <th>{{{ Lang::get('user.signed_up') }}}</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{{$user->id}}}</td>
        <td>{{{$user->username}}}</td>
        <td>{{{$user->joined()}}}</td>
    </tr>
    </tbody>
</table>
@stop
