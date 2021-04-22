var formations = function(){

    var form = $("#form");

    var addEducation = function() 
    {
        var index = getCurrentRowIndex() + 1;
        var educationRow = getEducationRow();
        var educationRow = educationRow.replace(/INDEX/g, index);
       
        $("#list-educations").append(educationRow).children(':last').hide().fadeIn(400);
    }

    var deleteEducation = function() 
    {
        
        // var row = $("#list-educations").find('.formation');

        $(this).closest('.education').fadeOut(500, function() {
            $(this).remove();
        });
    }

    var getMaxOfArray = function(numArray) {
        return Math.max.apply(null, numArray);
    }

    var getCurrentRowIndex = function() {
        var indices = [];
        $(".education").each(function(elem){
            indices.push(parseInt(($(this).data("index"))));
        });
        return getMaxOfArray(indices);
    }


    var getEducationRow = function() {
        return '' +
            '<div class="education" data-index="INDEX">' +
                '<div class="col-md-3">' +
                    '<div class="form-group">' +
                        '<label>Tipo de formación</label>' +
                        '<select name="educations[INDEX][education]" class="form-control">' +
                            '<option value=" ">-- Elige una opción -- </option>' +
                            '<option>Técnica</option>' +
                            '<option>Tecnológica</option>' +
                            '<option>Tecnológica especializada</option>' +
                            '<option>Universitaria</option>' +
                            '<option>Especialización</option>' +
                            '<option>Maestría</option>' +
                            '<option>Doctorado</option>' +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                    '<div class="form-group">' +
                        '<label>Título</label>' +
                        '<input type="text" name="educations[INDEX][degree]"  class="form-control" />' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                    '<div class="form-group">' +
                        '<label>Institución</label>' +
                        '<input type="text" name="educations[INDEX][institute]" class="form-control" />' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<div class="form-group">' +
                        '<label>Estado</label>' +
                        '<select name="educations[INDEX][state]" class="form-control">' +
                            '<option value=" ">-- Elige una opción -- </option>' +
                            '<option>Graduado</option>' +
                            '<option>No Graduado</option>' +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-1 m-t-md">' +
                    '<button type="button" class="btn btn-danger btn-circle center-block btn-remove-education">' +
                    '<i class="fa fa-minus"></i></button>' +
                '</div>' +
            '</div>';
    }

    return {
        init: function() {

            if(form.length)
            {
                $("#btn-add-education").on('click', addEducation);
                $("#list-educations").on('click', '.btn-remove-education', deleteEducation);
                
                
           
            }

            


        }
    }

}();

$(document).ready(function() {
    formations.init();
});
