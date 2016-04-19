<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo($page_title)?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <script src="<?php echo($root_dir);?>js/vendor/jquery-2.2.0.min.js"></script>
</head>
<body>

<?php
require_once('config.php');
$css = file_get_contents('CSS/style.css');
echo $css;
//apply leader board if $_SESSION = false

if(!isset($_SESSION['user_role'])){
  ?>
  <div id = "leaderboard">
<img src="images/leader.jpg" class="stretch" alt="" />
</div>
<br>
<?php
}
?>
<!--apply med rectangle if user_role = admin -->

<?php
//apply leader board if $_SESSION = false
  if(isset($_SESSION["user_role"])&&($_SESSION["user_role"]=='admin')){
?>
<div id = "med_rectangle">med rectangle here</div>
<?php
  }
?>

<?php
//apply leader board if $_SESSION = false
  if(isset($_SESSION["user_role"])&&($_SESSION["user_role"]=='user')){
?>
<div id = "wide_skyscraper">wide skyscraper here</div>
<?php
  }
?>

  <div id='login'>
  <h1>Recipes Page</h1>