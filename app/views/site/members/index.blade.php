@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<h3>{{ Lang::get('site.choir_members') }}</h3>
@foreach ($members as $voice => $group)
@if (count($group) > 0)
	<p><strong>{{Lang::get('choir.' . $voice) }}</strong></p>
	<ul>
	@foreach ($group as $member)
		<li>{{ $member->first_name }} {{$member->second_name}}</li>
	@endforeach
	</ul>
@endif
@endforeach
@stop
