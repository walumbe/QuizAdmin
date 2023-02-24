<?php
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['username'])) {
    header("location:index.php");
    return false;
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <title>Question Reports by users | <?php ucwords($_SESSION['company_name']) ?> - Admin Panel </title>
        <?php  include 'include-css.php'; ?> -->
    </head>
    <body class="nav-md"> 
        <div class="container body">
            <div class="main_container">
                <?php include 'sidebar.php'; ?>
                <!-- page content -->
                <div class="right_col" role="main"> 
                    <!-- top tiles -->
                    <br />

                    <div class="pdf-container">
                        <embed src="generate-certificate.php" type="application/pdf" width="100%" height="600px" />
                    </div>

                        <!-- <button onclick="printPdf()">Print Certificate</button> -->

                    <script>
                    function printPdf() {
                        window.print();
                    }
                    </script>
                    
                    </div>
                </div>
            </div> 
        
    </body>
</html>