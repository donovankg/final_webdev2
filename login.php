<?php
 include 'config.php';
$page_title = "Login Page";
//require_once("includes/header.inc.php");
//require_once('includes/Utils.php');
//require_once('includes/dataaccess/loginDataAccess.php');
//require_once('includes/dataaccess/TransactionDataAccess.php');
require_once("includes/header.inc.php");
//$Utils = new Utils();

//var_dump($_SERVER);
//DIE();

if($_POST)
{
   
   
    $username=$_POST['username'];
    /*
    if(strpos($username, '@') ==false){
        echo ('this is not a valid email, "@" ia missing <br>');

    }  if
        (strpos($username, '.') ==false){
        echo ('this is not a valid email, "." is missing <br>');
    }
*/


    
    $password=$_POST['password'];
    $sUser=mysqli_real_escape_string($conn,$username);
    $sPass=mysqli_real_escape_string($conn,md5($password));
    // For Security 
    $query="SELECT * From users where user_email='$sUser' and user_password='$sPass' and user_active ='yes'" ;
//

    $result=mysqli_query($conn,$query);

        //echo(md5($password));

    
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        
        
        $row=mysqli_fetch_assoc($result);
        $_SESSION['user_display_name'] = htmlentities($row['user_display_name']);
        $_SESSION["user_role"] = htmlentities($row['user_role']);
        $_SESSION["user_id"] = htmlentities($row['user_id']);
        if($row['user_role']=='admin'){

            header('location:admin-page.php');
            //echo($row['user_display_name']);
        }else{
;
            header('location:user.php');
           // echo($row['user_display_name']);
        }

        printf ($row["user_display_name"]);
        echo('<br>');
        printf($row["user_role"]);
    }else{
        echo "email and or password is incorrect<br>";
      //  echo (mysqli_real_escape_string($conn,$username));
      //  echo "<br>";
      //  echo (mysqli_real_escape_string($conn,md5($password)));
    }


}

?>
<div id="login">
<form method="POST">
    Email Adress:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="password" name="password"><br>
    <input type="submit">

</form>
</div>  



<?php


// check for the query string param
//if(isset($_POST['btnSubmit'])){

	// remember that some HTML controls will not post if the user
	// does not set them, so we may need to use isset()
//	$login->id = $_POST['txtEmail'];
//	$login->date = $_POST['txtPassword'];
	
	
//}


require_once("includes/footer.inc.php");

?>

	
</script>
