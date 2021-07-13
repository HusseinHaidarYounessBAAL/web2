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
                <form action="page5.php" method="post">
                    <table>
                        <tr>
                            <td>Language: </td>
                            <td>
                                <select name='lang' id="lang" style="width: 90%;" onchange="checkLevel()" required>
                                    <option value='' disabled selected="">Choose a language</option>
                                    <?php
                                        include 'Queries/Connect.php';
                                        $mysql = $mysqli->query("SELECT * FROM langage");
                                        while($l = $mysql->fetch_assoc()){
                                            ?>
                                    <option value='<?php echo $l['idlangage'] ; ?>'><?php echo $l['nomlangage']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Level: </td>
                            <td>
                                <select name='level' id="level" style="width: 90%;" required>
                                    <option value='' disabled selected>Choose a level</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                </select></td>
                        </tr>
                        
                    </table>
                    <input type="Submit" value="Start" style="margin-left: auto; width: 20%; color: black;height: 30px;">
                </form>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="layout/styles/layout.css">
    </body>
</html>

