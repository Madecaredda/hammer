<?php
    session_start();
    if(isset($_REQUEST["login"])&& isset($_REQUEST["user"])&& isset($_REQUEST["pass"])){
        if(login($_REQUEST["user"], $_REQUEST["pass"])){
            $_SESSION["loggedIn"]=true;
        }
    }
    else if(isset($_REQUEST["logout"])){
        logout();
    }
    

    function login($user, $pass){
        if($user== "prova" && $pass== "1234"){
            return true;
        }
        return false;
    }
    
    function logout(){
        $_SESSION=array();
        if(session_id()!= "" || isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time() -2592000,'/');
        }
        session_destroy();
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
        <title>Pagina 1</title>
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
            <a class="menu-link" href="index.php">
                <button type="button" class="btn">
                    Indietro
                </button>
            </a>
        </nav>
        <article id="contenuto">
            <?php
            if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]){
            ?>
                <h1 class="title">Bentornato</h1>
                <p class="content">Sei già loggato</p>
                <form action="loginPage.php" method="post">
                    <input type="submit" name="logout" value="Logout"/>
                </form>
            <?php
            } else {
            ?>
                <h1 class="title">Benvenuto</h1>
                <p class="content">Inserisci username e password</p>
                <form action="loginPage.php" method="post">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user"/>
                    <br/>
                    <label for="pass">Password</label>
                    <input type="text" name="pass" id="pass"/>
                    <br/>
                    <input type="submit" name="login" value="Login"/>
                </form>
            <?php            
            }
            ?>
        </article>
        <div id="clear"></div>
        <footer id="coda">
        </footer>
    </body>
</html>

