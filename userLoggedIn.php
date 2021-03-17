<section class="jumbotron-fluid section-70vh main-dark main-color-management" id="userPanel">
    <div class="row justify-content-center text-center m-0">
        <div class="container-fluid m-3 col-sm-6">
            <table class="table table-dark table-striped table-color-management">
                <tbody>
                    <?php
                    $conn = mysqli_connect('localhost', 'r.skrzypczak', 'Rsadgj670', 'r.skrzypczak');
                    if (!$conn) {
                        echo('Nie można połączyć z bazą danych'.mysqli_connect_error());
                        exit;
                    }
                    $currentUser = $_SESSION["username"];
                    $sql = "select users.user_nickname, users.user_email from users where user_nickname = '".$currentUser."';";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) != 0){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td data-title='Nazwa użytkownika'>Nazwa użytkownika</td>";
                            echo "<td >".$row["user_nickname"]."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td data-title='E-mail'>Adres e-mail</td>";
                            echo "<td >".$row["user_email"]."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>