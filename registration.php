<?php
    if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['last_name']) && isset($_POST['first_name'])) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=africanchild', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            $sqlSelect = "select id from users where login = :login";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':login' => $_POST['user']));
            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "The username is already taken!";
                $ujra = "true";
            }
            else {
                $sqlInsert = "insert into users(id, last_name, fist_name, login, password)
                              values(0, :last_name, :first_name, :login, :password)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':last_name' => $_POST['last_name'], ':first_name' => $_POST['first_name'],
                                     ':login' => $_POST['user'], ':password' => sha1($_POST['password']))); 
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "Registration successful.<br> ID: {$newid}";                     
                    $ujra = false;
                }
                else {
                    $uzenet = "Registration failed.";
                    $ujra = true;
                }
            }
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration:</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="register.php">Try again!</a>
            <?php } ?>
        <?php } ?>
    </body>  
</html>