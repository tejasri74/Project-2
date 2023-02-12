<!DOCTYPE html>
<?php
 
 $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "feed";
$mysqli = new mysqli($server, $username,$password, $database);
 
// Checking for connections
if(!$mysqli){
    die("connection to this database failed due to" . mysqli_connect_error());
}
 
// SQL query to select data from database
$sql = " SELECT * FROM food ORDER BY id ";
$result = mysqli_query($mysqli,$sql);
$mysqli->close();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Food Available</title>
    <link rel="stylesheet" href="selfood.php"/>
</head>
<style>

</style>

<body>
<style>
h1 {
  font-size: 3.5em; 
}
tr {
  font-size: 1.5em; 
}
</style>

    <section>
        <center>
        <h1>Available Food</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <style>
        table, th, td {
  border: 1px solid black;
}
body {background-color: powderblue;}
</style>

            <tr>
                <th>Food Item</th>
                <th>Quantity</th>
                <th>Description</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows = mysqli_fetch_array($result))
                {
            ?>
            <form>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <?php echo "<td>" . $rows['Name'] . "</td>"; ?>
                <?php echo "<td>" . $rows['Age'] . "</td>";?>
                <?php echo "<td>" . $rows['Gender'] . "</td>";?>
                <td><p class="link"><a href="accept.html">Accept</a></p></td>
                
            </tr>
            <?php
                }
            ?>
        </table>
            </form>
            </center>
    </section>
     </body>
</html>