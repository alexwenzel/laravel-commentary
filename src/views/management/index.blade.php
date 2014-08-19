<link rel="stylesheet" type="text/css" href="{{ asset('packages/alexwenzel/laravel-commentary/style.css') }}">

<div class="laravelcommentary-management index">
<h1>laravel commentary</h1>

<table>
<tr>
<td width="25%">{{ $comments->appends($filter)->links() }}</td>
<td width="25%"><a href="?">all</a></td>
<td width="25%"><a href="?status=1">approved</a></td>
<td width="25%"><a href="?status=0">unapproved</a></td>
</tr>
</table>

<table>
{{-- header --}}
<thead>
    <th>{{ trans('laravel-commentary::messages.author') }}</th>
    <th>{{ trans('laravel-commentary::messages.entity') }}</th>
    <th>{{ trans('laravel-commentary::messages.comment') }}</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</thead>
<tbody class="list">
@foreach ($comments as $comment)
<tr class="{{ $comment->status_class }}">
{{-- author --}}
<td>{{ $comment->name }}<br><a href="mailto:{{ $comment->email }}">{{ $comment->email }}</a></td>
{{-- entity --}}
<td>{{ $comment->entity }}</td>
{{-- text --}}
<td>{{ nl2br($comment->text) }}</td>
{{-- action --}}
<td>
@if ( $comment->status === 0 )
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getApprove',
    trans('laravel-commentary::messages.action.approve'),
    array($comment->id)) }}
@else
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getUnapprove',
    trans('laravel-commentary::messages.action.unapprove'),
    array($comment->id)) }}
@endif
    <br>
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getEdit',
    trans('laravel-commentary::messages.action.edit'),
    array($comment->id)) }}
    <br>
    {{ link_to_action('Alexwenzel\LaravelCommentary\ManagementController@getTrash',
    trans('laravel-commentary::messages.action.trash'),
    array($comment->id)) }}
</td>
{{-- dates --}}
<td class="time">
    {{ trans('laravel-commentary::messages.created_at') }}:
    <br>{{ $comment->created_at }}<br><br>
    {{ trans('laravel-commentary::messages.updated_at') }}:<br>{{ $comment->updated_at }}
</td>
</tr>
@endforeach
</tbody>
</table>
</div>