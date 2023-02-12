<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Donor Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $name = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            echo "<div class='form'>
            <h3>Welcome Donor.</h3><br/>
            <p class='link'>Click here to <a href='selfood.php'>donate</a></p>
            </div>";
 
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="food details">Login</h1>
            <input type="text" id="id" placeholder="enter id">
            <input type="text" name="name" id="name" placeholder="Enter food item name">
            <input type="text" name="age" id="age" placeholder="Enter Quantity">
            <input type="text" name="gender" id="gender" placeholder="Description">
  </form>
<?php
    }
?>
</body>
</html>