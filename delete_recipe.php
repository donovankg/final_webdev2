<?php 
session_start();

if(!$_SESSION['user_role'] == 'user')
{
    header('location:login.php');
}
//echo($_GET['recipe_id'] . '<br>');


?>





<form method="POST">


    <input type="submit" name ="btnSubmit"value="submit">

</form>


<?php
//echo('add a hide div here for the user page');

If(isset($_POST['btnSubmit'])){


    header('Location: user.php');

}



?>