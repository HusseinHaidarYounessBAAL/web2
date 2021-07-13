<?php
session_start();
include '../Queries/Connect.php';

$sql = $mysqli->query("SELECT MAX(note),niveau FROM test WHERE idlangage={$_GET['lang']} AND idabonne={$_SESSION['WebQuizAbonne']} AND note>3 GROUP BY niveau ORDER BY niveau ASC");
if ($sql->num_rows < 1) {
    ?>
    <option value='' disabled selected>Choose a level</option>
    <option value='1'>1</option>
    <option value='2' disabled>2</option>
    <option value='3' disabled>3</option>
    <?php
} else {
    if ($sql->num_rows < 2) {
        ?>
        <option value='' disabled selected>Choose a level</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3' disabled>3</option>
        <?php
    } else {
        ?>
        <option value='' disabled selected>Choose a level</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <?php
    }
}
?>
