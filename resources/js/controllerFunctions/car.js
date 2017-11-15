function createCar(base_url) {
    var make = $('#Input_make').val();
    var model = $('#Input_model').val();
    var year = $('#Input_year').val();

    $.ajax({
        'url': base_url + 'testController/createCarFunction',
        'type': 'POST', //the way you want to send data to your URL
        'data': 'make=' + make + '&model=' + model + '&year=' + year, 
        'success': function (result) {
            if (result) {
                if (result === 'success') {
                    topNoty('success', 'Successfully created a new user');
                    url = base_url + 'testController/createCar';
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