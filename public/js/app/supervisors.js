var supervisor =function() {
	
	var table = $("#table");
    var datatable;

	function setTable() {

        datatable = $('#table').DataTable({
            language: datatable_lang_es,
            "pageLength": 10,
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [0, 5] }
            ],
            
        });
    }

    var remove = function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Confirmación",
            text: "¿Desea quitar a este funcionario de la lista de supervisores?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Si, Quitar",
            cancelButtonText: "No, Cancelar",
            closeOnConfirm: false
        }, function (isConfirm) {
            if(isConfirm) {
                var action = $("#form-remove").attr('action').replace('EMPLOYEE_ID', id);
                $("#form-remove").attr('action', action);
                $("#form-remove").submit();    
            }
            
            
        });
    };


	return {
        init: function() {
        	setTable();
            $(".btn-remove").on("click", remove);
            $('.alert-success').delay(3000).slideUp('slow');

            $('#employees_select').select2({
                theme: "bootstrap",
                placeholder: "Escribe o seleccione una opción",
                allowClear: true
            });
     	}
 	}
}();
$(document).ready(function() {
    supervisor.init();
});
