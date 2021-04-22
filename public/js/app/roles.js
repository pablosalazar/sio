
var roles = function() {

	var form = $("#form");
	var form_delete = $("#form-delete");



    var deleteRegister = function(e) {
        e.preventDefault();
        swal({
            title: "Confirmación",
            text: "¿Desea eliminar este rol",
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
                    text: "La información del rol ha sido eliminada",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    form_delete.submit();
                });
            }
        });
    };


    var checkedAll = function(e) {

        var father = $(e.target).closest(".panel-primary");
        var inputs = father.find('input[type="checkbox"]');

        if(this.checked) {

            inputs.each(function() {
                $(this).prop('checked', true);
            });
        }
        else {
            inputs.each(function() {
                $(this).prop('checked', false);
            });
        }

    }

    return {
        init: function () {

            if(form.length)
            {
                $("#btn-delete").on("click", deleteRegister);

                $(".check-all").click(checkedAll);
            }
            else
            {

            }

        }
    }
}();



$(document).ready(function() {
    roles.init();
});