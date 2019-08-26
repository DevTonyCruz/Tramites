@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Roles</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/roles') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Listado</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-row">
        <div class="col-xl-2 col-md-4 col-sm-12">
            <a href="{{ Route('roles.create') }}" class="w-100" title="Agregar registro">
            <div class="widget widget-12 bg-gradient-07 has-shadow">
                <div class="widget-body">
                    <div class="media d-block">
                        <div class="align-self-center m-auto text-center">
                            <i class="ion-plus-round text-white"></i>
                        </div>
                        <div class="media-body align-self-center text-center">
                            <div class="title text-white">Agregar registro</div>
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
                <table id="datatable" class="table mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                        <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>
                            <td>{{ $rol->description }}</td>
                            <td class="td-actions">
                                <a href="{{ url('roles/' . $rol->id) }}" title="Editar"> <i class="la la-edit edit"></i></a>
                                <a href="javascript:void(0)" onclick="ObjectForms.FormsAddAction('form_delete', '{{ url('roles/' . $rol->id) }}');" title="Eliminar">
                                    <i class="la la-trash delete"></i>
                                </a>
                                <a href="{{ url('roles/permission/' . $rol->id) }}" title="Permisos"> <i class="la la-lock more"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
    let URLList     = "{{ url('api/list/roles') }}";
    let URLStatus   = "{{ url('roles/status/') }}";
    let URLAction   = "{{ url('roles/') }}";
    let URLNew      = "{{ url('roles/create') }}";
    let URLPermission = "{{ url('roles/permission') }}";
</script>

<script src="{{ asset('assets/js/general/forms.js') }}"></script>
<script src="{{ asset('assets/js/sections/roles/table.js') }}"></script>
@endsection
