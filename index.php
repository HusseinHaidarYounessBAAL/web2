<?php
session_start();
if (isset($_SESSION['WebQuizAdmin']))
    header("location:page2.php");
else
if (isset($_SESSION['WebQuizAbonne']))
    header("location:page4.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Web Quiz</title>
        <style>
            button {
                width: 50%;;
                border-radius: 20%;
                padding: 7%;
                margin: 5%;
                margin-left: 25%;
                background-color: #f9f9f9;
                border-color: #979797;
            }
            button:hover {
                background-color: #f0f0f0;
            }

        </style>
        <link href="layout/styles/layout1.css" rel="stylesheet" type="text/css" media="all">
        <style>

            table, tr, td, th { border : none;}
        </style>
    </head>
	
    <body>
	 <div>
        <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
            $_SESSION['error'] = "";
            ?>
            <div>
                Error, Please check user name and password!
            </div>
            <?php
        }
        ?>
        <div id="typeDiv" style=" width:100%;margin-top: 2%; text-align: center; height ">
            <!--<h1>Choose The user Type</h1>-->
					<div> <img src="css/pic1.png" style="width:60%;height:25%;     margin-bottom: 1%;     border-radius: 50px;"> </div>
					

					<div style="display: inline-block;"><button style=" width:auto; padding: revert; height :30px" value="admin" onclick="login('Admin') "> Admin </button></div>
				
				
				<div style="display: inline-block;">	<button style=" width:auto; padding: revert; height :30px" value="subscriber" onclick="login('Subscriber')"> Subscriber </button></div>
			
        </div>

        <div class="wrapper row4" style="margin-top: 10%;">
            <div class="rounded"align="center">
                <div id="loginDiv" style="display: none;" class="mt-3">

                    <form action="Queries/login.php" method="post">
                        <center><h1 id="TypeName"></h1></center>
                        <table>
                            <tr><th>User Name:</th>
                                <td><input type="text" name="user" id="user" placeholder="User Name" required
                                           class="form-control" type="text" style="width: 80%; float: right;"/>
                                </td>
                            </tr>
                            <tr><th>Password: </th>
                                <td><input type="password" name="pass" id="pass" placeholder="Password" required
                                           class="form-control" type="text" style="width: 80%; float:right;"/>
                                </td>
                            </tr>
                            <tr><td colspan="2">
                                    <input type="hidden" name="type" id="type"/>
                                    <input type="submit" value="LOGIN"  style="margin-left: auto; width: 20%; color: black;height: 30px;" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function login(type) {

                document.getElementById('typeDiv').style.display = "none";
                document.getElementById('loginDiv').style.display = "block";
                document.getElementById('type').value = type;
                document.getElementById("TypeName").innerHTML = type;


            }
        </script>
			 </div>
    </body>
</html>
