var areas = function () {

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

    var save = function() {

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
    }

    /* Validación */
    var setValidation = function() {

        form.validate({
            onsubmit: false,
            errorElement: 'p',
            errorClass: 'help-block',
            rules: {
                name: {required: true},
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

    var remove = function(e) {
        
        swal({
            title: "Confirmación",
            text: "¿Desea eliminar la información de esta área?",
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
                    text: "La información de la área ha sido eliminada",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    $("#form-delete").submit();
                });
            }
        });
    };

    function setTable() {

        datatable = $('#table').DataTable({
            language: datatable_lang_es,
            "dom": '<"wrapper"litp>',
            "pageLength": 10,
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [1] }
            ]
        });
    }

    return {
        init: function () {
            
            if (form.length) {

                $("#btn-save").on("click", save);
                $("#btn-delete").on("click", remove);
                $(".btn-cancel").on("click", verifyChanges);
                setValidation();
            }

            setTable();
            $('.alert-success').delay(3000).slideUp('slow');
            $('#form-filters .filter').on( "keyup", searchByFilters);
        }
    }
}();

$(document).ready(function() {
    areas.init();
});
