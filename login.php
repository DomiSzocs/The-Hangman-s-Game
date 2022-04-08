<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bejelentkezés</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div class="main-header">
                <h1> Bejelentkezés </h1>
                <hr />
                <?php
                    if (isset($_POST["felh"]))
                    {
	                    include("adat.php");
	                    $sql="select * from felhasznalok where felhasznalonev='".$_POST["felh"]."' and jelszo=md5('".$_POST["jelsz"]."')";
	                    $eredm=$kapcs->query($sql);
	                    if ($eredm->num_rows==0) 
	                    {
	                        echo "Helytelen felhasználónév vagy jelszó.";
	                    }
	                    else 
	                    {	
                            $_SESSION["felh"]=$_POST["felh"];
		                    header("Location: fomenu.php");
	                    }
                    }
                ?>
                <form action="login.php" method="post">
                    <p><input type="text" name="felh" required placeholder="Felhasználó Név"></p>
                    <p><input type="password" name="jelsz" required placeholder="Jelszó"></p>
                    <p><input type="submit" value="Tovább" class="button" ></p>
                </form>
            </div>
        </header>
    </body>
</html>