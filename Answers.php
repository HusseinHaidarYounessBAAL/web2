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
        <?php
        include 'Queries/Connect.php';
        $l = '';
        $n = '';
        $q = '';
        $at = '';
        $af = array();
        
        $q_question = $mysqli->query("SELECT * FROM question WHERE noquestion={$_GET['id']}");
        while($qq = $q_question->fetch_assoc()){
            $l = $qq['idlangage'];
            $n = $qq['niveau'];
            $q = $qq['enonce'];
        }
        $q_answer = $mysqli->query("SELECT * FROM reponse WHERE noquestion={$_GET['id']}");
        while($qa = $q_answer->fetch_assoc()){
            if($qa['correct']==1)
                $at = $qa['texte'];
            else {
                
                array_push($af, $qa['texte']);
                
            }
        }
        ?>
        <div class="wrapper row4" style="margin-top: 10%;">
            <div class="rounded"align="center">
                <form name="Insert" action="Queries/update.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                    <table>
                        <tr>
                            <td>Language: </td>
                            <td>
                                <select name='lang' style="width: 90%;" required>
                                    <option value='' disabled >Choose a language</option>
<?php
$mysql = $mysqli->query("SELECT * FROM langage");
while ($l = $mysql->fetch_assoc()) {
    ?>
                                    <option value='<?php echo $l['idlangage']; ?>' 
                                            <?php if($l['idlangage']==$l) echo "selected";?>><?php echo $l['nomlangage']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Level: </td>
                            <td>
                                <select name='level' style="width: 90%;" required>
                                    <option value='' disabled >Choose a level</option>
                                    <option value='1' <?php if($n==1) echo "selected";?>>1</option>
                                    <option value='2' <?php if($n==2) echo "selected";?>>2</option>
                                    <option value='3' <?php if($n==3) echo "selected";?>>3</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Question: </td>
                            <td><input type="text" id="q" name="q" size="100" value="<?php echo $q; ?>" required></td>
                        </tr>
                        <tr>
                            <td>True Answer: </td>
                            <td><input type="text" id="t" name="t" size="100" value="<?php echo $at; ?>"  required></td>
                        </tr>
                        <tr>
                            <td>Other Answer: </td>
                            <td><input type="text" id="f1" name="f1" size="100" value="<?php echo $af[0]; ?>"  required></td>
                        </tr>
                        <tr>
                            <td>Other Answer: </td>
                            <td><input type="text" id="f2" name="f2" size="100" value="<?php echo $af[1]; ?>"  required></td>
                        </tr>
                        <tr>
                            <td>Other Answer: </td>
                            <td><input type="text" id="f3" name="f3" size="100" value="<?php if(count($af)>2) echo $af[2]; ?>" ></td>
                        </tr>
                        <tr>
                            <td>Other Answer: </td>
                            <td><input type="text" id="f4" name="f4" size="100" value="<?php if(count($af)>3) echo $af[3]; ?>" ></td>
                        </tr>
                    </table>
                    <input type="Submit" value="Update" style="margin-left: 50%;">
                </form>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="layout/styles/layout.css">
    </body>
</html>

