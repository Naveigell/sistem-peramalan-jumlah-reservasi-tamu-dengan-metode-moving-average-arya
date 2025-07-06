@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Reservasi</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Reservasi</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Reservasi
                    <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary pull-right"><span class="fas fa-plus-circle"></span> Tambah Reservasi</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover  display nowrap"  style="width:100%" id="sale-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Negara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.modal-show', ['title' => 'Reservasi', 'route' => 'sales.index'])
@endsection
@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            var saleTable = $('#sale-table').DataTable({
                language: {
                    lengthMenu: "Tampilkan _MENU_ baris",
                    search: "Cari : ",
                    info: "Tampilkan _START_ sampai _END_ dari _TOTAL_ baris",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                },
                processing: true,
                serverSide: true,
                scrollX: true,
                language: {
                    "processing": "<div id='loader'></div>"
                },
                ajax: {
                    url : '{!! route('sales.datatable') !!}'
                },
                columns: [
                    { data: 'no', name: 'no', searchable: false, orderable: false },
                    { data: 'date_string', name: 'date_string' },
                    { data: 'name', name: 'name' },
                    { data: 'qty', name: 'qty' },
                    { data: 'country', name: 'country' },
                    { data: 'action', name: 'id',orderable: false, searchable: false}
                ],
                rowCallback: function( row, data, iDisplayIndex ) {
                    var api = this.api();
                    var info = api.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:eq(0)', row).html(index);
                }
            })
        })
    </script>
@endpush