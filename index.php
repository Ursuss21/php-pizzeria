<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <title>DobraPizza</title>
    <?php
      include("head.php");
    ?>
  </head>
  <body class="scroll-dark scroll-color-management">
      <?php
        include("header.php");
      ?>
      <main class="jumbotron-fluid">
        <section class="hero-image index-bg-1 section-500 main-dark main-color-management" id="section1">
          <div class="row justify-content-center m-0">
            <div class="container-fluid position-relative middle-section-500 m-3 col-sm-6">
              <div class="semi-transparent-field-dark transparent-field-color-management">
                <h1 class="m-3">624 213 024</h1>
                <p>Zadzwoń i zamów!</p>
                <h2 class="m-3">Zobacz nasze promocje!</h2>
                <p>Sprawdź nasze oferty specjalne!</p>
                <p><a href="promotions.php" class="btn btn-dark btn-large button-color-management">Dowiedz się więcej »</a></p>
              </div>
            </div>
          </div>
        </section>
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="section2">
          <div class="row justify-content-center m-0">
            <?php
              $conn = mysqli_connect('localhost', 'r.skrzypczak', 'Rsadgj670', 'r.skrzypczak');
              if (!$conn) {
                  echo('Nie można połączyć z bazą danych'.mysqli_connect_error());
                  exit;
              }
              $sql = "select distinct products.product_name, products.product_description from products where products.size_id = '2' or products.size_id = '3' or products.size_id = '4' order by rand();";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) != 0){
                $j = 0;
                while($row = mysqli_fetch_array($result)){
                  echo "<div class='card m-3 card-dark card-color-management col-lg-3 col-md-5'>";
                  echo "<div class='card-body'>";
                  echo "<h4 class='card-title'>".$row["product_name"]."</h4>";
                  echo "<p class='card-text'>".$row["product_description"]."</p>";
                  echo "</div>";
                  echo "</div>";
                  ++$j;
                  if($j > 5){
                    break;
                  }
                }
              }
            ?>
          </div>
          <div class="row justify-content-center m-0">
            <div class="container-fluid position-relative m-3 col-sm-6">
              <div class="semi-transparent-field-dark transparent-field-color-management text-center">
                <h5 class="m-2">Pełna oferta</h5>
                <p class="m-2">Zobacz nasze menu i dowiedz się co dzisiaj może dla Ciebie przyszykować szef kuchni!</p>
                <p><a href="menu.php" class="btn btn-dark btn-large button-color-management">Zobacz menu »</a></p>
              </div>
            </div>
          </div>
        </section>
        <section class="hero-image index-bg-2 section-500 main-dark main-color-management" id="section3">
          <div class="row justify-content-center m-0">
            <div class="container-fluid position-relative middle-section-500 m-3 col-sm-6">
              <div class="semi-transparent-field-dark transparent-field-color-management">
                <h5 class="m-2">Nasza restauracja</h5>
                <p class="m-2">W naszej restauracji dbamy nie tylko o jakość serwowanych produktów, ale również wspaniały styl, dzięki któremu jedzenie będzie dla Ciebie przyjemnością!</p>
                <p><a href="gallery.php" class="btn btn-dark btn-large button-color-management">Zobacz galerię »</a></p>
              </div>
            </div>
          </div>
        </section>
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="section4">
          <div class="row justify-content-center m-0 position-relative middle-section-500">
            <form action="action_page.php" class="col-sm-6 m-3">
              <div class="container">
                <div class="collapse" id="newsletterCollapse"></div>
                <h2>Zapisz się do newslettera!</h2>
                <p>Dzięki temu będziesz miał dostęp do najnowszych ofert specjalnych</p>
              </div>
              <div class="container">
                <input type="text" placeholder="Imię" name="name" id="newsletterNickname" required>
                <input type="text" placeholder="Adres e-mail" name="mail" id="newsletterEmail" required>
              </div>
              <div class="container">
                <input type="submit" value="Zapisz się" name="newsletterSubmit" id="newsletterSubmit">
              </div>
            </form>
          </div>
        </section>
      </main>
      <?php
        include("footer.php");
      ?>
  </body>
</html>