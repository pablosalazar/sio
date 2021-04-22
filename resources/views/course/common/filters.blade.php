<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form id="form-filters" class="form-inline">
                    <div class="form-group">
                        {{ Form::text('code', null, ['class' => 'form-control filter', 'placeholder' => 'Codigo']) }}
                    </div>
                    <div class="form-group m-t-xs m-l-xs">
                        <a href="{{ route('fichas.index') }}" class="btn btn-default">Mostrar todos</a>
                    </div>
                    <a href="{{ route('fichas.create') }}" class="btn btn-primary m-t-xs" style="float:right"><i class="fa fa-plus"></i> Agregar</a>
                </form>
            </div>
        </div>
    </div>
</div>