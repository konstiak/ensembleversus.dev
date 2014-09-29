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
				<a href="{{{ URL::to('admin/members/create') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

	<table id="members" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="span3">{{{ Lang::get('admin/members/table.name') }}}</th>
				<th class="span2">{{{ Lang::get('admin/members/table.active') }}}</th>
				<th class="span2">{{{ Lang::get('admin/members/table.voice') }}}</th>
				<th class="span2">{{{ Lang::get('admin/members/table.member_from') }}}</th>
				<th class="span2">{{{ Lang::get('admin/members/table.member_to') }}}</th>
				<th class="span1"></th>
			</tr>
		</thead>
		<tbody>
        @foreach ($members as $member)
        <tr>
            <td>{{ $member->first_name }} {{ $member->second_name }}</td>
            <td>{{ $member->active }}</td>
            <td>{{ $member->voice }}</td>
            <td>{{{ $member->member_from }}}</td>
            <td>{{{ $member->member_to }}}</td>
            <td>
            <a href="{{{ URL::to('admin/members/' . $member->id . '/edit' ) }}}"><span class="glyphicon glyphicon-pencil"></span></a>
            {{ Form::open(array('url' => 'admin/members/' . $member->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit(Lang::get('button.delete'), array('class' => 'btn btn-danger btn-xs')) }}
            {{ Form::close() }}
            </td>
        </tr>

        @endforeach
    </tbody>
	</table>
@stop