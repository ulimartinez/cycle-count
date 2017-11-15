  //Modals
  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});

// Noty
function topNoty(type, text) {
    noty({
        layout: 'topCenter',
        theme: 'relax',
        type: type,
        text: text,
        dismissQueue: true,
        animation: {
            open: {height: 'toggle'},
            close: {height: 'toggle'},
            easing: 'swing',
            speed: 650
        },
        timeout: 1900
    });
}

function notyPrompt(type, text, base_url) {
    noty({
        layout: 'topRight',
        theme: 'relax',
        type: type,
        text: text,
        dismissQueue: false,
        modal: true,
        animation: {
            open: {height: 'toggle'},
            close: {height: 'toggle'},
            easing: 'swing',
            speed: 650
        },
        closeWith: ['button'],
        buttons: [
        {
            addClass: 'waves-effect waves-light btn-flat', text: 'Cancel', onClick: function ($noty) {
                $noty.close();
            }
        },
        {
            addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                $noty.close();
                window.location.href = base_url;
            }
        }
        ]
    });
}

function middleNoty(type, text) {
    noty({
        layout: 'center',
        theme: 'relax',
        type: type,
        text: text,
        dismissQueue: true,
        animation: {
            open: {height: 'toggle'},
            close: {height: 'toggle'},
            easing: 'swing',
            speed: 650
        },
        timeout: 1900
    });
}
// End Noty

$('.button-collapse').sideNav({
        menuWidth: 240, // Default is 240
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    });


$(document).ready(function () {
    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});

$(document).ready(function () {
    $('select').material_select();
});

/* Data Tables for Edit Members*/
$(document).ready(function () {
    $('#membersListing').DataTable();
});

/* Clicking Rows*/
$(document).ready(function ($) {
    $(".clickable-row").click(function () {
        window.document.location = $(this).data("href");
    });
});
/* End Datatables*/

/* Tooltips */
$(document).ready(function () {
    $('.tooltipped').tooltip({
        delay: 50,
        html: true
    });
});
/* End Tooltips */

/* Datetime picker */
$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15 // Creates a dropdown of 15 years to control year
});
/* EndDatetime picker */
