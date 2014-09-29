@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site.contact_us') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

<h3>{{{ Lang::get('site.contact_us') }}}</h3>

{{ BootForm::openHorizontal(2,10)->post()->action('contact-us') }}
	{{ Form::token() }}
    {{ BootForm::text(Lang::get('contact.name'), 'name') }}
    {{ BootForm::email(Lang::get('contact.email'), 'email') }}
    {{ BootForm::textarea(Lang::get('contact.message'), 'message') }}
    {{ BootForm::submit(Lang::get('contact.submit')) }}
{{ BootForm::close() }}

@stop
