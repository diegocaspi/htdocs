<?php

$mysqli = new mysqli("localhost", "root", "", "world");

if ($mysqli->connect_errno):
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
endif;

function getSafe($str, $conn) {
    return mysqli_real_escape_string($conn, $str);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'):
    if (isset($_GET['action']) and isset($_GET['code'])):
        switch($_GET['action']) {
            case 'getNation':
                // get data from db
                if ($result = $mysqli->query('SELECT * FROM country WHERE Code = "'. getSafe($_GET['code'], $mysqli) . '"')) {
                    while ($row = $result->fetch_assoc()) {
                        echo json_encode($row);
                    }
                }
                break;
        }
    endif;
endif;
?>