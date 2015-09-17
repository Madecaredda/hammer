<?php
    session_start();
    
    include 'Accesso.php';
    $database=new mysqli();
    $database->connect(Accesso::$db_host,  Accesso::$db_user, Accesso::$db_pass, Accesso::$db_nameUsers);
    if($database->connect_errno != 0){
    error_log("Errore in connesione al database del server \n $database->connect_errno:$database->connect_error");
    echo "Errore in connesione al database del server \n $database->connect_errno:$database->connect_error";
    }
    
    if(isset($_REQUEST["login"])&& isset($_REQUEST["user"])&& isset($_REQUEST["pass"])){
        $user=$_REQUEST["user"];
        $pass=$_REQUEST["pass"];
        if(login($user,$pass,$database)!=false){
            $_SESSION["loggedIn"]=true;
            
        }
    }
    else if(isset($_REQUEST["logout"])){
        $queryLogUpdate= "UPDATE user SET logged=false WHERE logged=true";
        $result=$database->query($queryLogUpdate);
        logout();
    }
    

    function login($user, $pass, $database){
        $query= "SELECT user,password,status FROM user";
        $result=$database->query($query);
        while($row = $result->fetch_object()){
            if($row->user == $user && $row->password==$pass){
                $queryLogUpdate= "UPDATE user SET logged=true WHERE user='$user'";
                $result=$database->query($queryLogUpdate);
                return $row->status;
            }
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
        <title>C.A. Login</title>
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
                <h1 class="title">Welcome back</h1>
                <p class="content">Sei loggato, clicca qui per uscire</p>
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

