<div class="laravelcommentary-list">
<table><tbody>
@foreach ($comments as $comment)
<tr>
    <td>{{ $comment->name }}</td>
    <td>{{ nl2br($comment->text) }}</td>
</tr>
@endforeach
</tbody></table>
</div>