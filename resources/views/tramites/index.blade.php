@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Tramites</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/tramites') }}">Tramites</a></li>
                        <li class="breadcrumb-item active">Listado</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-row">
            <div class="col-xl-2 col-md-4 col-sm-12">
                <a href="{{ Route('tramites.create') }}" class="w-100" title="Agregar registro">
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

            <div class="col-xl-2 col-md-4 col-sm-12">
                <a href="javascript:void(0)" class="w-100" data-toggle="modal" data-target="#modal-centered" title="Descargar registros">
                <div class="widget widget-12 bg-gradient-02 has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-code-download text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Descargar registros</div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12" title="Registros en tramite: {{ $entramite }}">
                <div class="widget widget-12 bg-gradient-success has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-compose text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Registros en tramite: {{ $entramite }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12" title="Registros cerrados: {{ $cerrados }} ">
                <div class="widget widget-12 bg-gradient-dark has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-checkmark text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Registros cerrados: {{ $cerrados }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12" title="Registros por vence: {{ $porvencer }}">
                <div class="widget widget-12 bg-gradient-warning has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-alert text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Registros por vencer: {{ $porvencer }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12" title="Registros vencidos: {{ $vencidos }}">
                <div class="widget widget-12 bg-gradient-danger has-shadow">
                    <div class="widget-body">
                        <div class="media d-block">
                            <div class="align-self-center m-auto text-center">
                                <i class="ion-alert-circled text-white"></i>
                            </div>
                            <div class="media-body align-self-center text-center">
                                <div class="title text-white">Registros vencidos:  {{ $vencidos }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Listado</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="tramites-list" class="table mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <th>Fecha inicial</th>
                            <th>Fecha final</th>
                            <th>Acciones</th>
                            <th>nombre</th>
                            <th>appaterno</th>
                            <th>apmaterno</th>
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

<div id="modal-centered" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Filtrar búsqueda</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                    <form action="{{ route('tramites.export') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-row align-items-center mb-3">
                                <div class="col-6">
                                <label class="sr-only" for="inlineFormInput">Fecha inicial</label>
                                    <input type="text" name="fecha_ini" id="fecha_ini"
                                            class="form-control datepicker{{ $errors->has('fecha_ini') ? ' has-error' : '' }}">
                                    @if ($errors->has('fecha_ini'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('fecha_ini') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label class="sr-only" for="inlineFormInput">Fecha final</label>
                                    <input type="text" name="fecha_fin" id="fecha_fin"
                                            class="form-control datepicker{{ $errors->has('fecha_ini') ? ' has-error' : '' }}">
                                    @if ($errors->has('fecha_fin'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('fecha_fin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row align-items-center mb-3">
                                <div class="col-12">
                                    <label class="sr-only" for="inlineFormInput">Estatus</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="S" selected disabled>Seleccionar estatus</option>
                                        <option value="T">Todos</option>
                                        <option value="E">En tramite</option>
                                        <option value="C">Finalizados</option>
                                        <option value="P">Por vencer</option>
                                        <option value="V">Vencidos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-6">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="sin_fecha" id="sin_fecha" value="1">
                                        <label for="sin_fecha">Omitir fecha</label>
                                    </div>
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
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>

<script type="text/javascript">
    let URLList     = "{{ url('api/list/tramites') }}";
    let URLStatus   = "{{ url('tramites/status/') }}";
    let URLAction   = "{{ url('tramites/') }}";
    let URLNew      = "{{ url('tramites/create') }}";
</script>

<script src="{{ asset('assets/js/general/forms.js') }}"></script>
<script src="{{ asset('assets/js/sections/tramites/table.js') }}"></script>
@endsection
