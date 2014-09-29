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
		</h3>
	</div>

	<table id="pages" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="span2">{{{ Lang::get('admin/pages/page.slug') }}}</th>
				<th class="span2">{{{ Lang::get('admin/pages/page.language') }}}</th>
				<th class="span3">{{{ Lang::get('admin/pages/page.title') }}}</th>
				<th class="span1"></th>
			</tr>
		</thead>
		<tbody>
        @foreach ($pages as $page)
        <tr>
            <td>{{ $page->slug }}</td>
            <td>{{ $page->language }}</td>
            <td>{{ $page->title }}</td>
            <td>
            <a href="{{{ URL::to('admin/pages/' . $page->id . '/edit' ) }}}"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>

        @endforeach
    </tbody>
	</table>
@stop