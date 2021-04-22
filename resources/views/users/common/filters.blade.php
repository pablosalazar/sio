<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form id="form-filtros" class="form-inline">
                    <div class="form-group">
                        {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Cargo', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Área', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group m-t-xs m-l-xs">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-default">Mostrar todos</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('usuarios.create') }}" class="btn btn-primary m-t-xs"><i class="fa fa-plus"></i> Agregar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



