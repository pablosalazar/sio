var contracts = function() 
{
    var form = $("#form");
    var formOriginal = form.serialize();
    var datatable;
    

    /* Buscar por filtros */
    var searchByFilters = function() {
        var inputs = $('#form-filters .filter');
        

        inputs.each( function(i) {
            datatable.column( i+1 ).search(
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

    var deleteRegister = function(e) {
        e.preventDefault();
        swal({
            title: "Confirmación",
            text: "¿Desea eliminar la información de este contrato?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, Cancelar",
            closeOnConfirm: false
        }, function (isConfirm) {       
            $("#form-delete").submit();
        });
    };

    var verifyChanges = function(e) {
        e.preventDefault();
        var $btn = $(this);

        if (form.serialize() !== formOriginal) {
            swal({
                title: "Confirmación",
                text: "¿Has hecho cambios en el formulario, desdea salir?",
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

    /* Validación */
    var setValidation = function() {

        form.validate({
            onsubmit: false,
            errorElement: 'label',
            errorClass: 'error',
            rules: {
                tipo: {required: true},
                numero: {required: true, digits: true},
                SIIF: {required: true, digits: true},
                fecha: {required: true, format_DDMMYY:true},
                legalization_date: {required:true, format_DDMMYY:true},
                start_date: {required: true, format_DDMMYY:true},
                end_date: {required: true, format_DDMMYY:true},
                value: {required: true, digits: true},
                monthly_value: {digits: true},
                supervisor: {required: true},
                date_expedition_date: { format_DDMMYY:true},
                arl_expedition_date: {format_DDMMYY:true},
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
        });
    }

    var setTable = function() {

        datatable = $('#table').DataTable({
            language: datatable_lang_es,
            "dom": '<"wrapper"litp>',
            "pageLength": 10,
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [0,5] }
            ],
           
        });
    }

    var setCalendars = function() {

        $('.calendar').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            startView: 1,
            todayBtn: "linked",
            language: 'es'
        });

        $('.calendar_only_month_year').datepicker({            
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            startView: 1,
            todayBtn: "linked",
            language: 'es',
            format: "MM/yyyy",
            viewMode: "months", 
            minViewMode: "months"
        });


    }

    return {
        init: function() {

            

            if(form.length)
            {
                $('#btn-save').on('click', saveRegister);

                $('.btn-cancel').on('click', verifyChanges);

                setCalendars();
                // setValidation();

                $('#area_id').select2({
                    theme: "bootstrap",
                    placeholder: "Escribe o seleccione una opción",
                    allowClear:true,
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
            else
            {
                setTable();
                $('.alert-success').delay(3000).slideUp('slow');
                $('#form-filters .filter').on( "keyup change", searchByFilters);
                $('#btn-delete').on('click', deleteRegister);
            }
            
        }
    }

}();

$(document).ready(function() {
    contracts.init();
});

