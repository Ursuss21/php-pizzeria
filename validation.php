<?php
    $conn = mysqli_connect('localhost', 'r.skrzypczak', 'Rsadgj670', 'r.skrzypczak');
    if (!$conn) {
        echo('Nie można połączyć z bazą danych'.mysqli_connect_error());
        exit;
    }

    if(isset($_POST["registerSubmit"])){
        if(isset($_POST["registerUsername"]) && isset($_POST["registerEmail"]) &&isset($_POST["registerPassword"])){
            $username = $_POST["registerUsername"];
            $email = $_POST["registerEmail"];
            $password = $_POST["registerPassword"];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "insert into users(user_nickname, user_email, user_password_hash) values('".$username."','".$email."','".$password."');";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<p class='text-success'>Zarejestrowano! Możesz teraz się zalogować.</p>";
            }
            else{
                echo "<p class='text-success'>Błąd rejestracji.</p>";
            }
        }
    }
    else{
        if(isset($_POST["registerUsername"])){
            $username = $_POST["registerUsername"];
            $query = "select count(*) as userCount from users where user_nickname='".$username."'";
            $result = mysqli_query($conn, $query);
            $response = "<p class='text-success'>Nazwa użytkownika wolna</p>";
            if(mysqli_num_rows($result)){
                $row = mysqli_fetch_array($result);
                $count = $row["userCount"];
                if($count > 0){
                    $response = "<p class='text-danger'>Nazwa użytkownika zajęta</p>";
                }
            }
            echo $response;
        }
    
        if(isset($_POST["registerEmail"])){
            $email = $_POST["registerEmail"];
            $query = "select count(*) as userCount from users where user_email='".$email."'";
            $result = mysqli_query($conn, $query);
            $response = "<p class='text-success'>Adres e-mail wolny</p>";
            if(mysqli_num_rows($result)){
                $row = mysqli_fetch_array($result);
                $count = $row["userCount"];
                if($count > 0){
                    $response = "<p class='text-danger'>Adres e-mail zajęty</p>";
                }
            }
           echo $response;
        }
    }

    if(isset($_POST["newsletterNickname"]) && isset($_POST["newsletterEmail"])){
        $nickname = $_POST["newsletterNickname"];
        $email = $_POST["newsletterEmail"];
        $response = "";
        $query = "select newsletter_id from newsletter where newsletter_email='".$email."';";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_array($result);
            $response = "<p class='text-danger'>Podany adres e-mail już znajduje się w naszym newsletterze!</p>";
        }
        else{
            $query2 = "insert into newsletter(newsletter_nickname, newsletter_email) values('".$nickname."','".$email."');";
            $result2 = mysqli_query($conn, $query2);
            if($result2){
                $response = "<p class='text-success'>Dodano do newslettera! Będziesz otrzymywał informacje o naszych ofertach.</p>";
            }
            else{
                $response = "<p class='text-danger'>Błąd dodawania do newslettera.</p>";
            }
        }
        echo $response;
    }

    if(isset($_POST["loginPassword"]) && isset($_POST["loginUsername"])){
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];
        $query = "select user_password_hash from users where user_nickname='".$username."'";
        $result = mysqli_query($conn, $query);
        $hash = mysqli_fetch_array($result);
        $hash = $hash["user_password_hash"];
        $response = "";
        if(!password_verify($password, $hash)){
            $response = "<p class='text-danger'>Nieprawidłowe hasło</p>";
        }
        else{
            if(!session_start()){
                $response = "<p class='text-danger'>Błąd rozpoczęcia sesji</p>";
                exit;
            }
            $_SESSION["username"] = $username;
        }
        echo $response;
    }

    if(isset($_POST["logout"])){
        session_unset();
        setcookie("PHPSESSID","",time()-3600,"/");
        $_SESSION = array();
        session_destroy();
    }
?>