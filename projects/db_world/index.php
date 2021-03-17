<html>

<head>
    <style>
        table,
        th,
        td {
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

if ($result = $mysqli->query("SELECT * FROM country")) { ?>
    <table style="width:70%">
        <tr>
            <th>Name</th>
            <th>Continent</th>
            <th>Region</th>
            <th>View</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php echo $row['Name'] ?>
                </td>
                <td>
                    <?php echo $row['Continent'] ?>
                </td>
                <td>
                    <?php echo $row['Region'] ?>
                </td>
                <td>
                    <a href="./info.php?id=<?php echo $row['Code'];?>">Show more</a>
                </td>
            </tr>

        <?php } ?>
    </table>

<?php
    // Free result set
    $result->free_result();
}

$mysqli->close();
?>

</html>