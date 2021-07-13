<?php

session_start();
include 'Connect.php';

$score = 0;
    $error = '';
foreach ($_POST['answers'] as $key => $nor) {
    if ($nor != '') {
        $sql = $mysqli->query("SELECT * FROM reponse WHERE noreponse=$nor");
        echo "SELECT * FROM reponse WHERE noreponse='$nor'<br>";
        $i = 1;
        if ($sql->num_rows > 0)
            while ($s = $sql->fetch_assoc()) {
                if ($s['correct'] == 1)
                    $score ++;
                else {
                    $error = $error . 'q' . $i . "=" . $_POST['noquestion'][$key] . '&';
                    $i ++;
                }
            }
    } else {
        $error = $error . 'q' . $i . "=" . $_POST['noquestion'][$key] . '&';
        $i ++;
    }
}

$insert_test = $mysqli->query("INSERT INTO `test`(`notest`, `note`, `datetest`, `idlangage`, `niveau`, `idabonne`) "
        . "VALUES (NULL,$score,CURRENT_DATE,{$_POST['lang']},{$_POST['level']},{$_SESSION['WebQuizAbonne']})");
header("location: ../Score.php?$error"."score=$score");
?>
