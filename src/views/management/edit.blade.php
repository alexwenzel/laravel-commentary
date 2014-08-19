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
    <td>{{ Form::label('name', trans('laravel-commentary::messages.name')) }}</td>
    <td>{{ Form::text('name') }}</td>
</tr>
<tr>
    <td>{{ Form::label('email', trans('laravel-commentary::messages.email')) }}</td>
    <td>{{ Form::text('email') }}</td>
</tr>
<tr>
    <td>{{ Form::label('text', trans('laravel-commentary::messages.comment')) }}</td>
    <td>{{ Form::textarea('text') }}</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>
        {{ Form::button(trans('laravel-commentary::messages.action.approve_update'),
        array('type'=>'submit', 'name'=>'action', 'value'=>'approve')) }}
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>
        {{ Form::button(trans('laravel-commentary::messages.action.approve_unupdate'),
        array('type'=>'submit', 'name'=>'action', 'value'=>'unapprove')) }}
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>
        {{ Form::button(trans('laravel-commentary::messages.action.trash'),
        array('type'=>'submit', 'name'=>'action', 'value'=>'trash')) }}
    </td>
</tr>
</table>

{{ Form::close() }}
</div>