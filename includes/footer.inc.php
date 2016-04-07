        <div id="footer">
            footer </div><br>
			
<?php
if (session_status() == PHP_SESSION_ACTIVE) {
//if(isset($_SERVER["user_role"])){
    //echo('its on');
			echo"<a href='logout.php'>Logout</a>";
}else{
	//echo('its not on');
}
?>




        </div>
    </body>
</html>