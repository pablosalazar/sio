
var security = function() {

    var search_field = $("#search_field");
    var form = $('#form-search');

	var setImageProfile = function() {
        
        var profile = $('#picture_preview');

        if(profile.length) {
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

        
    }

    return {
        init: function () {
            
            setTimeout(function(){ 
                search_field.focus(); 
            }, 1500);

            if($("#info").length)
            {
                setTimeout(function(){
                   location.href = 'busqueda-por-codigo-de-barras';
                }, 3000);
            }

            if(form.length)
            {
                // search_field.keydown(function() {
                //   //code to not allow any changes to be made to input field
                //   return false;
                // });

                $("body").bind("propertychange change input paste", "#search_field", function(){
                    form.submit();
                });
            }
                
            

            
        	setImageProfile();
            

            

        }
    }
}();



$(document).ready(function() {
    security.init();
});