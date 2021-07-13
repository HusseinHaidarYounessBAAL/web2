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
                <form name="Quiz" id="Quiz" action="Queries/score.php" method="post">
                    <input type="hidden" name="lang" id="lang" value="<?php echo $_POST['lang']; ?>">
                    <input type="hidden" name="level" id="level" value="<?php echo $_POST['level']; ?>">
                    <?php
                    include 'Queries/Connect.php';
                    $sQuestions = $mysqli->query("SELECT * FROM question WHERE niveau={$_POST['level']} AND idlangage={$_POST['lang']}");
                    $qs = array();
                    $id_qs = array();
                    if ($sQuestions->num_rows > 0) {
                        $num_question = 1;
                        while ($data = $sQuestions->fetch_assoc()) {
                            array_push($id_qs, $data['noquestion']);
                            array_push($qs, $data['enonce']);
                        }
                        $q_num = 1;
                        while ($q_num <= 5) {
                            $ans = array();
                            $ans_val = array();
                            $length = count($qs);
                            $r = rand(0, $length - 1);
                            //choice randomly question
                            echo "<div id='qq$num_question'";
                            if ($num_question != 1)
                                echo " style='display: none;'";
                            echo "> <table><tr><td colspan='3'><b>" . $num_question . "<input readonly='readonly' style='background-color: #e1e7f4; border:none; width: 97%; float:right;font-weight: bold;'value=\""
                            . $qs[$r] . "\"/></b></td><input type='hidden' name='noquestion[]' value='{$id_qs[$r]}'/></tr>";
                            //select all answers to this question
                            //echo "SELECT * FROM answers WHERE ID_question={$id_qs[$r]}";
                            $sAnswers = mysqli_query($mysqli, "SELECT * FROM reponse WHERE `noquestion`={$id_qs[$r]}");
                            if ($sAnswers->num_rows > 0) {
                                while ($data = $sAnswers->fetch_assoc()) {
                                    array_push($ans, $data['noreponse']);
                                    array_push($ans_val, $data['texte']);
                                }
                            }
                            $l = count($ans);
                            while ($l > 0) {
                                $a_r = rand(1, $l) - 1;
                                echo "<tr><td style='width:2%'><input type='radio' name='q" . $num_question . "' id='q" . $num_question . "'"
                                . " value='" . $ans[$a_r] . "' onclick='document.getElementById(\"answer$q_num\").value=this.value'></td>"
                                        . "<td style='width: 100%;'><input readonly='readonly' style='background-color: #e1e7f4; border:none; width: 100%'value='"
                                . $ans_val[$a_r] . "'/></td></tr>";
								
									

                                array_splice($ans, $a_r, 1);
                                array_splice($ans_val, $a_r, 1);
                                $l = count($ans);
                            }
                            echo "</table><input type='hidden' name='answers[]' id='answer$q_num'/>";

                            echo "</table> ";
                            if ($num_question != 1)
                                echo "<input type='button'value='Previous' onclick='back($num_question)'>";
                            if ($q_num < 5)
                                echo "<input type='button' value='Next' onclick='next($num_question)'";
                            else
                                echo "<input type='submit' value='Submit'  ";
                            echo "></div>";
                            array_splice($qs, $r, 1);
                            array_splice($id_qs, $r, 1);
                            $num_question ++;
                            $q_num ++;
                        }
                    }
                    else {
                        echo "No Question";
                    }
                    ?>
                </form>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="layout/styles/layout.css">
    </body>
</html>

