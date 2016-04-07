<?php
/**
* This page will display all transactions in the checkbook
*
* Details about this page can go here...
*
* @author Niall Kader
*/
session_start();
// now to check if variable is true

if(!$_SESSION['user_role'] == 'admin')

{
    header('location:login.php');
}

require_once('includes/config.inc.php');
require_once("includes/models/Transaction.php"); 
require_once('includes/dataaccess/TransactionDataAccess.php');

// get the transactions from the db
//$da = new TransactionDataAccess($link);
//$transactions = $da->get_all_transactions();

$page_title = "Transaction List";

require_once("includes/header.inc.php");
echo("<br><br><br> admin page");
echo $_SESSION['user_display_name'];
echo("<br><br><br> this is from the admin-page.php file");
?>

<?php
require_once("includes/footer.inc.php");

?>