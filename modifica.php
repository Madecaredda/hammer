<?php
include 'Accesso.php';
$database=new mysqli();
$database->connect(Accesso::$db_host,  Accesso::$db_user, Accesso::$db_pass, Accesso::$db_nameUsers);
if($database->connect_errno != 0){
error_log("Errore in connesione al database del server \n $database->connect_errno:$database->connect_error");
echo "Errore in connesione al database del server \n $database->connect_errno:$database->connect_error";}
$queryctrl="SELECT user FROM user WHERE logged=true AND status=1";
$resultctrl=$database->query($queryctrl);
$obt=$resultctrl->fetch_row();
if($obt[0]==NULL){
    echo 'Fallimento critico, non sei autorizzato';
}
 else { ?>
    <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html id="fullpage">
    <head>
        <title>C.A. Homepage</title>
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
        <p>
           <form name="form1" method="post" action="modifica2.php">
            <textarea name="Nuovo" class="editabile">
            <?php
                echo file_get_contents('titolo.txt'); 
            ?>
            </textarea>
            <input type="submit" name="submit" value="Modifica Titolo">

            </form>

            <h1>Contenuto attuale</h1>
            <?php
                echo file_get_contents('titolo.txt');
            ?>
        </p>

        <p>
            form name="form2" method="post" action="modifica2.php">
            <textarea name="Nuovo" class="editabile">
            <?php
                echo file_get_contents('testo.txt'); 
            ?>
            </textarea>
            <input type="submit" name="submit" value="Modifica testo">

            </form>

            <h1>Contenuto attuale</h1>
            <?php
                echo file_get_contents('testo.txt');
            ?>
        </p>
<?php }
?>



