{{ Form::open(array('action'=>array('Alexwenzel\LaravelCommentary\CommentsController@postComment'), 'method'=>'post')) }}

{{ Form::hidden('entity', $entity) }}

@if (Session::has('laravelcommentary.message'))
<p>{{ Session::get('laravelcommentary.message') }}</p>
@endif

@foreach ($errors->all('<p>:message</p>') as $error)
{{ $error }}
@endforeach

<table>
<tr>
    <td>{{ Form::label('name', 'Name') }}</td>
    <td>{{ Form::text('name') }}</td>
</tr>
<tr>
    <td>{{ Form::label('email', 'Email') }}</td>
    <td>{{ Form::text('email') }}</td>
</tr>
<tr>
    <td>{{ Form::label('text', 'Text') }}</td>
    <td>{{ Form::textarea('text') }}</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>{{ Form::submit('send') }}</td>
</tr>
</table>

{{ Form::close() }}