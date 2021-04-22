    @if( $errors->any() )
        <br>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                Algunos campos presentan conflicto
            </div>
        </div>
    @endif

    @if (session('status'))
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        </div>
        <br>
    @endif

    <div class="col-md-12">
        <p class="text-muted">
            Los campos marcados con (<span class="f_req">*</span>) son obligatorios
        </p>
    </div>

    <!-- Informacion del Rol -->
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Configuración del rol</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('name', ['label' => 'Asigna un nombre al rol', 'required']) !!}
                    </div>

                    
                    <div class="col-md-12">
                        <h3 class="text-uppercase">PERMISOS PARA ESTE ROL</h3>
                        <hr>
                    </div>

                    <?php
                        $module  = "";
                        $roles_es = [
                            "users" => "Usuarios",
                            "employees" => "Funcionarios",
                            "roles" => "Roles"
                        ];

                        $action_es = [
                            "view"  => "Ver",
                            "add"   => "Agregar",
                            "edit"  => "Editar",
                            "delete" => "Borrar",
                        ]
                    ?>
                    @foreach($permissions as $perm)
                        <?php
                            $per_found = null;

                            if( isset($role) ) {
                                $per_found = $role->hasPermissionTo($perm->name);
                            }
                        ?>
                        @if($module != "" and $module != last(explode("_", $perm->name)))
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($module != last(explode("_", $perm->name)))
                            <?php $module = last(explode("_", $perm->name)); ?>
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-uppercase">
                                        Modulo {{ $roles_es[$module] }}

                                        <div class="checkbox pull-right">
                                            <label>
                                                {!! Form::checkbox('checkall', "", false, ['class'=>'check-all']) !!} Todos
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="panel-body">
                        @endif


                        <?php 
                            $permission_name = $action_es[array_first(explode("_", $perm->name))]; 
                        ?>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!}  {{ $permission_name }}
                                </label>
                            </div>
                        </div>
                    @endforeach

                    @if(count($permissions))
                                    </div>
                                </div>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    

    <div class="col-md-6 text-right">
        <button type="submit" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
        <a href="{{ url('roles') }}" class="btn btn-default btn-cancel">Cancelar</a>
    </div>
