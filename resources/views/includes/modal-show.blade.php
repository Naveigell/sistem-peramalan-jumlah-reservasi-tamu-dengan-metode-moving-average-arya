<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="isi-show">
        
      </div>
      <div class="modal-footer">
        @php
          $del = true;
          if(isset($delStatus)) {
            $del = $delStatus;
          }
        @endphp
        @if ($del)
          {{-- <a title="Hapus Data" class="del" href="#" onclick="delData('#form-del')">
              <span class="btn btn-sm btn-danger">Delete</span>
          </a>
          <form id="form-del" action="{{ route("ts.index") }}" method="POST" style="display: none" class="form-del">
              @csrf
              @method("DELETE") --}}
          </form>
        @endif
        <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
  <script type="text/javascript">
    $( document ).ready(function() {
      $('#showModal').on('shown.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id')
        $('#isi-show').load('{{ route($route) }}/'+id)
        $('#form-del').attr('action', '{{ route($route) }}/'+id);
      })
    })
  </script>
@endpush