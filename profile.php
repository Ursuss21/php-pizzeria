<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <title>Profil</title>
    <?php
      include("head.php");
    ?>
  </head>
  <body class="scroll-dark scroll-color-management">
      <?php
        include("header.php");
      ?>
      <main class="jumbotron-fluid">
        <?php
          if(isset($_SESSION["username"])){
            include("userLoggedIn.php");
          }
          else{
            include("userLoggedOut.php");
          }
        ?>
      </main>
      <?php
      include("footer.php");
      ?>
  </body>
</html>