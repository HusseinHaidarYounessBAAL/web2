<?php
session_start();
if (!isset($_SESSION['WebQuizAbonne']))
    header("location:index.php");
?>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="layout/styles/layout1.css" rel="stylesheet" type="text/css" media="all">
        <script type="text/javascript" src="js/index.js"></script>
        <style>
            table, tr, th, td {text-align: center;}
            input {width: 100%;}
        </style>

    </head>
    <body>
        <div class="wrapper row4" style="margin-bottom: 20px">
            <div class="rounded">
                <nav id="mainav" class="clear">
                    <nav id="Tabs" style="margin-top: 30px">
                        <div align="center">
                            <ul id="TabsUL">
                                <li onclick="history.back()"><</li>
                                <li><a href="page4.php"> Start New Test</a></li>
                                <li><a href="page6.php"> Show Results </a></li>
                                <li><a href="logout.php"> Logout  </a></li>
                            </ul>
                        </div>
                    </nav>
                </nav>
            </div>
        </div>
        <div class="wrapper row4" style="margin-top: 10%;">
            <div class="rounded"align="center">
                <h1> SCORE: <?php echo $_GET['score']; ?></h1>
                <?php
                include 'Queries/Connect.php';
                if (isset($_GET['q'])) {
                    ?>
                    <table>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style='width: 40%;'>question</th>
                            <th>Right Answer</th>
                        </tr>
                        <?php
                        $sql = $mysqli->query("SELECT texte, enonce FROM question, reponse WHERE question.noquestion={$_GET['q1']} AND  correct=1 AND question.noquestion=reponse.noquestion");
                        while ($r = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>1</td>
                                <td><input readonly='readonly' style='background-color: #e1e7f4; border:none;font-weight: bold;'value='<?php echo $r['enonce']; ?>'/></td>
                                <td><input value='<?php echo $r['texte']; ?>' readonly='readonly' style='background-color: #e1e7f4; border:none;'/></td>
                            </tr>
                            <?php
                        }
                    }
                    if (isset($_GET['q1'])) {
                        $sql = $mysqli->query("SELECT texte, enonce FROM question, reponse WHERE question.noquestion={$_GET['q2']} AND  correct=1 AND question.noquestion=reponse.noquestion");
                        while ($r = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>2</td>
                                <td><input readonly='readonly' style='background-color: #e1e7f4; border:none;font-weight: bold;'value='<?php echo $r['enonce']; ?>'/></td>
                                <td><input value='<?php echo $r['texte']; ?>' readonly='readonly' style='background-color: #e1e7f4; border:none;'/></td>
                            </tr>
                            <?php
                        }
                    }
                    if (isset($_GET['q2'])) {
                        $sql = $mysqli->query("SELECT texte, enonce FROM question, reponse WHERE question.noquestion={$_GET['q2']} AND  correct=1 AND question.noquestion=reponse.noquestion");
                        while ($r = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>3</td>
                                <td><input readonly='readonly' style='background-color: #e1e7f4; border:none;font-weight: bold;'value='<?php echo $r['enonce']; ?>'/></td>
                                <td><input value='<?php echo $r['texte']; ?>' readonly='readonly' style='background-color: #e1e7f4; border:none;'/></td>
                            </tr>
                            <?php
                        }
                    }
                    if (isset($_GET['q3'])) {
                        $sql = $mysqli->query("SELECT texte, enonce FROM question, reponse WHERE question.noquestion={$_GET['q3']} AND  correct=1 AND question.noquestion=reponse.noquestion");
                        while ($r = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>4</td>
                                <td><input readonly='readonly' style='background-color: #e1e7f4; border:none;font-weight: bold;'value='<?php echo $r['enonce']; ?>'/></td>
                                <td><input value='<?php echo $r['texte']; ?>' readonly='readonly' style='background-color: #e1e7f4; border:none;'/></td>
                            </tr>
                            <?php
                        }
                    }
                    if (isset($_GET['q4'])) {
                        $sql = $mysqli->query("SELECT texte, enonce FROM question, reponse WHERE question.noquestion={$_GET['q4']} AND  correct=1 AND question.noquestion=reponse.noquestion");
                        while ($r = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>5</td>
                                <td><input readonly='readonly' style='background-color: #e1e7f4; border:none;font-weight: bold;'value='<?php echo $r['enonce']; ?>'/></td>
                                <td><input value='<?php echo $r['texte']; ?>' readonly='readonly' style='background-color: #e1e7f4; border:none;'/></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <?php
                ?>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="layout/styles/layout.css">
    </body>
</html>

