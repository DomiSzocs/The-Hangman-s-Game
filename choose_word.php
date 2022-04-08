<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <title>Szóválasztó</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <style>
        body{
            background-image: url('hatter.jpg');

        }
        .flex{
            width:100%;
            display: flex;  
            justify-content:center;
            margin-top:20vh;
        }
        .irdide{
            background:transparent;
            width:50vw;
            height:3em;
            border:none;
            border-bottom: 2px solid black;
            margin-bottom:7.5vh;
            outline:none;
            font-size:1.5em;
        }
        .gomb{
            font-size:1.5em;
            background-color:rgb(0,0,0);opacity:0.7;
            border:none;
            border-radius:1em;
            color:white;
            padding:.5em 1em;
        }
    </style>
    <body>
    <div class="flex">
        <div class="player">
            
        </div>
        <div>
            <form action="jatek.php" method="post">
                <input class="irdide" type="password" name="word" required> </br>
	            <input class="gomb" type="submit" value="Kiválaszt">
            </form> 
        </div>
    </div>
    </body>
</html>