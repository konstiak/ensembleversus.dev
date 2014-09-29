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
        <a href="{{{ URL::to('admin/pages') }}}" class="btn btn-small btn-info"><span class="glyphicon"></span>Back</a>
      </div>
    </h3>
  </div>

  {{ BootForm::openHorizontal(2,10)->put()->action('/admin/pages/' . $page->id) }}
  {{ Form::token() }}
    {{ BootForm::text(Lang::get('page.title'), 'title', $page->title) }}

    <!-- <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}"> -->
        {{-- Form::label('content', Lang::get('page.content')) --}}
        {{-- Form::textarea('content', $page->content , ['class' => 'form-control']) --}}
        {{-- $errors->first('content', '<p class="help-block">:message</p>') --}}
    <!-- </div> -->
    {{ BootForm::textarea(Lang::get('page.content'), 'content')->value($page->content) }}
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        {{ Form::submit(Lang::get('page.save'), array('class' => 'btn btn-success')) }}
      </div>
    </div>
  {{ BootForm::close() }}
  
  <table id="images" class="col-lg-offset-2 col-lg-10 table table-striped table-hover images-table">
    <thead>
      <tr>
        <th class="span1">{{{ Lang::get('admin/pages/table.image') }}}</th>
        <th class="span1">{{{ Lang::get('admin/pages/table.url') }}}</th>
        <th class="span1"></th>
      </tr>
    </thead>
    <tbody id="imagestab">
        @foreach ($images as $image)
        <tr imageid="{{ $image->id }}">
            <td><img src="{{ $image->thumbnail_url }}"></td>
            <td><a href="{{ $image->url }}">{{ $image->url }}</td>
            <td>
            <a href="#" class="deleteimage"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{ Form::open(array(
    'action' => 'AdminPagesController@addImage',
    'method' => 'post',
    'enctype' => 'multipart/form-data',
    'id' => 'addimage'

    )) }}
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        {{ Form::file('image[]', [
          'multiple' => true,
          'id' => 'imageinput',
          'class' => 'form-horizontal'

           ]) }}
      </div>
    </div>

    {{--<div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        {{ Form::submit(Lang::get('page.add_image'), array('class' => 'btn btn-success')) }}
      </div>
    </div>--}}
  {{ Form::close() }}

@stop

@section('scripts')
      <script type="text/javascript">
        
        // recieving response after adding image
        function showResponse(data) {
          if (data.success == true) {
            $.each(data.images, function(i, img) {
              $('#imagestab').append(
                "<tr imageid='" + img.id + "'>" +
                  "<td><img src='" + img.thumbnail_url + "' /></td>" +
                  "<td><a href='" + img.url + "'>" + img.url + "</a></td>" +
                  "<td><a href='#' class='deleteimage'><span class='glyphicon glyphicon-remove'></span></a></td>" +
                "</tr>");
            });
            setDeleteAnchor();
            $('.file-input-name').hide();
          }
        };

        function showRequest() { 
            return true; 
        }

        function setDeleteAnchor() {
          $('a.deleteimage').click(function( event ) {
            
            event.preventDefault(); 

            var image = $(this).parent().parent();
            var image_id = image.attr('imageid');

            image.slideUp(4000);
            image.remove();
            $.get('/admin/pages/deleteimage/' + image_id);
          });
        }

        // setting main variables after edit page is loaded
        $(document).ready(function() {

          // options for ajax input
          var options = { 
            success:       showResponse,
            beforeSubmit:  showRequest,
            dataType:      'json' 
          };
          
          // ckeditor activation
          CKEDITOR.replace( 'content' );
          CKEDITOR.config.entities_latin = false;

          // browse button style
          $('input[type=file]').bootstrapFileInput();
          $('.file-inputs').bootstrapFileInput();

          // adding ajax response to file input
          $('#imageinput').change(function() {
            event.preventDefault();

            $('#addimage').ajaxForm(options).submit();
          });

          setDeleteAnchor();
        });

      </script>
@stop
