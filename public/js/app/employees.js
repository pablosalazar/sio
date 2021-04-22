var employees = function() { 


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

    /* Calendarios */
    function setCalendars() {
        $('.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            language: 'es'
        });
    }

    /* Guardar */
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
        else {
            $("html, body").animate({scrollTop: 200}, "slow");
        }
        
    }

    var remove = function(e) {
        e.preventDefault();
        swal({
            title: "Confirmación",
            text: "¿Desea eliminar la información de este funcionario?",
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
                    text: "La información del funcionario ha sido eliminada",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    $("#form-delete").submit();
                });
            }
        });
    };

    /* Validación */
    var setValidation = function() {

        form.validate({
            onsubmit: false,
            errorElement: 'p',
            errorClass: 'help-block',
            rules: {
                first_name: {required: true},
                last_name: {required: true},
                document_type: {required: true},
                document_number: {required: true, digits: true},
                email: {email:true},
                personal_email: {email:true},
                residence_place: {required: true},
                type_contract: {required: true},
                type_employee: {required: true},
                area: {required: true},
                residence_place: {required: true},
                corporate_email: {required: true, email:true},
                birthdate: {format_DDMMYY:true},
                document_expedition_date: {format_DDMMYY:true}

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
            highlight: function(element) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass("has-error");
            },
        });
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

    function setTable() {
        datatable = $('#table').DataTable({
            language: datatable_lang_es,
            "dom": '<"wrapper"litp>',
            "pageLength": 10,
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [0,5] }
            ]
        });
    }

    var readImage = function() {
        var input = this;
        var profile = $('#picture_preview');
        var reader = new FileReader();


        var img_old = profile.attr('src');

        if (input.files && input.files[0]) {

            var filename = input.files[0].name;
            console.log("filename", filename);
            var ext = filename.substr( (filename.lastIndexOf('.') +1) ).toLowerCase();
            reader.onload = function (e) {

                if(ext == 'jpg' || ext == 'png' || ext == 'jpge')
                {
                    profile.attr('src', e.target.result);
                }
                else
                {
                    profile.attr('src', img_old);
                }
                setImageProfile();

            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            profile.attr('src', img_old);
        }
    }

    var setImageProfile = function() {
        
        var profile = $('#picture_preview');
        var image = new Image();
        image.src = profile.attr("src");
        image.onload = function() {
            if( this.width >= this.height) {
                profile.removeClass('profile-portrait').addClass('profile-landscape');
            }
            else {
                profile.removeClass('profile-landscape').addClass('profile-portrait');
            }
        };
    }

    var changeForm = function(){
        
        var select_type_contract = $("#type_contract").val();

        if(select_type_contract == "" || select_type_contract == "Contratista")
        {
            $('#fields_scale').fadeOut();
        }
        else {
            $('#fields_scale').fadeIn();
        }
    }

    return {
        init: function () {


            if (form.length) {

                $("#btn-save").on("click", save);
                $("#btn-delete").on("click", remove);
                $(".btn-cancel").on("click", verifyChanges);
                $("#picture").change(readImage);
                $("#type_contract").on('change', changeForm);

                $("#salary_field").mask("000,000,000", {reverse: true});

                setImageProfile();
                setCalendars();
                changeForm();
                setValidation();

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
                
                

            }else {
                setTable();
                $('#form-filters .filter').on( "keyup change", searchByFilters);
            }
            $('.alert-success').delay(3000).slideUp('slow');
        }

    }
}();


$(document).ready(function() {
    employees.init();
});

