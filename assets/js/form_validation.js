/**
 * Created by Игорь on 22.07.2016.
 */

(function ($) {
    $.fn.addAlert = function (typeClass, alertText) {

        // Creating alert element
        var alert = $(document.createElement('div'))
            .addClass('alert alert-' + typeClass + ' alert-dismissible fade in')
            .attr({
                'id': 'login-messages',
                'role': 'alert'
            })
            .html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + alertText);

        // Adding alert element to a given selector
        $(this).prepend(alert);

        return this;
    }
})(jQuery);

$(document).ready(function() {
    // Best regex for email
    $.validator.methods.email = function( value, element ) {
        return this.optional( element ) || /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i.test( value );
    };
    // Form validation
    $('#login-form').validate({

        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $(element).closest('.input-group').siblings('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-warning-sign');
            $(element).addClass('invalid').removeClass('valid');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.input-group').siblings('.form-control-feedback').removeClass('glyphicon-warning-sign');
        },
        success: function(label, element) {
            $(element).closest('.form-group').addClass('has-success');
            $(element).closest('.input-group').siblings('.form-control-feedback').addClass('glyphicon-ok');
            $(element).addClass('valid').removeClass('invalid');
        },
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        errorElement: 'span',
        errorClass: 'help-block',
        rules: {
            input_email: {
                required: true,
                email: true
            },
            input_password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            input_email: {
                required: "Це поле обов'язкове",
                email: "Невірна електронна адреса"
            },
            input_password: {
                required: "Це поле обов'язкове",
                minlength: "Пароль повинен складати не менше 6 символів"
            }
        },
        submitHandler: function(form) {
            event.preventDefault();
            // Destroying previous form error alerts
            var $msgBlock = $('#login-messages');
            if ($msgBlock.length){
                $msgBlock.alert('close');
            }

            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: $(form).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    // Submit button animation
                    $(form).find('button[type=submit]').button('loading');
                }
            }).done(function(data) {
                    if(!data.result){
                        console.log('AJAX SUCCESSFUL! With ERRORS! ' + JSON.stringify(data));

                        // Bootstrap error class fix
                        if(data.message.type == 'error'){
                            data.message.type = 'danger'
                        }

                        // Creating an error alert
                        $(form).addAlert(data.message.type, data.message.text);

                    } else {
                        console.log('AJAX SUCCESSFUL! NO ERRORS');
                        // Creating an error alert
                        $(form).addAlert(data.message.type, data.message.text);
                        window.location.replace("http://localhost/ci/index.php/account_controller");
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX FAILED! --- ' + textStatus + ' --- ' + errorThrown);
                    // Creating an error alert
                    $(form).addAlert('danger', 'Помилка запиту! Дивись консоль');
                })
                .always(function () {
                    // Reseting submit button animation
                    $(form).find('button[type=submit]').button('reset');
                });
        }
    });


    // $('#login-form').submit(function (event) {
    //     event.preventDefault();
    //
    //     (function ($) {
    //         $.fn.addAlert = function (typeClass, alertText) {
    //
    //             // Creating alert element
    //             var alert = $(document.createElement('div'))
    //                 .addClass('alert alert-' + typeClass + ' alert-dismissible fade in')
    //                 .attr({
    //                     'id': 'login-messages',
    //                     'role': 'alert'
    //                 })
    //                 .html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + alertText);
    //
    //             // Adding alert element to a given selector
    //             $(this).prepend(alert);
    //
    //             return this;
    //         }
    //     })(jQuery);
    //
    //     // Destroying previous form error alerts
    //     var $msgBlock = $('#login-messages');
    //     if ($msgBlock.length){
    //         $msgBlock.alert('close');
    //     }
    //
    //
    //     $.ajax({
    //         url: $(this).attr('action'),
    //         type: 'POST',
    //         data: $(this).serialize(),
    //         dataType: 'json',
    //         beforeSend: function () {
    //             // Submit button animation
    //             $('#login-form').find('button[type=submit]').button('loading');
    //         }
    //     })
    //     .done(function(data) {
    //         if(!data.result){
    //             console.log('AJAX SUCCESSFUL! With ERRORS! ' + JSON.stringify(data));
    //
    //             // Bootstrap error class fix
    //             if(data.message.type == 'error'){
    //                 data.message.type = 'danger'
    //             }
    //
    //             // Creating an error alert
    //             $('#login-form').addAlert(data.message.type, data.message.text);
    //
    //         } else {
    //             console.log('AJAX SUCCESSFUL! NO ERRORS');
    //             // Creating an error alert
    //             $('#login-form').addAlert(data.message.type, data.message.text);
    //             window.location.replace("http://localhost/ci/index.php/account_controller");
    //         }
    //     })
    //     .fail(function(jqXHR, textStatus, errorThrown) {
    //         console.log('AJAX FAILED! --- ' + textStatus + ' --- ' + errorThrown);
    //         // Creating an error alert
    //         $('#login-form').addAlert('danger', 'Помилка запиту! Дивись консоль');
    //     })
    //     .always(function () {
    //         // Reseting submit button animation
    //         $('#login-form').find('button[type=submit]').button('reset');
    //     });
    //
    //
    // });

});