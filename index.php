<?php
include 'Accesso.php';
$database=new mysqli();
$database->connect(Accesso::$db_host,  Accesso::$db_user, Accesso::$db_pass, Accesso::$db_nameUsers);
if($database->connect_errno != 0){
error_log("Errore in connesione al database del server \n $database->connect_errno:$database->connect_error");
echo "Errore in connesione al database del server \n $database->connect_errno:$database->connect_error";
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html id="fullpage">
    <head>
        <title>C.A. homepage</title>
        <script type="text/javascript" src="lib/jquery-1.11.3.min.js"></script>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/stile.css" media="screen">
        <link rel="stylesheet" type="text/css" href="styles/posizionamento.css" media="screen">
        <link rel="stylesheet" type="text/css" href="styles/dimensione.css" media="screen">
    </head>
    <body id="body">
        <header id="testata">
            <p id="username">
                <a href="loginPage.php">
                    <?php 
                    $query="SELECT user FROM user WHERE logged=true";
                    $result=$database->query($query);
                    $row=$result->fetch_row();
                    if($row[0]!=null){
                        echo "$row[0]";
                    }  else {
                        echo "login";
                    }
                        ;?>
                </a> 
            </p>
            
        </header>
        <nav id="sidebar">
            <a class="menu-link" href="#">
                <button type="button" class="btn">
                    VUOTO
                </button>
            </a>
   
            <a class="menu-link" href="gallery.php">
                <button type="button" class="btn">
                    Galleria
                </button>
            </a>
            <a class="menu-link" href="loginPage.php">
                <button type="button" class="btn">
                    Account(DA FARE)
                </button>
            </a>
        </nav>
            <article id="contenuto">
                <h1 class="title">Home</h1>
                <p class="content" id="content1">
                    In fase di implementazione la galleria
                </p>
            </article>
        <div id="clear"></div>
        <footer id="coda">
        </footer>
    </body>
</html>