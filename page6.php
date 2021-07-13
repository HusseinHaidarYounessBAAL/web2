<?php
session_start();
if(!isset($_SESSION['WebQuizAbonne']))
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
                <div id="search">
                    <?php
                    include 'Queries/Connect.php';
                    $sResult = $mysqli->query("SELECT note, datetest, niveau,nomlangage FROM test,langage"
                            . " WHERE idabonne={$_SESSION['WebQuizAbonne']}"
                            . " AND test.idlangage=langage.idlangage ORDER BY datetest DESC");
                    if ($sResult->num_rows > 0) {
                        echo "<table id='customers'> <tr>"
                        . "<td width='5%'><b> # </b></td>"
                        . "<td><b> Language </b></td>"
                        . "<td><b> Level </b></td>"
                        . "<td><b> Score </b></td>"
                        . "<td><b> Date </b></td></tr>";
                        $i = 1;
                        while ($data = $sResult->fetch_assoc()) {
                            echo "<tr>"
                            . "<td> $i </td>"
                            . "<td>{$data['nomlangage']}</td>"
                            . "<td>{$data['niveau']}</td>"
                            . "<td>{$data['note']}</td>"
                            . "<td>{$data['datetest']}</td></tr>";
                            $i ++;
                        }
                        echo "</table>";
                    } else
                        echo "لا نتائج حتى الساعة";
                    ?>
                </div>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="layout/styles/layout.css">
    </body>
</html>

