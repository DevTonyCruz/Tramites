@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Usuarios</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/users') }}">Usuarios</a></li>
                        <li class="breadcrumb-item active">Listado</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-row">
        <div class="col-xl-2 col-md-4 col-sm-12">
            <a href="{{ Route('users.create') }}" class="w-100">
            <div class="widget widget-12 bg-gradient-07 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="ion-plus-round text-white"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-white">Nuevo</div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Listado</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="users-list" class="table mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<form method="POST" id="form_delete" class="inline" action="">
    @method('DELETE')
    @csrf
</form>

<form method="POST" id="form_update" class="inline" action="">
    @method('PUT')
    @csrf()
</form>
@endsection

@section('pagecss')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>

<script type="text/javascript">
    let URLList     = "{{ url('api/list/users') }}";
    let URLStatus   = "{{ url('users/status/') }}";
    let URLAction   = "{{ url('users/') }}";
    let URLNew      = "{{ url('users/create') }}";
</script>

<script src="{{ asset('assets/js/general/forms.js') }}"></script>
<script src="{{ asset('assets/js/sections/users/table.js') }}"></script>
@endsection
