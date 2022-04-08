<?php
session_start();
include 'session_unset.php';
?>
<!DOCTYPE html>
<html>
    <title>Főmenü</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <style>
        body{
            background-image: url('hatter.jpg');
        }
        .cimdiv{
            font-size:3.5em;
            height:auto;
            margin-bottom: 0.5em;
            text-align:center;
        }
        .content{
            width: 100%;
            height: auto;
            display: grid;
        }
        .gomb{
            width:100%;
            display:grid;
            place-items: center;
        }
        a{
            width:65%;
            padding: 1.25em;
            margin-top:  1.5em; 
            text-align:center;
            font-family: Arial;
            color : white;
            font-size: .80em;
            font-weight: bold;
            text-decoration:none;
            background: blue;
            border-radius:3em;
        }
        .jo{
            height: auto;
        }
        @media(min-width:768px){
            .cimdiv{
                font-size:4em
            }
            a{
                width:60%;
                font-size: 1.25em;
            }
        }
        @media(min-width:1024px){
            .cimdiv{
                font-size:6.5em;    
            }
            a{
                width:50%;
                font-size: 1.5em;
                margin-top:2em;
                padding:1.25em;
            }
        }
        </style>

    <body>
        <div class="cimdiv">
            <a1 class="cim">  Főmenü </a1>
        </div>
        <div class="content">
            <div class="gomb">
                <a class="jo" href="jatek.php">1 Játékos</a>
                <a class="jo" href="choose_word.php">Több Játékos</a>
                <a class="jo" href="logoff.php">
                <?php
                    if(isset( $_SESSION['felh']) ){
                        echo "Kijelentkezés";
                    }
                    else{
                        echo "Vissza a kezdőlapra";
                    }
                ?>
                </a>
            </div>         
        </div> 
    </body>
</html>