{{ Form::model($comment, array('action'=>array('Alexwenzel\LaravelCommentary\CommentsController@postUpdate', $comment->id), 'method'=>'post')) }}

@foreach ($errors->all('<p>:message</p>') as $error)
{{ $error }}
@endforeach

{{ Form::text('name') }}
{{ Form::text('email') }}
{{ Form::textarea('text') }}

{{ Form::button('update and approve', array('type'=>'submit', 'name'=>'action', 'value'=>'approve')) }}
{{ Form::button('update and unapprove', array('type'=>'submit', 'name'=>'action', 'value'=>'unapprove')) }}
{{ Form::button('trash', array('type'=>'submit', 'name'=>'action', 'value'=>'trash')) }}

{{ Form::close() }}