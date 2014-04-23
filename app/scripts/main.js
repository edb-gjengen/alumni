'use strict';

console.log('\'Allo \'Allo!');

$(function() {
    $('form').on('submit', function() {
        event.preventDefault();
        $.post(
            'http://alumni.studentersamfundet.no/async.php',
            {
                name: $('#name').val(),
                email: $('#email').val(),
                division: $('#division').val(),
                years: $('#years').val()
            },
            function(data){
                console.log('Successfully posted sumtin.');
                console.log(data);
                $('.interest').html('<h1 style="text-align:center;">Takk</h1>').append(data);
            }
        );
    });
});
