<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register | African Children's Fund</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include("header.html"); ?>

    <form action = "login.php" method = "post">
      <fieldset>
        <legend>Login</legend>
        <br>
        <input type="text" name="user" placeholder="User" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" name="login" value="Login">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Please register, if you are not already an user!</h2>
    <form action = "registration.php" method = "post">
      <fieldset>
        <legend>Registration</legend>
        <br>
        <input type="text" name="last_name" placeholder="Last name" required><br><br>
        <input type="text" name="first_name" placeholder="First name" required><br><br>
        <input type="text" name="user" placeholder="User name" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" name="submit" value="Submit">
        <br>&nbsp;
      </fieldset>
    </form>
    <?php include("footer.html"); ?>
  </body>
</html>
