<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <title>Galeria</title>
    <?php
      include("head.php");
    ?>
  </head>
  <body class="scroll-dark scroll-color-management">
      <?php
        include("header.php");
      ?>
      <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content modal-dark modal-color-management">
            <div class="modal-body d-flex justify-content-center">
              <img src="img/empty.png" alt="" class="img-fluid mx-auto" id="imagepreview">
            </div>
          </div>
        </div>
      </div>
      <main class="jumbotron-fluid">
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="gallery">
          <div class="container py-4">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-12">
                <figure>
                  <img src="img/gallery1.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery2.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery7.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery6.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                <figure>
                  <img src="img/gallery5.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery3.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery4.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery8.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                <figure>
                  <img src="img/gallery9.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery10.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery11.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery12.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                <figure>
                  <img src="img/gallery13.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery14.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery15.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
                <figure>
                  <img src="img/gallery16.jpg" class="img-fluid mb-4 enable-modal" alt="">
                </figure>
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