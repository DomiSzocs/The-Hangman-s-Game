<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regisztráció</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div class="main-header">
                <h1> Regisztráció </h1>
                <hr/>
                <?php
                    $bug="";
	                if (isset($_POST["felh"])) { 
	                    //ha kaptunk nevet, másodszor van meghívva
	                    $felhasznalonev=$_POST["felh"];
	                    $jelszo=$_POST["jsz1"]; 
	                    if ($_POST["jsz2"]!=$jelszo) 
		                    $bug="A jelszavak nem egyformák!";
	                    if ($bug=="") {
		                    $sql="INSERT INTO felhasznalok(felhasznalonev,  jelszo) VALUES ('".$felhasznalonev."', MD5('".$jelszo."'))";
		                    include("adat.php");
		                    if (!$kapcs->query($sql)) $bug="A felhasználónév foglalt!";
	                    }
	                    if ($bug!="")
	                        {
		                        echo $bug;  
	                        }
	                    else
	                    {
                            echo "A regisztráció sikeres.";
                            header("Location: login.php");
	                    }
	  
	                }
	                if (!isset($_POST["felh"])||$bug!="") {
                ?>
                <form action="reg.php" method="post">
                    <p><input type="text" name="felh" required placeholder="Felhasználó Név"></p>
                    <p><input type="password" name="jsz1" required placeholder="Jelszó"></p>
                    <p><input type="password" name="jsz2" required placeholder="Jelszó Újra"></p>
                    <p><input type="submit" value="Regisztrálás" class="button" ></p>
                </form>
                <?php
	                }
                ?>
            </div>
        </header>
    </body>
</html>