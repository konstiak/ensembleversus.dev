@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
  {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

  <div class="page-header">
    <h3>
      {{{ $title }}}

      <div class="pull-right">
        <a href="{{{ URL::to('admin/members') }}}" class="btn btn-small btn-info"><span class="glyphicon"></span> Back</a>
      </div>
    </h3>
  </div>

  {{ Former::framework('TwitterBootstrap3') }}

	{{
		Former::horizontal_open('admin/members/' . $member->id)
  		->id('members')
  		->secure()
  		->method('PUT') }}

  	{{ Former::populate($member)}}

  	{{ Former::text('first_name')
    	->required() }}

  	{{ Former::text('second_name')
    	->required() }}

    {{ Former::select('voice')
    	->options(array(
    		'soprano' => Lang::get('choir.soprano'),
        'mezzosoprano' => Lang::get('choir.mezzosoprano'),
    		'alto' => Lang::get('choir.alto'),
        'contralto' => Lang::get('choir.contralto'),
    		'tenor' => Lang::get('choir.tenor'),
        'countertenor' => Lang::get('choir.countertenor'),
    		'baritone' => Lang::get('choir.baritone'),
    		'bass' => Lang::get('choir.bass')
    		))
  		->state('warning')
    	->required() }}

    {{ Former::checkbox('active')}}

    {{ Former::date('member_from') }}

    {{ Former::date('member_to') }}

  	{{	Former::actions()
    	->large_primary_submit('Submit')
    	->large_inverse_reset('Reset') }}
    {{	Former::close() }}

@stop
