@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"><a href="{{ url('/configuration') }}">Configuraciones</a></h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/configuration') }}">Configuraciones</a></li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="widget has-shadow col-lg-6 col-md-12">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Editar</h4>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="{{ url('configuration/' . $configuration->id) }}"
                    method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row d-flex align-items-center">
                        <label for="nombre" class="col-lg-3 form-control-label">Llave</label>
                        <label for="nombre" class="col-lg-9 form-control-label">{{ $configuration->key }}</label>
                    </div>  
                    
                    @if($configuration->type == 'file')
                    <div class="form-group row d-flex align-items-center mb-3">
                        <label class="col-3 col-form-label">*Valor</label>
                        <div class="col-9">
                            <div class="custom-file">
                                <input type="file" id="value" name="value"
                                    class="custom-file-input form-control file-image{{ $errors->has('value') ? ' is-invalid' : '' }}"
                                    accept="image/x-png,image/gif,image/jpeg">
                                @if ($errors->has('value'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('value') }}</strong>
                                </span>
                                @endif
                                <label class="custom-file-label">
                                    Elige un archivo
                                </label>
                            </div>
                            <div class="mt-3">
                                @if($configuration->value == '')
                                <img src="" class="img-thumbnail preview" width="100px">
                                @else
                                <img src="{{ asset($configuration->value) }}" class="img-thumbnail preview" width="100px">
                                @endif
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="form-group row d-flex align-items-center mb-3">
                        <label for="value" class="col-3 col-form-label">*Valor</label>
                        <div class="col-9">
                            <input type="{{ $configuration->type }}" @if($configuration->type=='tel' && $configuration->alias=='telefono_contacto') data-toggle="input-mask" data-mask-format="00 00 00 00 00 00" minlength=10  @elseif($configuration->type=='tel' && $configuration->alias=='whatsapp') data-toggle="input-mask" data-mask-format="0000000000" minlength=10  @endif class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}"
                                id="value" name="value" placeholder="Ingrese el valor de esta configuración"
                                value="{{ $configuration->value }}" {{ ($configuration->required == 1) ? 'required' : '' }}>
                            @if ($errors->has('value'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('value') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="em-separator separator-dashed"></div>
                    <div class="text-right">
                        <button class="btn btn-gradient-01" type="submit">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>

<script type="text/javascript">
    $("#save-button").on('click', function(){
        $("#form-tramites").submit();
    })
</script>
@endsection


