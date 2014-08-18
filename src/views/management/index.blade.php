<link rel="stylesheet" type="text/css" href="{{ asset('packages/alexwenzel/laravel-commentary/style.css') }}">

<div class="laravelcommentary-management index">
<h1>laravel commentary</h1>
<table>
<tr>
    <th>status</th>
    <th>entity</th>
    <th>name</th>
    <th>email</th>
    <th>text</th>
    <th>created at</th>
    <th>updated at</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
@foreach ($comments as $comment)
<tr class="{{ $comment->status_class }}">
<td>{{ $comment->status_text }}</td>
<td>{{ $comment->entity }}</td>
<td>{{ $comment->name }}</td>
<td>{{ $comment->email }}</td>
<td>{{ str_limit($comment->text, 50, ' [...]') }}</td>
<td>{{ $comment->created_at }}</td>
<td>{{ $comment->updated_at }}</td>
@if ( $comment->status === 0 )
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getApprove',
    Lang::get('laravel-commentary::messages.action.approve'),
    array($comment->id)) }}
</td>
@else
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getUnapprove',
    Lang::get('laravel-commentary::messages.action.unapprove'),
    array($comment->id)) }}
</td>
@endif
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getEdit',
    Lang::get('laravel-commentary::messages.action.edit'),
    array($comment->id)) }}
</td>
<td>
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getTrash',
    Lang::get('laravel-commentary::messages.action.trash'),
    array($comment->id)) }}
</td>
</tr>
@endforeach
</table>
</div>