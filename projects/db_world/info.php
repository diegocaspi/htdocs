<html>

<head>
    <style>
        hr {
            border: 1px solid black;
        }
    </style>
</head>

<?php
$mysqli = new mysqli("localhost", "root", "", "world");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$safe = mysqli_real_escape_string($mysqli, $_GET['id']);
if ($result = $mysqli->query("SELECT * FROM country WHERE Code = '{$safe}'")) {
    while ($row = $result->fetch_assoc()) { ?>
        <h2>Name</h2>
        <p><?php echo $row['Name'];?></p>
        <hr>
        <h2>Continent</h2>
        <p><?php echo $row['Continent'];?></p>
        <hr>
        <h2>Region</h2>
        <p><?php echo $row['Region'];?></p>
        <hr>
        <h2>Population</h2>
        <p><?php echo $row['Population'];?></p>
        <hr>
        <h2>LifeExpectancy</h2>
        <p><?php echo $row['LifeExpectancy'];?></p>
        <hr>
        <h2>Government form</h2>
        <p><?php echo $row['GovernmentForm'];?></p>
        <hr>
<?php }
    $result->free_result();
} else {
    echo "Problem";
}

$mysqli->close();
?>

</html>