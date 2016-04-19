     

        <div id="footer">
<?php
if (session_status() == PHP_SESSION_ACTIVE) {
//if(isset($_SERVER["user_role"])){
    //echo('its on');
			echo"<a href='logout.php'>Logout</a>";
			echo "<br>";
}else{
	//echo('its not on');
}
echo"<a href='contactus.php'>Contact Us</a>";

?>

   </div>
        </div>
    </body>
</html>