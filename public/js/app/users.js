
var users = function() {

	var form = $("#form");
    var passwordForm = $("#password-form");
    var formOriginal = form.serialize();
    var validator;



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
            text: "¿Desea eliminar la información de este usuario?",
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
                    text: "La información del usuario ha sido eliminada",
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

        validator = form.validate({
            onsubmit: false,
            errorElement: 'p',
            errorClass: 'help-block',
            rules: {
                name: {required: true},
                email: {email:true},
                username: {required:true},
                rol: {required:true}
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

    var setValidationPasswordForm = function() {

        passwordForm.validate({
            onkeyup: false,
            errorClass: 'error',
            validClass: 'valid',
            highlight: function(element) {
                $(element).closest('div').addClass("f_error");
            },
            unhighlight: function(element) {
                $(element).closest('div').removeClass("f_error");
            },
            rules: {
                password: {required: true, minlength: 5},
                password_confirmation: { equalTo: "#password" }
            }
        });

    }

    var loadDataEmployee = function () 
    {
        var id = $(this).val();

        if(id == "") {
            fillForm();
        }
        else
        {
            $.get(url_base + "api/employees/" + id, function(data, status){
                fillForm(data);
            });    
        }
    }

    var fillForm = function(data = null) {
        validator.resetForm();
        form.find('.form-group').removeClass("has-error");

        if(data === null) {
            $("#name").val("");
            $("#email").val("");
            $("#username").val("");
            $("#password").val("");
            $("#password_confirmation").val("");
        }
        else {
            $("#name").val(data.first_name + " " + data.last_name);
            $("#email").val(data.email);
            $("#username").val(data.document_number);
            $("#password").val(data.document_number);
            $("#password_confirmation").val(data.document_number);
        }
        

    }

    return {
        init: function () {
            
            if (form.length) 
            {
                $('#user_id').select2({
                    theme: "bootstrap",
                });

                $("#btn-save").on("click", save);
               

                $('#btn-save-password-form').on('click', function(e) {
                    if(passwordForm.valid()) {
                        passwordForm.submit();
                    }
                });

                $('#user_id').change(loadDataEmployee);
                $("#btn-delete").on("click", remove);

                setValidation();
                setValidationPasswordForm();

            } else {
               
            }

        }
    }
}();



$(document).ready(function() {
    users.init();
});