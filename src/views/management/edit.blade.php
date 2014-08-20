<link rel="stylesheet" type="text/css" href="{{ asset('packages/alexwenzel/laravel-commentary/style.css') }}">

<div class="laravelcommentary-management edit">
<h1>laravel commentary</h1>
{{ Form::model($comment, array('action'=>array('Alexwenzel\LaravelCommentary\ManagementController@postUpdate', $comment->id), 'method'=>'post')) }}

{{-- validation errors --}}
@foreach ($errors->all('<div class="msg error">:message</div>') as $error)
{{ $error }}
@endforeach

{{-- form input elements --}}
<table>
<tr>
    <td>{{ Form::label('name', trans('laravel-commentary::texts.author')) }}</td>
    <td>{{ Form::text('name') }}</td>
</tr>
<tr>
    <td>{{ Form::label('email', trans('laravel-commentary::texts.email')) }}</td>
    <td>{{ Form::text('email') }}</td>
</tr>
<tr>
    <td>{{ Form::label('text', trans('laravel-commentary::texts.comment')) }}</td>
    <td>{{ Form::textarea('text') }}</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>
        {{ Form::button(trans('laravel-commentary::texts.management.approve_update'),
        array('type'=>'submit', 'name'=>'action', 'value'=>'approve')) }}
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>
        {{ Form::button(trans('laravel-commentary::texts.management.approve_unupdate'),
        array('type'=>'submit', 'name'=>'action', 'value'=>'unapprove')) }}
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>
        {{ Form::button(trans('laravel-commentary::texts.management.trash'),
        array('type'=>'submit', 'name'=>'action', 'value'=>'trash')) }}
    </td>
</tr>
</table>

{{ Form::close() }}
</div>
