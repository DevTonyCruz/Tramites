
<nav class="side-navbar box-scroll sidebar-scroll shrinked">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li><a href="#dropdown-db" aria-expanded="false" data-toggle="collapse"><i class="la la-columns"></i><span>General</span></a>
            @php
                $show = '';
                if(request()->is('users')){
                    $show = 'show';
                }
            @endphp
            <ul id="dropdown-db" class="collapse list-unstyled {{ $show }} pt-0">
                <li><a class="{{ (request()->is('users')) ? 'active' : '' }}" href="{{ url('/users') }}">Usuarios</a></li>
                <li><a href="#">Roles</a></li>
                <li><a href="#">Configuraciones</a></li>
            </ul>
        </li>
        @php
            $show = '';
            if(request()->is('tramites') || request()->is('gestion') || request()->is('remitente')){
                $show = 'show';
            }
        @endphp
        <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Gestor de tramites</span></a>
            <ul id="dropdown-app" class="collapse list-unstyled {{ $show }} pt-0">
                <li><a class="{{ (request()->is('tramites')) ? 'active' : '' }}" href="{{ url('/tramites') }}">Tramites</a></li>
                <li><a class="{{ (request()->is('gestion')) ? 'active' : '' }}" href="{{ url('/gestion') }}">Gestiones</a></li>
                <li><a class="{{ (request()->is('remitente')) ? 'active' : '' }}" href="{{ url('/remitente') }}">Remitentes</a></li>
            </ul>
        </li>
        @php
            $show = '';
            if(request()->is('directorio') || request()->is('profesiones') || request()->is('grupos') || request()->is('fechas')){
                $show = 'show';
            }
        @endphp
        <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Directorio de campaña</span></a>
            <ul id="dropdown-app" class="collapse list-unstyled {{ $show }} pt-0">
                <li><a class="{{ (request()->is('directorio')) ? 'active' : '' }}" href="{{ url('/directorio') }}">Directorio</a></li>
                <li><a class="{{ (request()->is('profesiones')) ? 'active' : '' }}" href="{{ url('/profesiones') }}">Profesiones</a></li>
                <li><a class="{{ (request()->is('grupos')) ? 'active' : '' }}" href="{{ url('/grupos') }}">Grupos</a></li>
                <li><a class="{{ (request()->is('fechas')) ? 'active' : '' }}" href="{{ url('/fechas') }}">Fechas</a></li>
            </ul>
        </li>
    </ul>
    <!-- End Main Navigation -->
</nav>
