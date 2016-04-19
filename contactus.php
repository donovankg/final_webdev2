<?php
//contact us.
//input boxes for name, email, and comment / question
 include 'config.php';
$page_title = "Login Page";
//require_once('includes/Utils.php');
require_once('includes/dataaccess/loginDataAccess.php');
require_once("includes/header.inc.php");


?>
<form method="POST">
    Email Adress:<br>
    <input type="text" name="name"><br>
    Password:<br>
    <input type="text" name="email"><br>
    <textarea row ="20" cols ="50" id = "txtarea_comments"name="textArea_comments"></textarea><br>
    <input type="submit">


</form>
<a href="javascript:history.back()">return to previous page</a>

<?php
require_once("includes/footer.inc.php");

?>