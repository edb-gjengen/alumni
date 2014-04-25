'use strict';

console.log('\'Allo \'Allo!');

$(function() {
    $('form').on('submit', function() {
        event.preventDefault();

	// Display a spinner
	$('.interest').html('<div id="floatingCirclesG"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div>');

	// Save and load
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
