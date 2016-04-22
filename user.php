<div id="login">

<?php
require_once('config.php');
/**
* This page will display all transactions in the checkbook
* test
* Details about this page can go here...
*
* @author Donovan Goldston
*/
session_start();

if(!$_SESSION['user_role'] == 'user')
{
    header('location:login.php');
}
$page_title = "User's recipes";

require_once("includes/header.inc.php");
echo("hello: ");
echo $_SESSION['user_display_name'];
echo'<br>';
echo <<<HTML
	<a href="new_recipe.php">add new recipe</a>
HTML;
require_once("includes/custom_recipe_list.php");

?>
</div>
<?php
require_once("includes/footer.inc.php");

?>
