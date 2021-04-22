<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form id="form-filters" class="form-inline">
                    <div class="form-group">
                        {{ Form::text('name', null, ['class' => 'form-control filter', 'placeholder' => 'nombre del área', 'style' => 'width:400px']) }}
                    </div>
                    <div class="form-group m-t-xs m-l-xs">
                        <a href="{{ route('areas.index') }}" class="btn btn-default">Mostrar todos</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('areas.create') }}" class="btn btn-primary m-t-xs"><i class="fa fa-plus"></i> Agregar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>