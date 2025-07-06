@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Babies</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Babies</a></li>
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
                    Data Babies
                    <a href="{{ route('babies.create') }}" class="btn btn-sm btn-primary pull-right"><span class="fas fa-plus-circle"></span> Create Baby</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover  display nowrap"  style="width:100%" id="baby-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sex</th>
                                <th>Birth Date</th>
                                <th>Mother Name</th>
                                <th>Action</th>
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
@include('includes.modal-show', ['title' => 'Baby', 'route' => 'babies.index'])
@endsection
@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            var babyTable = $('#baby-table').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url : '{!! route('babies.datatable') !!}'
                },
                columns: [
                    { data: 'no', name: 'no', searchable: false, orderable: false },
                    { data: 'sex_text', name: 'sex_text' },
                    { data: 'birth_date_text', name: 'birth_date_text' },
                    { data: 'mother_name', name: 'mother_name' },
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