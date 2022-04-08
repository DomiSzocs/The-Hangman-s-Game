<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <style>
        body{
            background-image: url('hatter.jpg');
        }
        .gomb{
            font-size:6vw;
            background-color:rgb(0,0,0);opacity:0.7;
            border-radius:1em;
            color:white;
            padding:.5em 1em;
            text-decoration:none;
        }
        p{
            font-size:12vw;
        }
        .szoveg{
            font-size:10vw;
            margin-bottom: 7.5vh;
            text-align:center;
            color: gray;
        }
        .megfejtes{
            font-size:6vw;
            margin-bottom: 7.5vh;
            text-align:center;
            color: gray;
        }
        .hibak{
            font-size:10vw;
            margin-bottom: 10vh;
            text-align:left;
        }
        .kep{
            width:85vw;
            height: auto;
        }
        a{
            font-size:10vw;
        }
        @media(min-width:480px){
            .kep{
                width:75vw;
                height: auto;
                display:flex;
                margin-left: 50%;
                transform: translateX(-50%);
            }
            a{
                font-size:6vw;
            }
        }
        @media(min-width:768px){
            a{
                font-size:3.5vw;
            }
            .kep{

                width:45vw;
                height:auto;
            }
            .gomb{
                font-size: 3.5vw;
            }
            .szoveg{
                font-size:5vw;
            }
        }
        @media(min-width:1024px){
            p{
            font-size:4vw;
            }
            .szoveg{
            font-size:4vw;
            }
            .hibak{
                font-size:3vw;
            }
            .gomb{
                font-size:1.5vw;
            }
            .kep{
                width:37.5%;
            }
            a{
                font-size:2.5vw;
            }
            .megfejtes{
                font-size:4vw;
            }
        }
    </style>
    <body>
        <title>Vége a játéknak!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <?php
            $hibak=$_SESSION['hibak'];
            $g=$hibak."_hiba";
            if($_SESSION['hibak']<10)
            {
        ?>
                <div class="kiir">
                    <p>Helyes megfelytés!</p>
                </div>
                <div class="szoveg">
                    <?php
                       echo $_SESSION['word'];
                    ?>
                </div>
                <div class="hibak">
                        <?php
                            echo "hibak szama: ".$hibak;
                        ?>
                </div>
        <?php
            }else
            {
                echo <<<END
                <div class="kiir">
                    <a> Nem sikerült kitalálni a szót! </a>
                </div>
                <img src="hibak/$g.png" class="kep" alt="heble heble">
                </a>
END;
        ?>      <div>
                    <a>A helyes megfejtes: </a>
                </div>
                <div class="megfejtes">        
                    <?php
                        echo $_SESSION['word'];
                    ?>
                </div>
        <?php
            }
        ?>
        <div class="gombos">
            <a class="gomb" href="uj.php" >Új játék</a>
            <a class="gomb" href="fomenu.php"> Vissza a főmenübe</a>
        </div> 
    </body>
</html>