var programs = function () {

	var form = $("#form");
    var formOriginal = form.serialize();
    var table = $("#table");
    var datatable;


    /* Buscar por filtros */
    var searchByFilters = function() {
        var inputs = $('#form-filters input');
        

        inputs.each( function(i) {
            datatable.column( i ).search(
                $(this).val()
            ).draw();
        });
    }

    var saveRegister = function() {

        if( form.valid() ) {

            if (window.location.href.indexOf("editar") > -1) {

                swal({
                    title: "Confirmación",
                    text: "¿Desea guardar cambios?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#1ab394",
                    confirmButtonText: "Si, Guardar Cambios",
                    cancelButtonText: "No, Cancelar"
                }, function (isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                });
            }
            else {
                form.submit();
            }

        }
        else {
            $("html, body").animate({scrollTop: 200}, "slow");
        }
        
    }

    /* Validación */
    var setValidation = function() {

        form.validate({
            onsubmit: false,
            errorElement: 'p',
            errorClass: 'help-block',
            rules: {
                name: {required: true},
                area_id:{required:true}
            }, 
            errorPlacement: function (error, element) { // render error placement for each input type
                var parent = $(element).closest(".form-group");
                var cont = $(element).parent(".input-group");

                parent.addClass('has-error');

                if (cont.size() > 0) {
                    cont.after(error);
                } else {
                    element.after(error);
                }
            },
            success: function (element) {
                element.closest(".form-group").removeClass("has-error");
            },
        }, false);

    }

    var verifyChanges = function(e) {
        e.preventDefault();
        var $btn = $(this);
        if (form.serialize() !== formOriginal) {
            swal({
                title: "Confirmación",
                text: "¿Has hecho cambios en el formulario, desea salir?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#f8ac59",
                confirmButtonText: "Si, Salir",
                cancelButtonText: "No, Cancelar"
            }, function (isConfirm) {
                if (isConfirm) {
                    location.href = $btn.attr('href');
                }
            });
        } else {
            location.href = $btn.attr('href');
        }
    }

    var deleteRegister = function(e) {
        e.preventDefault();
        swal({
            title: "Confirmación",
            text: "¿Desea eliminar la información de este programa?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, Cancelar",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal({
                    title: "Eliminado!",
                    type: "success",
                    text: "La información del programa ha sido eliminado",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    $("#form-delete").submit();
                });
            }
        });
    };

    var setTable = function() {

        datatable = $('#table').DataTable({
            language: datatable_lang_es,
            "dom": '<"wrapper"litp>',
            "pageLength": 10,
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [2] }
            ]
        });
    }

    var setAreas = function() 
    {
        $('#area_id').select2({
            theme: "bootstrap",
            tags: true,
            createTag: function (params) {
                return {
                  id: params.term,
                  text: params.term,
                  newOption: true
                }
            },
            templateResult: function (data) {
                var $result = $("<span></span>");

                $result.text(data.text);

                if (data.newOption) {
                  $result.append(" <em>(new)</em>");
                }

                return $result;
            }
        });
    }

    return {
        init: function () {


            if (form.length) {

                $("#btn-save").on("click", saveRegister);
                $("#btn-delete").on("click", deleteRegister);
                $(".btn-cancel").on("click", verifyChanges);

                
                setAreas();
                setValidation();
       
            }else{
                setTable();

                $('#form-filters .filter').on( "keyup", searchByFilters);
                $('.alert-success').delay(3000).slideUp('slow');
            }
            
        }
    }
}();

$(document).ready(function() {
    programs.init();
});
