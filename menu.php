<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <title>Menu</title>
    <?php
      include("head.php");
    ?>
  </head>
  <body class="scroll-dark scroll-color-management">
      <?php
        include("header.php");
      ?>
      <main class="jumbotron-fluid">
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="pizza">
          <div class="row justify-content-center m-0">
            <div class="container-fluid d-flex justify-content-center m-3 col-lg-8">
              <div class="semi-transparent-field-dark transparent-field-color-management">
                <h2 class="text-center">Pizza</h2>
                <table class="table table-dark table-striped table-color-management">
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Składniki</th>
                      <th>30cm</th>
                      <th>40cm</th>
                      <th>50cm</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $conn = mysqli_connect('localhost', 'r.skrzypczak', 'Rsadgj670', 'r.skrzypczak');
                      if (!$conn) {
                          echo('Nie można połączyć z bazą danych'.mysqli_connect_error());
                          exit;
                      }

                      $sql = "select distinct products.product_name, products.product_description from products where products.size_id = '2' or products.size_id = '3' or products.size_id = '4';";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result) != 0){
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td data-title='Nazwa'>".$row["product_name"]."</td>";
                          echo "<td data-title='Składniki'>".$row["product_description"]."</td>";
                          $sql2 = "select price from products where products.product_name = '".$row["product_name"]."';";
                          $result2 = mysqli_query($conn, $sql2);
                          if(mysqli_num_rows($result2) != 0){
                            $i = 0;
                            while($row = mysqli_fetch_array($result2)){
                              switch($i){
                                case 0:
                                  echo "<td data-title='30cm'>";
                                  break;
                                case 1:
                                  echo "<td data-title='40cm'>";
                                  break;
                                case 2:
                                  echo "<td data-title='50cm'>";
                                  break;
                              }
                              echo $row["price"]." zł</td>";
                              ++$i;
                            }
                            echo "</tr>";
                          }
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
        <section class="jumbotron-fluid section-500 main-dark-v2 main-v2-color-management" id="dodatki">
          <div class="row justify-content-center m-0">
            <div class="container-fluid d-flex justify-content-center m-3 col-lg-8">
              <div class="semi-transparent-field-dark transparent-field-color-management">
                <h2 class="text-center">Dodatki</h2>
                <table class="table table-dark table-striped table-color-management">
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Informacje</th>
                      <th>Cena</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $conn = mysqli_connect('localhost', 'r.skrzypczak', 'Rsadgj670', 'r.skrzypczak');
                      if (!$conn) {
                          echo('Nie można połączyć z bazą danych'.mysqli_connect_error());
                          exit;
                      }

                      $sql = "select products.product_name, products.product_description, products.price from products where products.size_id = '1';";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result) != 0){
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td data-title='Nazwa'>".$row["product_name"]."</td>";
                          echo "<td data-title='Informacje'>".$row["product_description"]."</td>";
                          echo "<td data-title='Cena'>".$row["price"]." zł</td>";
                          echo "</tr>";
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="napoje">
          <div class="row justify-content-center m-0">
            <div class="container-fluid d-flex justify-content-center m-3 col-lg-8">
              <div class="semi-transparent-field-dark transparent-field-color-management">
                <h2 class="text-center">Napoje</h2>
                <table class="table table-dark table-striped table-color-management">
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Informacje</th>
                      <th>Cena</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $conn = mysqli_connect('localhost', 'r.skrzypczak', 'Rsadgj670', 'r.skrzypczak');
                      if (!$conn) {
                          echo('Nie można połączyć z bazą danych'.mysqli_connect_error());
                          exit;
                      }

                      $sql = "select products.product_name, products.product_description, products.price from products where products.size_id = '5' or products.size_id = '6';";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result) != 0){
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td data-title='Nazwa'>".$row["product_name"]."</td>";
                          echo "<td data-title='Informacje'>".$row["product_description"]."</td>";
                          echo "<td data-title='Cena'>".$row["price"]." zł</td>";
                          echo "</tr>";
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </main>
      <?php
        include("footer.php");
      ?>
  </body>
</html>