<?php
    $id = $_GET['id'];
    $link = mysqli_connect("localhost", "root", "", "cinema_db");

    $sql = "DELETE FROM Reservation WHERE ID = $id"; 

    if ($link->query($sql) === TRUE) {
        header('Location: admin.php');
        exit;
    } else {
        echo "Error deleting record: " . $link->error;
    }
?>
