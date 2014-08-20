{{ Form::open(array('action'=>array('Alexwenzel\LaravelCommentary\FrontendController@postComment'),'method'=>'post','class'=>'laravelcommentary')) }}

{{-- entity as hidden field --}}
{{ Form::hidden('entity', $entity) }}

{{-- general form messages --}}
@if (Session::has('laravelcommentary.message'))
<div class="msg {{ Session::get('laravelcommentary.messageclass') }}">
    {{ Session::get('laravelcommentary.message') }}
</div>
@endif

{{-- validation errors --}}
@foreach ($errors->all('<div class="msg error">:message</div>') as $error)
{{ $error }}
@endforeach

{{-- form input elements --}}
<table>
<tr>
    <td>{{ Form::label('name', trans('laravel-commentary::texts.form.name')) }}</td>
    <td>{{ Form::text('name') }}</td>
</tr>
<tr>
    <td>{{ Form::label('email', trans('laravel-commentary::texts.form.email')) }}</td>
    <td>{{ Form::text('email') }}</td>
</tr>
<tr>
    <td>{{ Form::label('text', trans('laravel-commentary::texts.form.comment')) }}</td>
    <td>{{ Form::textarea('text') }}</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>{{ Form::submit('send') }}</td>
</tr>
</table>

{{ Form::close() }}
