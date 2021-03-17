<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-color-management">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo-dark.png" width="150" height="50" class="d-inline-block align-top" id="logo" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <?php
                if($_SERVER["REQUEST_URI"] == "/~robert.skrzypczak/project/menu.php"){
                    include("navmenu.php");
                }
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="promotions.php">Promocje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="colorToggle">Jasny motyw</a>
                </li>
                <?php
                    if(isset($_SESSION["username"])){
                        include("userLoggedInHeader.php");
                    }
                    else{
                        include("userLoggedOutHeader.php");
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-dark modal-color-management">
            <form action="index.php" method="post" id="loginForm">
                <div class="modal-header m-1">
                    <h5 class="modal-title">Zaloguj się</h5>
                    <button type="button" class="close close-dark close-color-management" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="collapse" id="infoCollapse"></div>
                    <div class="form-group">
                        <label for="loginUsername">Nazwa użytkownika:</label>
                        <input type="text" class="form-control" placeholder="Podaj nazwę użytkownika" name="loginUsername" id="loginUsername">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Hasło:</label>
                        <input type="password" class="form-control" placeholder="Podaj hasło" name="loginPassword" id="loginPassword">
                        <div class="collapse" id="loginPasswordCollapse"></div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="loginSubmit" id="loginSubmit">Zaloguj</button>
                    </div>
                </div>
                <div class="modal-footer row m-1">
                    <div class="form-group mr-auto col-sm-7">
                        <label>Nie masz konta? <a href="#" class="loginModalToggle" data-toggle="modal" data-target="#registerModal">Załóż konto</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-dark modal-color-management">
            <form action="index.php" method="post" id="registerForm">
                <div class="modal-header m-1">
                    <h5 class="modal-title">Zarejestruj się</h5>
                    <button type="button" class="close close-dark close-color-management" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="registerUsername">Nazwa użytkownika:</label>
                        <input type="text" class="form-control" placeholder="Podaj nazwę użytkownika" name="registerUsername" id="registerUsername">
                        <div class="collapse" id="registerUsernameCollapse"></div>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Adres e-mail:</label>
                        <input type="email" class="form-control" placeholder="Podaj adres e-mail" name="registerEmail" id="registerEmail">
                        <div class="collapse" id="registerEmailCollapse"></div>
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Hasło:</label>
                        <input type="password" class="form-control" placeholder="Podaj hasło" name="registerPassword" id="registerPassword">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="registerSubmit" id="registerSubmit">Zarejestruj</button>
                    </div>
                </div>
                <div class="modal-footer row m-1">
                    <div class="form-group mr-auto col-sm-7">
                        <label>Masz już konto? <a href="#" class="loginModalToggle" data-toggle="modal" data-target="#loginModal">Zaloguj się</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>