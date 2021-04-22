<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form id="form-filters" class="form-inline">
                    <div class="form-group">
                        {{ Form::text('name', null, ['class' => 'form-control filter', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('document_number', null, ['class' => 'form-control filter', 'placeholder' => 'Número de identificación', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('ficha', null, ['class' => 'form-control filter', 'placeholder' => 'Ficha', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group m-t-xs m-l-xs">
                        <a href="{{ route('aprendices.index') }}" class="btn btn-default">Mostrar todos</a>
                    </div>
                    <div class="pull-right">
                        
                        <a href="{{ route('aprendices.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Agregar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



