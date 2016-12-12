var Login = function() {

    var handleLogin = function() {
        $('.login-form').validate({
            errorElement : 'span', // default input error message container
            errorClass : 'help-block', // default input error message class
            focusInvalid : false, // do not focus the last invalid input
            ignore: "",
            focusCleanup: true,
            rules : {
                user : {
                    required : true
                },
                mm : {
                    required : true
                },
            },

            messages : {
                user : {
                    required : "用户名不能为空."
                },
                mm : {
                    required : "密码不能为空."
                }
            },

            highlight: function(element) {
             	console.log("high"+element);
                $(element).closest('.controls').addClass('has-error');
            },

            success : function(label) {
             	console.log("success"+label);
                label.closest('.controls').removeClass('has-error');
                label.remove();
            },

            errorPlacement : function(error, element) {
             	console.log(error);
             	console.log(element);
                error.insertAfter(element);
            },

            submitHandler : function(form) {
                form.submit();
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit();
                }
                return false;
            }
        });
         
          $('#login').on('click',function(){
                $('.login-form').submit();
          	});
    }

    return {
        // main function to initiate the module
        init : function() {
            handleLogin();
        }

    };

}();
