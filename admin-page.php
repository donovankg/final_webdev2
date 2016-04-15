<?php
/**
* This page will display all transactions in the checkbook
*
* Details about this page can go here...
*
* @author Donovan Goldston
*/
session_start();
// now to check if variable is true

if(!$_SESSION['user_role'] == 'admin')

	{
   		 header('location:login.php');
	}
require_once('config.php');
require_once("includes/models/User.php"); 
require_once('includes/dataaccess/UserDataAccess.php');
$da = new UserDataAccess($conn);
$users = $da->get_all_users();


$page_title = "Admin Page";

require_once("includes/header.inc.php");
echo('Hello: ');
echo $_SESSION['user_display_name'];
echo("<br><br>");
?>

<table border="1">
	<thead>
		<th>User Name</th>
		<th>Email address</th>
		<th>User Status</th>
		<th>Active Account</th>
	</thead>
	<tbody> 
<?php
	if(!empty($users)){
		foreach ($users as $u) {
			echo("<tr>");
			echo("<td>" . $u->user_display_name . "</td>");
			echo("<td>" . $u->user_email . "</td>");
			echo("<td>" . $u->user_role . "</td>");
			echo("<td>" . $u->user_active . "</td>");
			echo("</tr>");
		}
	}else{
		echo("<tr><td colspan='4' align='center'>NO USERS</td></tr>");
	}


?>
</tbody>
</table>
<br><br>
<?php
require_once("includes/footer.inc.php");

?>
test