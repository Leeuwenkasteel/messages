<div wire:poll.750ms>
<form method="post" action="{{route('notifications.store')}}">
    @csrf
<table class="table">
        <tr>
            <td><input id="selectAll" type="checkbox"></td>
            <td>
            <button type="submit" class="btn btn-danger p-1"><i class="bi bi-trash"></i></button>
            </td>
            <td></td>
        </tr>
        @foreach($notes as $note)
            <tr wire:click="read('{{$note->id}}')" class="{{($note->read_at == NULL) ? 'table-success' : ''}}">
                <td><input type="checkbox" name="check[]" value="{{$note->id}}"></td>
                <td>{{$note->data['message']}}</td>
                <td NOWRAP>
                    @if($note->created_at->format('Y-m-d') == date('Y-m-d'))
    	                {{$note->created_at->format('H:i')}}
                    @else
                    {{$note->created_at->format('d-m-Y')}}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</form>
</div>
@pushonce('scripts')
<script>
$("#selectAll").click(function() {
  $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});

$("input[type=checkbox]").click(function() {
  if (!$(this).prop("checked")) {
    $("#selectAll").prop("checked", false);
  }
});
</script>
@endpushonce