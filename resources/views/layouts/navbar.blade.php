<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{url()}}">Sistema</a>
        
        </div>


        <ul class="nav navbar-nav navbar-right">
                
          @if (Auth::check())
        <li><a href="{{url('user')}}">{{Auth::user()->name}}</a></li>
           <!-- @if (Auth::user()->user == 1)-->
           @if(Auth::user()->user==1)
<!--    <div class="panel-heading">-->
      <li><a data-toggle="collapse" href="#collapse1" style="font-weight: bold;">Gestion Usuarios
        <span class="caret"></span></a>
        <div id="collapse1" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <a href="{{url('admin/createadmin')}}" class="list-group-item">Crear usuario</a>
            <!--<a href="{{url('admin/createuser')}}" class="list-group-item">Crear usuario</a>-->
            <a href="{{url('admin/index')}}" class="list-group-item">Ver Usuarios</a>
        </div>
      </li>
      <li><a data-toggle="collapse" href="#collapse2" style="font-weight: bold;">Gestion Conductor
        <span class="caret"></span></a>
        <div id="collapse2" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <a href="{{url('createEmpleado')}}" class="list-group-item">Crear empleado</a>
            <a href="{{url('indexEmpleado')}}" class="list-group-item">Ver empleados</a>
        </div>
      </li>
      <li><a data-toggle="collapse" href="#collapse3" style="font-weight: bold;">Gestion Vehiculo
        <span class="caret"></span></a>
        <div id="collapse3" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <a href="{{url('createVehiculo')}}" class="list-group-item">Crear vehiculo</a>
            <a href="{{url('indexVehiculo')}}" class="list-group-item">Ver vehiculos</a>
        </div>
      </li>
      <li><a data-toggle="collapse" href="#collapse4" style="font-weight: bold;">Gestion Rutas
        <span class="caret"></span></a>
        <div id="collapse4" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <a href="{{url('rutacreate')}}" class="list-group-item">Crear ruta</a>
            <a href="{{url('rutaindex')}}" class="list-group-item">Ver rutas</a>
        </div>
      </li>
<!--      <li style="font-weight: bold;"><a data-toggle="collapse" href="#collapse2">Crear Usuarios prueba 2
        <span class="caret"></span></a>
        <ul id="collapse2" class="panel-collapse collapse dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>-->
      
<!--    </div>-->
 <div id="collaps3" class="panel-collapse collapse">
        <li><li><a href="{{url('admin/createadmin')}}">Crear usuario administrador</a></li>
        <li><li><a href="{{url('admin/createuser')}}">Crear usuario</a></li>

        </div>   <li><a href="{{url('admin')}}">Panel de Administrador</a></li>
            @endif
        <!--<li class='active'><a href="{{url('auth/logout')}}">Salir</a></li>-->
           @elseif(Auth::user()->user!=1)
<!--    <div class="panel-heading">-->
      <li><a data-toggle="collapse" href="#collapse1" style="font-weight: bold;">Gestion Usuarios
        <span class="caret"></span></a>
        <div id="collapse1" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
            <!--<a href="{{url('admin/createadmin')}}" class="list-group-item">Crear usuario administrador</a>
            <a href="{{url('admin/createuser')}}" class="list-group-item">Crear usuario</a>-->
        </div>
      </li>
      <li><a data-toggle="collapse" href="#collapse2" style="font-weight: bold;">Gestion Conductor
        <span class="caret"></span></a>
        <div id="collapse2" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
           <!-- <a href="{{url('createEmpleado')}}" class="list-group-item">Crear empleado</a>-->
            <a href="{{url('indexEmpleado')}}" class="list-group-item">Ver empleados</a>
        </div>
      </li>
      <li><a data-toggle="collapse" href="#collapse3" style="font-weight: bold;">Gestion Vehiculo
        <span class="caret"></span></a>
        <div id="collapse3" class="panel-collapse collapse list-group" style="width:220px;float:right;position:absolute;">
           <!-- <a href="{{url('createEmpleado')}}" class="list-group-item">Crear empleado</a>-->
            <a href="{{url('indexVehiculo')}}" class="list-group-item">Ver vehiculos</a>
        </div>
      </li>
<!--      <li style="font-weight: bold;"><a data-toggle="collapse" href="#collapse2">Crear Usuarios prueba 2
        <span class="caret"></span></a>
        <ul id="collapse2" class="panel-collapse collapse dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>-->
      
<!--    </div
 <div id="collaps3" class="panel-collapse collapse">
        <li><li><a href="{{url('admin/createadmin')}}">Crear usuario administrador</a></li>
        <li><li><a href="{{url('admin/createuser')}}">Crear usuario</a></li>

        </div>   <li><a href="{{url('admin')}}">Panel de Administrador</a></li>-->
<!--__________________________________________________________        -->

<!--__________________________________________________________        -->
        @endif
            <li class='active'><a href="{{url('auth/logout')}}">Salir</a></li>
        @else
            <li><li><a href="{{url('auth/login')}}">Iniciar sesión</a></li>
        @endif
        </ul>
    </div>

</nav>

