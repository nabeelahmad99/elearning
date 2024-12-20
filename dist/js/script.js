function start_loader() {
    if ($('#preloader').length <= 0)
        $('body').append('<div id="preloader"><div class="loader-holder"><div></div><div></div><div></div><div></div>')
}

function end_loader() {
    if ($('#preloader').length > 0) {
        $('#preloader').fadeOut('fast', function() {
            $('#preloader').remove();
        })
    }
}
// function 
window.alert_toast = function($msg = 'TEST', $bg = 'success', $pos = '') {
    var Toast = Swal.mixin({
        toast: true,
        position: $pos || 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
    Toast.fire({
        icon: $bg,
        title: $msg
    })
}

$(document).ready(function() {
    // Login
    $('#login-frm').submit(function(e) {
            e.preventDefault()
            start_loader()
            if ($('.err_msg').length > 0)
                $('.err_msg').remove()
            $.ajax({
                url: _base_url_ + 'classes/Login.php?f=login',
                method: 'POST',
                data: $(this).serialize(),
                error: err => {
                    console.log(err)

                },
                success: function(resp) {
                    if (resp) {
                        resp = JSON.parse(resp)
                        if (resp.status == 'success') {
                            location.replace(_base_url_ + 'admin');
                        } else if (resp.status == 'incorrect') {
                            var _frm = $('#login-frm')
                            var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                            _frm.prepend(_msg)
                            _frm.find('input').addClass('is-invalid')
                            $('[name="username"]').focus()
                        }
                        end_loader()
                    }
                }
            })
        })

        $('#send-otp').click(function() {
            const url =  _base_url_ + 'classes/Login.php?f=sendOtp'
            const email = $('#email').val();
            if (!email) {
                alert('Please enter your email first.');
                return;
            }
            console.log(email);
            $.ajax({
                url: _base_url_ + 'classes/Login.php?f=sendOtp',
                method: 'POST',
                data: { email: email },
                success: function(resp) {
                    resp = JSON.parse(resp);
                    if (resp.status === 'success') {
                        alert('OTP sent to your email!');
                    } else {
                        alert('Failed to send OTP: ' + resp.message);
                    }
                },
                error: function(err) {
                    console.error(err);
                    alert('An error occurred while sending OTP.');
                }
            });
        });


        $('#signup-frm').submit(function(e) {
            e.preventDefault();
            start_loader();
        
            $.ajax({
                url: _base_url_ + 'classes/Login.php?f=signup',
                method: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    resp = JSON.parse(resp);
                    if (resp.status === 'success') {
                        alert('Sign-Up Successful! You can now log in.');
                        location.replace(_base_url_ + 'student');
                    } else {
                        alert('Error: ' + resp.message);
                    }
                    end_loader();
                },
                error: function(err) {
                    console.error(err);
                    alert('An error occurred during signup.');
                    end_loader();
                }
            });
        });
            
        //Establishment Login
    $('#flogin-frm').submit(function(e) {
        e.preventDefault()
        start_loader()
        if ($('.err_msg').length > 0)
            $('.err_msg').remove()
        $.ajax({
            url: _base_url_ + 'classes/Login.php?f=flogin',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err)

            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp.status == 'success') {
                        location.replace(_base_url_ + 'faculty');
                    } else if (resp.status == 'incorrect') {
                        var _frm = $('#flogin-frm')
                        var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                        _frm.prepend(_msg)
                        _frm.find('input').addClass('is-invalid')
                        $('[name="username"]').focus()
                    }
                    end_loader()
                }
            }
        })
    })

    //user login
    $('#slogin-frm').submit(function(e) {
            e.preventDefault()
            start_loader()
            if ($('.err_msg').length > 0)
                $('.err_msg').remove()
            $.ajax({
                url: _base_url_ + 'classes/Login.php?f=slogin',
                method: 'POST',
                data: $(this).serialize(),
                error: err => {
                    console.log(err)

                },
                success: function(resp) {
                    if (resp) {
                        resp = JSON.parse(resp)
                        if (resp.status == 'success') {
                            location.replace(_base_url_ + 'student');
                        } else if (resp.status == 'incorrect') {
                            var _frm = $('#slogin-frm')
                            var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                            _frm.prepend(_msg)
                            _frm.find('input').addClass('is-invalid')
                            $('[name="username"]').focus()
                        }
                        end_loader()
                    }
                }
            })
        })
        // System Info
    $('#system-frm').submit(function(e) {
        e.preventDefault()
        start_loader()
        if ($('.err_msg').length > 0)
            $('.err_msg').remove()
        $.ajax({
            url: _base_url_ + 'classes/SystemSettings.php?f=update_settings',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    // alert_toast("Data successfully saved",'success')
                    location.reload()
                } else {
                    $('#msg').html('<div class="alert alert-danger err_msg">An Error occured</div>')
                    end_load()
                }
            }
        })
    })
})