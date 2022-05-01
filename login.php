<?php
    if(isset($_POST['user']) && isset($_POST['password'])) {
        try {

            $dbh = new PDO('mysql:host=localhost;dbname=africanchild', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            

            $sqlSelect = "select id, last_name, fist_name from felhasznalok where signin = :signin and password = sha1(:password)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':signin' => $_POST['user'], ':password' => $_POST['password']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($row)) { ?>
            <?php if($row) { ?>
                <h1>Sing in:</h1>
                Identifier: <strong><?= $row['id'] ?></strong><br><br>
                Name: <strong><?= $row['last_name']." ".$row['first_name'] ?></strong>
            <?php } else { ?>
                <h1>Login failed!</h1>
                <a href="pelda.html" >Try again!</a>
            <?php } ?>
        <?php } ?>
    </body>
</html>