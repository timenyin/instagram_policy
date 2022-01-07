<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>

<?php
if(isset($_GET["id"])){
  $SearchQueryParameter = $_GET["id"];
  global $ConnectingDB;
  $sql = "DELETE FROM username WHERE id='$SearchQueryParameter'";
  $Execute = $ConnectingDB->query($sql);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="Username Deleted Successfully ! ";
    Redirect_to("dashboard.php");
    // code...
  }else {
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("dashboard.php");
  }
}
?>

