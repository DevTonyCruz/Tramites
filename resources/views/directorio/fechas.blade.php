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
            <div class="col-xl-2 col-md-4 col-sm-12">
                <a href="{{ Route('directorio.create') }}" class="w-100">
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

            <div class="col-xl-2 col-md-4 col-sm-12">
                <a href="javascript:void(0)" class="w-100" data-toggle="modal" data-target="#modal-centered">
                <div class="widget widget-12 bg-gradient-02 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-code-download text-white"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-white">Descargar</div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12">
                <div class="widget widget-12 bg-gradient-success has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-compose text-white"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-white">Fechas</div>
                                <div class="number text-white">0 Próximos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12">
                <div class="widget widget-12 bg-gradient-dark has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-checkmark text-white"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-white">Cerrados</div>
                                <div class="number text-white">0 Registros</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12">
                <div class="widget widget-12 bg-gradient-warning has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-alert text-white"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-white">Avisos</div>
                                <div class="number text-white">0 Registros</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-12">
                <div class="widget widget-12 bg-gradient-danger has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-alert-circled text-white"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-white">Vencidos</div>
                                <div class="number text-white">0 Registros</div>
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
                <table id="directorio-list" class="table mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Politico</th>
                            <th>Profesión</th>
                            <th>Grupo</th>
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
                    <form action="{{ route('directorio.export') }}" method="POST">
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
                            <div class="form-row align-items-center">
                                <div class="col-12">
                                    <label class="sr-only" for="inlineFormInput">Estatus</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="S" selected disabled>Seleccionar estatus</option>
                                        <option value="T">Todos</option>
                                        <option value="E">En tramite</option>
                                        <option value="C">Cerrados</option>
                                        <option value="P">Por vencer</option>
                                        <option value="V">Vencidos</option>
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
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>

<script type="text/javascript">
    let URLList     = "{{ url('api/list/directorio') }}";
    let URLStatus   = "{{ url('directorio/status/') }}";
    let URLAction   = "{{ url('directorio/') }}";
    let URLNew      = "{{ url('directorio/create') }}";
</script>

<script src="{{ asset('assets/js/general/forms.js') }}"></script>
<script src="{{ asset('assets/js/sections/directorio/table.js') }}"></script>
@endsection
