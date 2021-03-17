<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <title>Promocje</title>
    <?php
      include("head.php");
    ?>
  </head>
  <body class="scroll-dark scroll-color-management">
      <?php
        include("header.php");
      ?>
      <main class="jumbotron-fluid">
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="promotions">
          <div class="row justify-content-center m-0">
            <div class="card m-3 card-dark card-color-management col-lg-4">
              <div class="card-body">
                <figure>
                  <img src="img/promo1.jpg" class="img-fluid mb-4 rounded" alt="">
                </figure>
                <h4 class="card-title">Trzy w cenie dwóch</h4>
                <p class="card-text">Zamawiając trzy dowolne pizze płacisz za dwie, a jedną najtańszą otrzymujesz gratis!</p>
              </div>
            </div>
            <div class="card m-3 card-dark card-color-management col-lg-4">
              <div class="card-body">
                <figure>
                  <img src="img/promo3.jpg" class="img-fluid mb-4 rounded" alt="">
                </figure>
                <h4 class="card-title">Zjesz taniej na miejscu</h4>
                <p class="card-text">Każda pizza w lokalu 30% taniej!</p>
              </div>
            </div>
            <div class="card m-3 card-dark card-color-management col-lg-4">
              <div class="card-body">
                <figure>
                  <img src="img/promo2.jpg" class="img-fluid mb-4 rounded" alt="">
                </figure>
                <h4 class="card-title">Druga pizza 50% taniej</h4>
                <p class="card-text">Zamawiając dwie dowolne pizze za drugą tańszą 50% taniej!</p>
              </div>
            </div>
            <div class="card m-3 card-dark card-color-management col-lg-4">
              <div class="card-body">
                <figure>
                  <img src="img/promo4.jpg" class="img-fluid mb-4 rounded" alt="">
                </figure>
                <h4 class="card-title">Darmowa dostawa</h4>
                <p class="card-text">Przy zamówieniu powyżej 40 złotych nic nie zapłacisz za dostawę!</p>
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