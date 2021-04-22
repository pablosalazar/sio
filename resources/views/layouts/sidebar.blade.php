<?php

    
   
    function set_active($route)
    {
        $path = str_replace('/', '', Request::path());


        if($path == "" && $route == "/") {
            return "active";
        }
        return str_contains($path, $route) ? 'active' : '';
    }

?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <div class="text-center">
                        <img alt="image" class="img-circle" src="{{ asset('img/logo-sena.svg') }}" />
                     </div>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-md"> <strong class="font-bold">{{ auth()->user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ auth()->user()->roles()->first()->name }} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('profile') }}">Perfil</a></li>
                        <li>
                            <a class="dropdown-item" href=":;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    SIO
                </div>
            </li>
            <li class="{{ set_active('/') }}">
                <a href="{{ url('/') }}"><i class="icon-home"></i> <span class="nav-label">Inicio</span></a>
            </li>

            <li class="{{ set_active('funcionarios') }}">
                <a href="{{ url('funcionarios') }}"><i class="icon-briefcase"></i> <span class="nav-label">Funcionarios</span></a>
            </li>            

            <li class="{{ set_active('contratos') }}">
                <a href="{{ url('contratos') }}" ><i class="icon-docs"></i> <span class="nav-label">Contratos</span></a>
            </li> 

            <li class="{{ set_active('supervisores') }}">
                <a href="{{ url('supervisores') }}" ><i class="icon-shield"></i> <span class="nav-label">Supervisores</span></a>
            </li>

            <li class="{{ set_active('aprendices') }}">
                <a href="{{ url('aprendices') }}" ><i class="icon-graduation"></i> <span class="nav-label">Aprendices</span></a>
            </li>

            
            <li class="{{ set_active('porteria') }}">
                <a href="{{ url('porteria/busqueda-manual') }}"><i class="icon-flag"></i> <span class="nav-label">Porteria</span></a>
            </li>
            <li class="{{ set_active('horarios') }}">
                <a href="{{ url('horarios') }}"><i class="icon-clock"></i> <span class="nav-label">Horarios</span></a>
            </li>
            
            <li class="{{ set_active(['usuarios', 'roles']) }}">
                <a href="#"><i class="icon-people"></i> <span class="nav-label">Acceso</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height:0px;">
                    <li class="{{ set_active('usuarios') }}">
                        <a href="{{ url('usuarios') }}" ><i class="icon-user"></i> <span class="nav-label">Usuarios</span></a>
                    </li>
                    <li class="{{ set_active('roles') }}">
                        <a href="{{ url('roles') }}" ><i class="icon-organization"></i> <span class="nav-label">Roles</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ set_active(['areas', 'fichas', 'ambientes', 'programas']) }}">
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Configuraciones</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height: 0px;">
                    <li class="{{ set_active('areas') }}">
                        <a href="{{ url('areas') }}" ><i class="icon-direction"></i> <span class="nav-label">Áreas</span></a>
                    </li>
                    <li class="{{ set_active('programas') }}">
                       <a href="{{ url('programas') }}" ><i class="icon-notebook"></i> <span class="nav-label">Programas</span></a>
                    </li>
                    <li class="{{ set_active('fichas') }}">
                       <a href="{{ url('fichas') }}" ><i class="icon-layers"></i> <span class="nav-label">Fichas</span></a>
                    </li>
                    <li class="{{ set_active('ambientes') }}">
                       <a href="{{ url('ambientes') }}" ><i class="icon-grid"></i> <span class="nav-label">Ambientes</span></a>
                    </li>
                   
                </ul>
            </li>
            
        </ul>
    </div>
</nav>