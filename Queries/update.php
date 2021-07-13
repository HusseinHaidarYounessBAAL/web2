<?php

session_start();
include 'Connect.php';
if (isset($_GET['q'])) {
    $lang = $_GET['lang'];
    $question = json_encode($_GET['q']);
    $insert_q = "UPDATE `question` SET `enonce`=$question,`niveau`={$_GET['level']},`idlangage`={$_GET['lang']},"
    . "`idadmin`={$_SESSION['WebQuizAdmin']} WHERE noquestion={$_GET['id']}";
    $add_question = mysqli_query($mysqli, $insert_q);
    $id_q = $_GET['id'];
    $mysqli->query("DELETE FROM `reponse` WHERE noquestion=$id_q");
    if (isset($_GET['t'])) {
        $t_a = json_encode($_GET['t']);
        $true_ans = "INSERT INTO `reponse`(`noreponse`, `texte`, `correct`, `noquestion`) VALUES (NULL,$t_a,true,$id_q)";
        $insert_t_a = mysqli_query($mysqli, $true_ans);
    }
    if (isset($_GET['f1']) && $_GET['f1'] != '') {
        $f_a = json_encode($_GET['f1']);
        $false_ans = "INSERT INTO `reponse`(`noreponse`, `texte`, `correct`, `noquestion`) VALUES (NULL,$f_a,false,$id_q)";
        $insert_f_a = mysqli_query($mysqli, $false_ans);
    }
    if (isset($_GET['f2']) && $_GET['f2'] != '') {
        $f_a = json_encode($_GET['f2']);        
        $false_ans = "INSERT INTO `reponse`(`noreponse`, `texte`, `correct`, `noquestion`) VALUES (NULL,$f_a,false,$id_q)";
        $insert_f_a = mysqli_query($mysqli, $false_ans);
    }
    if (isset($_GET['f3']) && $_GET['f3'] != '') {
        $f_a = json_encode($_GET['f3']);
        $false_ans = "INSERT INTO `reponse`(`noreponse`, `texte`, `correct`, `noquestion`) VALUES (NULL,$f_a,false,$id_q)";
        $insert_f_a = mysqli_query($mysqli, $false_ans);
    }
    if (isset($_GET['f4']) && $_GET['f4'] != '') {
        $f_a = json_encode($_GET['f4']);
        $false_ans = "INSERT INTO `reponse`(`noreponse`, `texte`, `correct`, `noquestion`) VALUES (NULL,$f_a,false,$id_q)";
        $insert_f_a = mysqli_query($mysqli, $false_ans);
    }
}
header("location:../page3.php");

?>