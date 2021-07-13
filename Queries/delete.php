<?php
include 'Connect.php';
    $mysqli->query("DELETE FROM `reponse` WHERE noquestion={$_GET['id']}");
    $mysqli->query("DELETE FROM `question` WHERE noquestion={$_GET['id']}");
    header("location:../page3.php");
