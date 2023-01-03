<div class="dropdown">
  <a class="p-0 btn btn-link font-24 line-height-1 no-arrow dropdown-toggle" href="#" role="button"
    data-toggle="dropdown" aria-expanded="false">
    <i class="dw dw-more"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" style="">
    <a href="{{ route('tiket.edit', $id) }}" class="dropdown-item" onclick="" data-toggle="tooltip"
      data-placement="top" title="Edit">
      <i class="icon-copy fa fa-edit" aria-hidden="true"></i>
      Edit
    </a>
    <a type="button" class="dropdown-item" onclick="getTiket({{ $id }})" data-toggle="tooltip"
      data-placement="top" title="Print Tiket" role="button">
      <i class="fa fa-print"></i>
      Print Tiket
    </a>
    <a type="button" id="btnDelete" class="dropdown-item" onclick="deleteTiket({{ $id }})"
      data-toggle="tooltip" data-placement="top" title="Delete" role="button">
      <i class="icon-copy fa fa-trash" aria-hidden="true"></i>
      Delete
    </a>
  </div>
</div>

{{-- {!! Form::open(['route' => ['tiket.delete', $id], 'method' => 'delete']) !!}
{!! Form::button('Delete', [
'type' => 'submit',
'class' => 'btn btn-ghost-danger',
'onclick' => "deleteTiket({{ $id }})"
]) !!} --}}
