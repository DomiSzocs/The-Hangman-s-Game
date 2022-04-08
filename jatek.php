<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <title>The hangman's game</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
<style>
  body{
    background-image: url('hatter.jpg');
  }
  .kep{
    width:90vw;
    height: auto;
  }
  .szoveg{
    font-size:10vw;
    margin-bottom: 10vh;
    text-align:center;
    color: gray;
  }
  .gomb{
    background: transparent;
    border: none;
    font-size: 5vw;
    margin:.5em;
    font-weight: bold;
  }
  @media(min-width:450px){
    .kep{
      width:50vw;
      height: auto;
      display:flex;
      margin-left: 50%;
      transform: translateX(-50%);
    }
    .szoveg{
      font-size:7.5vw;
      margin-bottom: 7.5vh;
    }
    .gomb{
      font-size:3vw;
    }
  }
  @media(min-width:1024px){
    .kep{
      width:40vw;
      height: auto;
    }
    .szoveg{
      font-size:5vw;
      margin-bottom:5vh;
    }
    .gomb{
      font-size:2vw;
    }
  }
</style>
  <body>

    <?php
      if (isset($_POST["g"]))
      {
        //ha beturol volt megnyitva
        if( isset($_SESSION['utolso']) )
        {
          $valtozo=$_SESSION['utolso'];
        }
        $_SESSION[$_POST["g"]]=1;
        $_SESSION['utolso']=$_POST["g"];
      }
      else
      {
        //fomenubol vagy szo valasztorol volt megnyitva
        if( !isset($_POST['word']) && !isset($_SESSION['word']) )
        {
          //nincs szo semmilyen forrasbol
          include 'session_unset.php';
          $_SESSION['hibak']=0;
          $db= mysqli_connect('127.0.0.1','root','','szakvizsga')
          or die('Error connecting to MySQL server.');
          $db->query("SET character_set_results=utf8");
          $sorokszama = mysqli_query($db, "SELECT * from szavak");
          $t=array();
          while ($i = $sorokszama->fetch_assoc())
          {
            array_push($t, $i['id']);
          }
          $szavak_szama = sizeof($t);
          $query = "SELECT szo FROM szavak WHERE id=".$t[rand(0,$szavak_szama-1)];
          $result = mysqli_query($db,$query) or die('A lekérdezés sikertelen');
          $sor = $result->fetch_assoc();
          $_SESSION['word']=$sor['szo'];
          $_SESSION['mode']="jatek.php";
        }
        if(isset($_POST['word']))
        {
          //szo valasztorol volt megnyitva, feldogozatlan
          $_SESSION['hibak']=0;
          $_SESSION['word']=$_POST['word'];
          $_SESSION['mode']="choose_word.php";
        }
        if( !isset($_SESSION['wordh']) && isset($_SESSION['word']) )
        {
          //feldolgozom a szavat
          $str=$_SESSION['word'];
          $str=mb_strtoupper($str, 'UTF-8');
          $_SESSION['word']=$str;
          //function 
          if (!function_exists('mb_str_split'))
          {
            function mb_str_split($str, $split_length = 1)
            {
              if ($split_length == 1)
              {
                return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
              }
              elseif ($split_length > 1)
              {
                $return_value = [];
                $string_length = mb_strlen($str, "UTF-8");
                for ($i = 0; $i < $string_length; $i += $split_length)
                {
                  $return_value[] = mb_substr($str, $i, $split_length, "UTF-8");
                }
                return $return_value;
              }
              else
              {
                return false;
              }
            }
          }
          $str=mb_str_split($str,1);
          $_SESSION['wordh']= count($str);
          for($x = 0; $x <$_SESSION['wordh']; $x++)
          {
            $_SESSION['word'.$x]=$str[$x];
            if ($_SESSION['word'.$x] != "-")
            {
              $_SESSION['eredmeny'.$x]="_";
            }
            else
            {
              $_SESSION['eredmeny'.$x]="-";
            }
          }
        } 
      }
    ?>
  <?php
    //eredmeny tomb feltoltes
    if( isset($_POST['g']) && ( !isset($valtozo) || ( isset($valtozo) && $valtozo!=$_POST['g']) ) )
    {
      $x=0;
      for($i=0; $i<$_SESSION['wordh'];$i++)
      {
        if(isset($_SESSION['utolso']) && $_SESSION['utolso']==$_SESSION['word'.$i])
        {
          $_SESSION['eredmeny'.$i]=$_SESSION['utolso'];
          $x++;
        }
      }
      if(isset($_SESSION['utolso']) && $x==0)
      {
        $_SESSION['hibak']++;
      }
    }
  ?>
  <?php
    //megszamolom a _ karaktereket
    $x=0;
    for($i=0; $i<$_SESSION['wordh'];$i++)
    {
      if($_SESSION['eredmeny'.$i]=="_")
      {
       $x++;
      }
    }
  ?>
  <div class="rajz">
  <?php
    $g=$_SESSION["hibak"]."_hiba";
    echo <<<END
    <img src="hibak/$g.png" class="kep" alt="heble heble">
    </a>
END
  ?>
  </div>

  
  <div class="szoveg">
    <?php
      //jatek vege ellenorzes
      if($_SESSION['hibak']>=10 || $x==0)
      {
        //session_unset();
        header("Location: postgame.php");
      }
      else
      { 
        //ha nincs vege a jateknak kiiratom az eredmeny tombot
        for($x=0; $x< $_SESSION['wordh']; $x++)
        {
         echo $_SESSION['eredmeny'.$x]. " ";
        }
      }
    ?>
  </div>
  <div class="gombok">
    <form action="jatek.php" method="post">
        <?php
          //GOMBOK LETRE HOZASA 
          $betu= array("A", "Á", "B", "C", "D", "E", "É", "F", "G", "H", "I", "Í", "J", "K", "L", "M", "N", "O", "Ó", "Ö", "Ő","P", "Q", "R", "S", "T", "U", "Ú", "Ü", "Ű", "V", "W", "X", "Y", "Z");
          for($i = 0; $i < count($betu); $i++)
          {  
            if (!isset ( $_SESSION[ $betu[$i] ] ) )
            {
              echo "<input type='submit' class='gomb' name='g' value='$betu[$i]'>";
            }   
          } 
        ?>
    </form> 
  </div>
  </body>
</html>