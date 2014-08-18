<h1>Index</h1>
<table>
<tr>
    <th>status</th>
    <th>entity</th>
    <th>name</th>
    <th>email</th>
    <th>text</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
@foreach ($comments as $comment)
<tr>
<td>{{ $comment->statusText() }}</td>
<td>{{ $comment->entity }}</td>
<td>{{ $comment->name }}</td>
<td>{{ $comment->email }}</td>
<td>{{ $comment->text }}</td>
<td>{{ $comment->created_at }}</td>
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\CommentsController@getApprove',
    Lang::get('laravel-commentary::messages.action.approve'),
    array($comment->id)) }}
</td>
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\CommentsController@getUnapprove',
    Lang::get('laravel-commentary::messages.action.unapprove'),
    array($comment->id)) }}
</td>
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\CommentsController@getEdit',
    Lang::get('laravel-commentary::messages.action.edit'),
    array($comment->id)) }}
</td>
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\CommentsController@getTrash',
    Lang::get('laravel-commentary::messages.action.trash'),
    array($comment->id)) }}
</td>
</tr>
@endforeach
</table>