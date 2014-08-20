<div class="laravelcommentary-list">
<table><tbody>
@foreach ($comments as $comment)
<tr>
    <td>{{ $comment->name }}</td>
    <td>{{ nl2br($comment->text) }}</td>
</tr>
@endforeach
@if ($comments->isEmpty())
<tr>
  <td colspan="2">{{ trans('laravel-commentary::texts.list.no_comments') }}</td>
</tr>
@endif
</tbody></table>
</div>
