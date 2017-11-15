function createUser(base_url) {
    var email = $('#Input_email').val();
    var password = $('#Input_password').val();
    var passwordConfirmation = $('#Input_passwordConfirmation').val();
    var is_admin = $('#Chk_isAdmin').prop('checked');
    var is_visible = $('#Chk_isVisible').prop('checked');
    var firstName = $('#Input_firstName').val();
    var middleInitial = $('#Input_middleInitial').val();
    var lastName = $('#Input_lastName').val();
    $.ajax({
        'url': base_url + 'userAdmin/createUserFunction',
        'type': 'POST', //the way you want to send data to your URL
        'data': 'email=' + email + '&password=' + password + '&passwordConfirmation=' + passwordConfirmation+ '&is_admin=' + is_admin
           + '&is_visible=' + is_visible + '&firstName=' + firstName + '&middleInitial=' + middleInitial + '&lastName=' + lastName,
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Successfully created a new user');
                    url = base_url + 'userAdmin/createUser';
                    setTimeout('location.reload()', 2900);
                }
                else
                    topNoty('warning', result);
            }
            else
                topNoty('error', 'An error has ocurred.');
        }
    });
}

function deleteUsers(base_url) {
    var usersToDelete = [];
    $("input[name='usersToDelete[]']:checked").each(function ()
    {
        usersToDelete.push($(this).val());
    });
    $.ajax({
        'url': base_url + 'userAdmin/deleteUsers',
        'type': 'POST', //the way you want to send data to your URL
        'data': 'usersToDelete=' + usersToDelete,
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Successfully deleted users');
                    url = base_url + 'userAdmin/editUsers';
                    setTimeout('location.reload()', 2900);
                }
                else
                    topNoty('warning', result);
            }
            else
                topNoty('error', 'An error has ocurred.');
        }
    });
}