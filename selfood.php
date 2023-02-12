
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Food Details</title>
    
   
</head>

<body bgcolor="skyblue;">
    <style>
h1 {
  font-size: 3.5em; 
}
label {
  font-size: 1.5em; 
}
</style>
    <center>
<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "127.0.0.1";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server,$username, $password,"feed");

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $sql = "INSERT INTO food VALUES ('','$name', '$age', '$gender')";
    echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}




?>
 <form class="form" method="post" name="login">
        <h1 class="food details">Food Details</h1>
        <label for="name">Food Item: </label>
            <input type="text" name="name" id="name" placeholder="Enter food item name"><br><br>
            <label for="age">Quantity: </label>
            <input type="text" name="age" id="age" placeholder="Enter Quantity"><br><br>
            <label for="gender">Description: </label>
            <input type="text" name="gender" id="gender" placeholder="Description"><br><br>
            <input type="submit" value="submit" name="submit" class="login-button"/>
  </form>
