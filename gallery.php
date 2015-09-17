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

<html id="fullpage">
    <head>
        <title>Galleria</title>
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
            <a class="menu-link" href="index.php">
                <button type="button" class="btn">
                    Indietro
                </button>
            </a>
        </nav>
        <div id="clear"></div>
        <footer id="coda">
        </footer>
    </body>
</html>
