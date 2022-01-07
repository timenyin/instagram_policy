<?php
if(isset($_GET["id"])){
  $SearchQueryParameter = $_GET["id"];
  global $ConnectingDB;
  $sql = "DELETE FROM password WHERE id='$SearchQueryParameter'";
  $Execute = $ConnectingDB->query($sql);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="Password  Deleted Successfully ! ";
    Redirect_to("dashboard.php");
    // code...
  }else {
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("dashboard.php");
  }
}
?>