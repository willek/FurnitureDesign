/*
 *  Document   : readyLogin.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Login page
 */

var ReadyLogin = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Login form - Initialize Validation */
            $('#form-login').validate({
                errorClass: 'help-block animation-slideUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'login-name': {
                        required: true
                    },
                    'login-password': {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    'login-name': 'Please enter your name',
                    'login-password': {
                        required: 'Please provide your password',
                        minlength: 'Your password must be at least 8 characters long'
                    }
                }
            });
        }
    };
}();