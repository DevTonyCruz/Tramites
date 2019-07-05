
<nav class="side-navbar box-scroll sidebar-scroll">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li><a href="#dropdown-db" aria-expanded="false" data-toggle="collapse"><i class="la la-columns"></i><span>General</span></a>
            <ul id="dropdown-db" class="collapse list-unstyled show pt-0">
                <li><a href="{{ url('/users') }}">Usuarios</a></li>
                <li><a href="db-clean.html">Roles</a></li>
                <li><a href="db-compact.html">Configuraciones</a></li>
            </ul>
        </li>
        <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Gestor de tramites</span></a>
            <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                <li><a href="{{ url('/tramites') }}">Tramites</a></li>
                <li><a href="{{ url('/gestion') }}">Gestiones</a></li>
                <li><a href="{{ url('/remitente') }}">Remitentes</a></li>
                <li><a href="app-contact.html">Contact</a></li>
            </ul>
        </li>
        <!-- <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Módulo 2</span></a>
            <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                <li><a href="app-calendar.html">Tramites</a></li>
                <li><a href="app-chat.html">Gestiones</a></li>
                <li><a href="app-mail.html">Mail</a></li>
                <li><a href="app-contact.html">Contact</a></li>
            </ul>
        </li>
        <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Módulo 3</span></a>
            <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                <li><a href="app-calendar.html">Tramites</a></li>
                <li><a href="app-chat.html">Gestiones</a></li>
                <li><a href="app-mail.html">Mail</a></li>
                <li><a href="app-contact.html">Contact</a></li>
            </ul>
        </li> -->
    </ul>
    <!-- End Main Navigation -->
</nav>
