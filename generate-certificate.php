<?php
session_start();
// var_dump(session_id());
// $ipaddress = getenv("REMOTE_ADDR") ;
// var_dump($ipaddress);

if(!isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}

include('./library/crud.php');
include('./library/functions.php');

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$logo = "Ujuzi Craft";
$title = "Certificate of Completion";
$body = "This Certificate is Presented to";

$db = new Database();
$db->connect();

$sql = "SELECT name FROM users limit 1";
$db->sql($sql);
$name_arr = $db->getResult();
// var_dump($name_arr);
$name = $name_arr[0]["name"];

// var_dump($name);

// $name = $db->getResult();

$ipaddress = getenv("REMOTE_ADDR") ;

// $name = "Jonathan Walumbe";

$course = "For deftly defying the laws of gravity<br/>
and flying high in PHP Programming";
$date = date('Y-m-d');

// $category = $db->getResult();
$css = '<style>
body, html {
    margin: 0;
    padding: 0;
}
body {
    color: black;
    display: table;
    font-family: Georgia, serif;
    font-size: 24px;
    text-align: center;
    justify-content: center;
}
.container {
    display:flex;
    border: 5px dotted tan;
    width: 750px;
    height: 150vh;
    justify-content: center;
    align-items:center;
    display: table-cell;
    vertical-align: middle;
    width:8em;
}
.certificate {
    max-width:80%;
    margin: 0 auto;
}
.logo {
    color: tan;
    text-transform:uppercase;
    font-size:32px;
    // font-weight:bold;
    margin-left: 40%;
    justify-content:center;

}

.marquee {
    color: tan;
    font-size: 48px;
    margin: 20px;
    margin-left:20%;
    display:inline;
}
.assignment {
    margin: 20px;
    margin-left: 40%;
}
.person {
    border-bottom: 2px solid black;
    font-size: 32px;
    font-style: italic;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left:30%;
    width: 400px;
    text-align:center;
}
.reason {
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left:40%
}
</style>';


// Generate the HTML content
$html = '<html>
<head>
    <meta charset="utf-8">
    ' . $css .'
</head>
<body>
    <div class="container">
    <div class = "certificate">
        <div class="logo">
            ' . $logo . '
            
        </div>

        <div class="marquee">
            ' . $title . '
        </div>

        <div class="assignment">
            ' . $body . '
        </div>

        <div class="person">
            ' . $name . '
        </div>

        <div class="reason">
            ' . $course . '
        </div>
       </div>
    </div>
</body>
</html>';



// Create new HTML2PDF object
$pdf = new Html2Pdf();

// Convert HTML to PDF
$pdf->writeHTML($html);
$pdfContent = $pdf->output('', 'S');

// Output PDF as a string
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="certificate.pdf"');
echo $pdfContent;
