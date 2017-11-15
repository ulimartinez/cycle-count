function userLogin(base_url) {
    var email = $('#InputEmail').val();
    var password = $('#InputPassword').val();
    $.ajax({
        'url': base_url + 'session/login',
        'type': 'POST', //the way you want to send data to your URL
        'data': 'email=' + email + '&password=' + password,
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Login Successful!');
                    url = base_url;
                    setTimeout('window.location = url', 3000);
                }
                else
                    topNoty('warning', result);
            }
            else
                topNoty('error', 'An error has ocurred.');
        }
    });
}

function editProfile(base_url) {
    var firstName = $('#Input_firstName').val();
    var lastName = $('#Input_lastName').val();
    var email = $('#Input_email').val();
    var currentEmail = $('#Input_currentEmail').val();
    var is_admin = $('#Chk_isAdmin').prop('checked');


    $.ajax({
        'url': base_url + 'user/editProfileFunction',
        'type': 'POST',
        'data': 'firstName=' + firstName + '&lastName=' + lastName + '&email=' + email + '&currentEmail=' + currentEmail +'&is_admin=' + is_admin,
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Updated Profile Information');
                    url = window.location.href ;
                    setTimeout('window.location = url', 3000);
                }
                else
                    topNoty('warning', result);
            }
            else
                topNoty('error', 'An error has ocurred.');
        }
    });
}

function setPassword(base_url) {
    var oldPassword = $('#Input_oldPassword').val();
    var password = $('#Input_password').val();
    var passwordConfirmation = $('#Input_passwordConfirmation').val();
    $.ajax({
        'url': base_url + 'user/setPasswordFunction',
        'type': 'POST', //the way you want to send data to your URL
        'data': 'oldPassword=' + oldPassword + '&password=' + password + '&passwordConfirmation=' + passwordConfirmation,
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Updated Password');
                    url = base_url + 'user/setPassword';
                    setTimeout('window.location = url', 3000);
                }
                else
                    topNoty('warning', result);
            }
            else
                topNoty('error', 'An error has ocurred.');
        }
    });
}

function resetPassword(base_url) {
    var email = $('#Input_email').val();
    $.ajax({
        'url': base_url + 'member/resetPasswordFunction',
        'type': 'POST', //the way you want to send data to your URL
        'data': 'email=' + email,
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Password has been reset');
                    url = base_url + 'member/resetPassword';
                    setTimeout('window.location = url', 3000);
                }
                else
                    topNoty('warning', result);
            }
            else
                topNoty('error', 'An error has ocurred.');
        }
    });
}
