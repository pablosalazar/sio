var student = function() 
{
    var form = $("#form");
    var formOriginal = form.serialize();
    var datatable;

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

    var remove = function(e) {
        e.preventDefault();
        swal({
            title: "Confirmación",
            text: "¿Desea eliminar la información de este aprendiz?",
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
                    text: "La información del aprendiz ha sido eliminada",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    $("#form-delete").submit();
                });
            }
        });
    };

    /* Buscar por filtros */
    var searchByFilters = function() {
        var inputs = $('#form-filters .filter');
    
        inputs.each( function(i) {
            datatable.column( i+1 ).search(
                $(this).val()
            ).draw();
        });
    }

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
                email: {required: true, email:true},
                personal_email: {email:true},
            }, 
            highlight: function(element) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass("has-error");
            },
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
        image.onload = function() 
        {
            if( this.width >= this.height) {
                profile.removeClass('profile-portrait').addClass('profile-landscape');
            }
            else {
                profile.removeClass('profile-landscape').addClass('profile-portrait');
            }
        };
    }

    var setTable = function() {

        datatable = $('#table').DataTable({
            language: datatable_lang_es,
            "dom": '<"wrapper"litp>',
            "pageLength": 10,
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [0,5] }
            ]
        });
    }

    var loadDataCourse = function()
    {
        var course_id  = $('select[name=course_id] option:selected').val();
        
        if(course_id == "" || course_id == undefined) {
            fillForm();
        }
        else
        {
            $.get(url_base + "api/course/" + course_id, function(data, status){
                fillForm(data);
            });    
        }
    }

    var fillForm = function(data = null)
    {
        if(data === null) {
            $("#area").val("");
            $("#programa").val("");
            $("#start_date").val("");
            $("#end_date").val("");
        }
        else {
            $("#area").val(data.program.area ? data.program.area.name:'');
            $("#programa").val(data.program ? data.program.name:'');
            $("#start_date").val(data.start_date);
            $("#end_date").val(data.end_date);
        }
    }



    return {
        init: function() {

            setImageProfile();

            if(form.length)
            {
                $('#btn-save').on('click', save);
                $("#btn-delete").on("click", remove);
                $('.btn-cancel').on('click', verifyChanges);
                $("#picture").change(readImage);
                $("#course_id").change(loadDataCourse);

                setImageProfile();

                $('#course_id').select2({
                    theme: "bootstrap",
                    placeholder: "Escribe o seleccione una opción",
                    allowClear:true,
                });

                loadDataCourse();
                setValidation();

            }
            else
            {
                setTable();
                $('#form-filters .filter').on( "keyup", searchByFilters);
                $('.alert-success').delay(3000).slideUp('slow');
                
            }
        }
    }

}();

$(document).ready(function() {
    student.init();
});

