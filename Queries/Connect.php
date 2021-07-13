<?php
//$mysqli = new mysqli("localhost", "eeb", "BPxK6cnVibm~?", "lost_backups");
$mysqli = new mysqli("localhost", "root", "", "web_quiz");

$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>