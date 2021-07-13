<?php

session_start();
include 'Connect.php';

if (isset($_POST['user'])) {
    $user = json_encode($_POST['user']);
    $pass = json_encode($_POST['pass']);

    $type = $_POST['type'];

    if ($type == "Admin") {
        $loginadmin = $mysqli->query("SELECT * FROM admin WHERE username=$user AND password=$pass");
        if ($loginadmin->num_rows > 0)
            while ($a = $loginadmin->fetch_assoc()) {
                $_SESSION['WebQuizAdmin'] = $a['idadmin'];
                header("location: ../page2.php");
            } else {
            $_SESSION['error'] = 'Incorrect user or password';
            header("location: ../index.php");
        }
    }
    if ($type == "Subscriber") {
        $loginsub = $mysqli->query("SELECT * FROM abonne WHERE username=$user AND password=$pass");
        if ($loginsub->num_rows > 0)
            while ($s = $loginsub->fetch_assoc()) {
                $_SESSION['WebQuizAbonne'] = $s['idabonne'];
                header("location: ../page4.php");
            } else {
            $_SESSION['error'] = 'Incorrect user or password';
            header("location: ../index.php");
        }
    }
}
?>
