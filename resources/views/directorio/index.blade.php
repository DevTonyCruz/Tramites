@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Directorio</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/directorio') }}">Directorio</a></li>
                        <li class="breadcrumb-item active">Listado</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-row">
        <div class="col-xl-2 col-md-4 col-sm-12" title="Agregar registro">
            <a href="{{ Route('directorio.create') }}" class="w-100">
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

        <div class="col-xl-2 col-md-4 col-sm-12" title="Alertas proximas">
            <a href="{{ Route('directorio.alertas') }}" class="w-100">
                <div class="widget widget-12 bg-gradient-danger has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-alert-circled text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Alertas proximas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-2 col-md-4 col-sm-12" title="Descargar por profesión">
            <a href="javascript:void(0)" class="w-100" data-toggle="modal" data-target="#modal-profesiones">
                <div class="widget widget-12 bg-gradient-success has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-briefcase text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Descargar por profesión</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-2 col-md-4 col-sm-12" title="Descargar por grupos">
            <a href="javascript:void(0)" class="w-100" data-toggle="modal" data-target="#modal-grupos">
                <div class="widget widget-12 bg-gradient-dark has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-network text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Descargar por grupos </div>
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
                            <th>Nombre</th>
                            <th>Politico</th>
                            <th>Profesión</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directorios as $directorio)
                        <tr>
                            <td>{{ $directorio->id }}</td>
                            <td>{{ $directorio->nombre . ' ' . $directorio->appaterno . ' ' . $directorio->apmaterno }}
                            </td>
                            @php
                            $politico = 'NO';
                            if (
                            !is_null($directorio->coordinador_zona) ||
                            !is_null($directorio->coordinador_demarcacion) ||
                            !is_null($directorio->distrito_politico) ||
                            !is_null($directorio->demarcacion_politico) ||
                            !is_null($directorio->seccional_politico)
                            ) {
                            $politico = 'SI';
                            }
                            @endphp
                            <td>{{ $politico }}</td>
                            @php
                            $profesion = 'Sin profesión';
                            if($directorio->profesion){
                            $profesion = $directorio->profesion->nombre;
                            }
                            @endphp
                            <td>{{ $profesion }}</td>
                            @php
                            $grupo = 'Sin grupo';
                            if($directorio->grupos){
                            $grupo = $directorio->grupos->nombre;
                            }
                            @endphp
                            <td>{{ $grupo }}</td>
                            <td class="td-actions">
                                <a href="{{ url('directorio/eventos/' . $directorio->id) }}" title="Ver">
                                    <i class="la la-eye edit"> </i>
                                </a>
                                <a href="{{ url('directorio/edit/' . $directorio->id) }}" title="Editar"><i
                                        class="la la-edit edit"></i></a>
                                <a href="javascript:void(0)"
                                    onclick="ObjectForms.FormsAddAction('form_delete', '{{ url('directorio/' . $directorio->id) }}');"
                                    title="Eliminar">
                                    <i class="la la-trash delete"> </i>
                                </a>
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

<div id="modal-profesiones" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Filtrar por profesión</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">cerrar</span>
                </button>
            </div>
            <form action="{{ route('directorio.exportProfesiones') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row align-items-center">
                        <div class="col-12">
                            <label class="sr-only" for="inlineFormInput">Profesión</label>
                            <select name="profesion_id" id="profesion_id" class="form-control">
                                <option value="S" selected disabled>Seleccionar profesión</option>
                                <option value="0">Todos</option>
                                @foreach ($profesiones as $profesion)
                                <option value="{{ $profesion->id }}">{{ $profesion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Exportar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-grupos" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Filtrar por grupos</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">cerrar</span>
                </button>
            </div>
            <form action="{{ route('directorio.exportGrupos') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row align-items-center">
                        <div class="col-12">
                            <label class="sr-only" for="inlineFormInput">Grupos</label>
                            <select name="grupo_id" id="grupo_id" class="form-control">
                                <option value="S" selected disabled>Seleccionar Grupos</option>
                                <option value="0">Todos</option>
                                @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Exportar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('pagecss')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.min.css') }}">
@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>

<script type="text/javascript">
    let URLList     = "{{ url('api/list/directorio') }}";
    let URLStatus   = "{{ url('directorio/status/') }}";
    let URLAction   = "{{ url('directorio/') }}";
    let URLNew      = "{{ url('directorio/create') }}";
</script>
@endsection