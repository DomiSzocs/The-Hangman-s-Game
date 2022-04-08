<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <title>Kezdő képernyő</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <style>
        body{
            background-image: url('hatter.jpg');
        }
        .cim{
            font-size:2em;
            height:auto;
            display:grid;
            place-items:center;
            min-height: 20vh;
        }
        .content{
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap:0em;
        }
        .kep{ 
            width:100%;
            display:flex;
            align-items: center;
            justify-content: center;
            margin-bottom:  1.5em;
        }
        .responsive{
            width:25%;
            height:auto;
            
        }
        .gomb{
            width:100%;
            display:grid;
            place-items: center;
        }
        a{
            width:55%;
            padding: 3vw;
            margin-bottom:  1em; 
            text-align:center;
            font-family: Arial;
            color : white;
            font-size: 4vw;
            font-weight: bold;
            text-decoration:none;
            background: blue;
            border-radius:2em;
        }
        .jo{
            height: auto;

        }
        @media(min-width:470px){
            .cim{
                font-size:5vmax;
                min-height: 30vh;
            }
            a{
                font-size:4vw;
            }
        }
        @media (min-width:416px){
            .kep{
                margin-bottom: 0em;
            }
            a{
                padding : 1.25vw;
                font-size: 2vw;
            }
            .responsive{
                margin-left: 25%;
            }
            .jo{
                margin-right: 70%;
            }
            .cim{
                font-size: 6.5vmax;
                min-height: 35vh;
            }
        }
        </style>

    <body>
        <div class="cim">
            <a1>  The Hangman's Game </a1>
        </div>
        <div class="content">
            <div class="kep">
                <img src="kezdokep.png" class="responsive">
            </div>
            <div class="gomb">
                    <?php 
                        if(isset( $_SESSION['felh']) ){ 
                    ?>
                            <a class="jo" href="fomenu.php">
                    <?php
                            echo "Folytatás, mint ".$_SESSION['felh'];
                        }
                        else{
                    ?>
                            </a>
                            <a class="jo" href="login.php">
                    <?php
                            echo "Bejelentkezés";
                        }
                    ?>
                    </a>                
                <a class="jo" href="reg.php">Regisztráció</a>
                <a class="jo" href="guest.php">Vendég fiók</a> 
                
            </div>         
        </div> 
    </body>
</html>