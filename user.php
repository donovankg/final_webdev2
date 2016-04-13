<div id="login">

<?php
/**
* This page will display all transactions in the checkbook
* test
* Details about this page can go here...
*
* @author Niall Kader
*/require_once('includes/config.inc.php');
require_once("includes/models/Transaction.php"); 
require_once('includes/dataaccess/TransactionDataAccess.php');
include('includes/dataaccess/UserDataAccess.php');


session_start();
// now to check if variable is true

if(!$_SESSION['user_role'] == 'user')
{
    header('location:login.php');
}

// get the transactions from the db
//$da = new TransactionDataAccess($link);
//$transactions = $da->get_all_transactions();

$page_title = "User's recipes";

require_once("includes/header.inc.php");
echo("hello: ");
echo $_SESSION['user_display_name'];

//$row=mysqli_fetch_assoc($result);
//echo($row['user_display_name']);
//echo('');
//$row=mysqli_fetch_assoc($result);
//printf ($row["user_display_name"]);
require_once("includes/custom_recipe_list.php");

?>
</div>
<?php
require_once("includes/footer.inc.php");

?>
