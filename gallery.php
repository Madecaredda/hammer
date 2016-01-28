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
        <!--<link rel="stylesheet" href="gallery/css/reset.css" type="text/css" />-->
        <!--<link rel="stylesheet" href="gallery/css/imago.css" type="text/css" />-->
       
        
        <script src="gallery/js/mootools-1.2.4-core_imago.js" type="text/javascript">
        </script>
        <script src="gallery/js/mootools-1.2.4.2-more.js" type="text/javascript">
        </script>
        <script src="gallery/js/slider.js" type="text/javascript">
        </script>
        <script src="gallery/js/imago-nc.js" type="text/javascript">
        </script>
        <script type="text/javascript">

            
            var gallery;
            function start(){
                gallery = new Gallery();
                gallery.loader = new GalleryLoader('gallery.xml', 'images', "Madeira");
                
                gallery.loader.load();
            }
            
            window.addEvent('domready', function(){
                start();
            });			
        </script>
        
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
                    Home
                </button>
            </a>
   
            <a class="menu-link" href="index.php">
                <button type="button" class="btn">
                    Galleria
                </button>
            </a>
            <a class="menu-link" href="loginPage.php">
                <button type="button" class="btn">
                    Account
                </button>
            </a>
        </nav>
        <p id="divisor">  </p>
        
        
        
        
        
        <div id="sideBarContent">
            
            
        </div>
        <h3 id="imagoGalleryTitle"></h3>
				<a id="imagoMenuPrevLink"><img src="css/img/menuPrevImg.png" alt=""/></a>
				<a id="imagoMenuNextLink"><img src="css/img/menuNextImg.png" alt=""/></a>
			</div>
            <a href="#" id="sideBarTab" class="sideBarTabClosed"></a>
        </div>
        <div id="imagoFrame">
            <a id="imagoPreviousImageLink"></a>
            <img src="css/img/emptyX.gif" alt="" id="imagoCurrentImg"/><a id="imagoNextImageLink"></a>
            <h3 id="imagoCurrentImageTitle">The gallery is loading...</h3>
            <div id="imagoCurrentImageLoading">
            </div>
			
			<div id="imagoLoading">
            </div>
        </div>
        <div class="msg">
            <span id="imagoError">I am the error shown to the user</span>
        </div>
            
            
            
        <div id="clear"></div>
        <footer id="coda">
        </footer>
    </body>
</html>
