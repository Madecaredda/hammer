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
        <title>C.A. Homepage</title>
        <script type="text/javascript" src="lib/jquery-1.11.3.min.js"></script>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/stile.css" media="screen">
        <link rel="stylesheet" type="text/css" href="styles/posizionamento.css" media="screen">
        <link rel="stylesheet" type="text/css" href="styles/dimensione.css" media="screen">
    </head>
    <body id="body">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
                <button type="button" class="btncurrent">
                    Home
                </button>
            </a>
   
            <a class="menu-link" href="gallery.php">
                <button type="button" class="btn">
                    Galleria
                </button>
            </a>
            <a class="menu-link" href="loginPage.php">
                <button type="button" class="btn">
                    Account
                </button>
            </a>
            <?php
            $query="SELECT user FROM user WHERE logged=true AND status=1";
                    $result=$database->query($query);
                    $row=$result->fetch_row();
                    if($row[0]!=null){ ?>
            <a class="menu-link" href="modifica.php">
                <button type="button" class="btn">
                    Modifica Questa Pagina
                </button>
            </a><?php } ?>
        </nav>
            <article id="contenuto">
                <p id="divisor">  </p>
                <p>
                    <div class="fb-page" data-href="https://www.facebook.com/simona.cincidda/" data-tabs="timeline" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/simona.cincidda/"><a href="https://www.facebook.com/simona.cincidda/">C.A.  Lavorazione Legno Srl</a></blockquote></div></div>
                    </p>
                <div id="fulcrohome">
                    <p id="prova"></p>
                    <h1> <?php echo file_get_contents('titolo.txt'); ?> </h1>
                    <p class="content" id="content1">
                        <?php echo file_get_contents('testo.txt'); ?>
                    </p>
                    
                </div>
            </article>
        <div id="clear"></div>
        <footer id="coda">
        </footer>
    </body>
</html>
