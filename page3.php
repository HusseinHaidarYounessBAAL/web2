<?php
session_start();
if(!isset($_SESSION['WebQuizAdmin']))
    header("location:index.php");
?>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="layout/styles/layout1.css" rel="stylesheet" type="text/css" media="all">
        <script type="text/javascript" src="js/index.js"></script>

    </head>
    <body>
        <div class="wrapper row4" style="margin-bottom: 20px">
            <div class="rounded">
                <nav id="mainav" class="clear">
                    <nav id="Tabs" style="margin-top: 30px">
                        <div align="center">
                            <ul id="TabsUL">
                                <li onclick="history.back()"><</li>
                                <li><a href="page3.php"> Show Questions</a></li>
                                <li><a href="page2.php"> Add Question </a></li>
                                <li><a href="logout.php"> Logout  </a></li>
                            </ul>
                        </div>
                    </nav>
                </nav>
                <input type="hidden" name="slang" id="slang" value="">
            </div>
        </div>
        <div class="wrapper row4" style="margin-top: 10%;">
            <div class="rounded"align="center">
                <?php
                include 'Queries/Connect.php';
                $sQuestions = mysqli_query($mysqli, "SELECT * FROM `question`");

                if ($sQuestions->num_rows > 0) {
                    echo "<table style='text-align:center;'><tr><th>#</th><th>Question</th><th>Level</th><th>Language</th><th>Modify<?th><th>Delete</th></tr>";
                    $i = 0;
                    while ($data = $sQuestions->fetch_assoc()) {
                        $q_lang = $mysqli->query("SELECT * FROM langage WHERE idlangage={$data['idlangage']}");
                        $lang = '';
                        while($l = $q_lang->fetch_assoc())
                                $lang = $l['nomlangage'];
                        $i++;
                        echo "<tr><td width='5%'>$i</td>"
                        . "<td>{$data['enonce']}</td>"
                        . "<td>level {$data['niveau']}</td>"
                        . "<td> $lang</td>"
                        . "<td> <a href='Answers.php?id={$data['noquestion']}'>Modify </a></td>"
                        . "<td><a href='Queries/delete.php?id={$data['noquestion']}'>Delete</a></td>"
                        . "</tr>";
                    }
                    echo "</table>";
                } else
                    echo "No Questions";
                ?>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="layout/styles/layout.css">
    </body>
</html>

