<?php
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
        </header>
        <nav id="sidebar">
            <a class="menu-link" id="bottone1" href="loginPage.php">
                <button type="button" class="btn">
                    Login
                </button>
            </a>
   
            <a class="menu-link" href="#">
                <button type="button" class="btn">
                    Bottone Vuoto
                </button>
            </a>
            <a class="menu-link" href="#">
                <button type="button" class="btn">
                    Bottone Vuoto
                </button>
            </a>
        </nav>
            <article id="contenuto">
                <h1 class="title">Home</h1>
                <p class="content" id="content1">
                    Questa sarà la pagina di partenza, è da definire se l'azione di pressione dei bottoni provocherà una reazione
                    di cambiamento solo del testo o dell'interezza della pagina. Per ora si opta per la seconda opzione. Necessaria revisione dello stile del testo tramite
                    cascading style sheets.
                </p>
                <p class="content" id="content2">
               	    Seconda notizia nella home
               	</p>
            </article>
        <div id="clear"></div>
        <footer id="coda">
        </footer>
    </body>
</html>
