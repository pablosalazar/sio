<?php

    $educations_list = [
        '' => '-- Elige una opción --',
        'Técnica' => 'Técnica',
        'Tecnológica' => 'Tecnológica',
        'Tecnológica especializada' => 'Tecnológica especializada',
        'Universitaria' => 'Universitaria',
        'Especialización' => 'Especialización',
        'Maestría' => 'Maestría',
        'Doctorado' => 'Doctorado'
    ];

    $states_list = [
        '' => '-- Elige una opción --',
        'Graduado' => 'Graduado',
        'No Graduado' => 'No Graduado',
    ];


    if(Session::has('educations'))
    {
        $educations = Session::get('educations');
    }
    else 
    {
        if(!isset($educations)) {
             $educations = [];
        }
       
    }
?>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Estudios realizados </h5>
            <div class="ibox-tools">
                <a class="btn-ibox" id="btn-add-education">Agregar otro estudio</a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                
                <div id="list-educations">
                    @if(count($educations))
                        @foreach($educations as $key => $item)
                            <div class="education" data-index="<?=$key?>">

                                @if(isset($item['id']))
                                    <input type="hidden" name="educations[<?=$key?>][id]" value="{{ $item['id'] }}">
                                @endif

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tipo de formación</label>
                                        <select name="educations[<?=$key?>][education]" class="form-control">

                                            @foreach( $educations_list as $k =>$v)
                                                @if($item['education']==$k)
                                                    <option value="{{ $k }}" selected>{{ $v }}</option>
                                                @else
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="educations[<?=$key?>][degree]" class="form-control" value="{{ $item['degree'] }}" />

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Institución</label>
                                        <input type="text" name="educations[<?=$key?>][institute]" class="form-control" value="{{ $item['institute'] }}" />

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="educations[<?=$key?>][state]" class="form-control">
                                            @foreach( $states_list as $k =>$v)
                                                @if($item['state']==$k)
                                                    <option value="{{ $k }}" selected>{{ $v }}</option>
                                                @else
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1 m-t-md">
                                    <button type="button" class="btn btn-danger btn-circle center-block btn-remove-education">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="education" data-index="0">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo de formación</label>
                                    <select name="educations[0][education]" class="form-control">
                                        @foreach( $educations_list as $key =>$value)
                                             <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="educations[0][degree]"  class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Institución</label>
                                    <input type="text" name="educations[0][institute]" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="educations[0][state]" class="form-control">
                                        @foreach( $states_list as $k =>$v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 m-t-md">
                                <button type="button" class="btn btn-danger btn-circle center-block btn-remove-education">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>