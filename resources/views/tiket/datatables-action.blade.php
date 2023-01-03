<a href="{{ route('tiket.edit', $id) }}" class="btn btn-datatables btn-ghost-warning" onclick="" data-toggle="tooltip"
    data-placement="top" title="Edit">
    <i class="icon-copy fa fa-edit" aria-hidden="true"></i>
</a>
<button type="button" class="btn btn-ghost-warning" onclick="getTiket({{ $id }})" data-toggle="tooltip"
    data-placement="top" title="Print Tiket">
    <i class="fa fa-print"></i>
</button>
{{-- <button type="button" class="btn btn-datatables btn-ghost-warning" onclick="" data-toggle="tooltip" data-placement="top" title="Label">
    <i class="icon-copy fa fa-edit" aria-hidden="true"></i>
</button>
<button type="button" class="btn btn-datatables btn-ghost-warning" onclick="" data-toggle="tooltip" data-placement="top" title="Label">
    <i class="icon-copy fa fa-trash" aria-hidden="true"></i>
</button> --}}
{{-- {!! Form::open(['route' => ['orders.destroy', $id], 'method' => 'delete']) !!}
{!! Form::button('Delete', [
'type' => 'submit',
'class' => 'btn btn-ghost-danger',
'onclick' => "return confirm('Are you sure want to delete order?')"
]) !!} --}}
