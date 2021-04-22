
var profile = function() {

    var passwordForm = $("#password-form");

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
    
    return {
        init: function () 
        {
            // $("#picture").change(readImage);
            // setImageProfile();

            $('#btn-save-password-form').on('click', function(e) {
                if(passwordForm.valid()) {
                    passwordForm.submit();
                }
            });
        }
    }
}();



$(document).ready(function() {
    profile.init();
});