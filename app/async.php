<?php
$host = 'localhost';
$db   = 'prod_alumni'; // macgyver: 'misund_alumni';
$user = 'prod_alumni'; // macgyver: 'misund_alumni';
$pass = '39Ax4tEsm958K6Ke';

$link = mysqli_connect( $host , $user , $pass , $db );

if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

$name = mysqli_real_escape_string( $link , $_POST['name'] );


$email= mysqli_real_escape_string( $link , $_POST['email'] );
$division = mysqli_real_escape_string( $link , $_POST['division'] );
$years = mysqli_real_escape_string( $link , $_POST['years'] );

$sql = "INSERT INTO alumni(name,email,division,years) VALUES( '$name','$email','$division','$years' )";

if ( mysqli_query( $link, $sql ) ) {
    echo '<div class="thanks">';
    echo '<p>Takk for at du fortsatt er glad i oss! Vet du om andre som er glad i oss ennå? Vi blir glade hvis du kan hjelpe oss å nå dem.</p>';
    echo '<p><a href="mailto:?subject=' . rawurlencode('Det Norske Studentersamfunds alumnigruppe') . '&body=' . rawurlencode("Hei!\n\nDet Norske Studentersamfund samler kontaktinformasjon på tidligere aktive for å starte en alumnigruppe. Jeg tenkte det kunne være noe for deg: http://alumni.studentersamfundet.no/\n\n\n\n--\nSendt via DNS Alumni") . '">Send e-post</a> | <a href="https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode('http://alumni.studentersamfundet.no/') . '">Del på Facebook</a></p>';
    echo '</div>';
} else {
    echo "<p>Noe gikk galt. Merde alors!</p>";
    echo mysqli_error( $link );
}
mysqli_close($link);
?>
