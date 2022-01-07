<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Sessions.php"); ?>

<?php 
    function Redirect_to($New_Location) {
        header("Location:".$New_Location);

        exit;
    };


    function Login_Attempt($UserName,$Password) {
        global  $ConnectingDB;
        $sql = "SELECT * FROM admin_panel WHERE username=:userName AND password=:passWord LIMIT 1";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':userName', $UserName);
        $stmt->bindValue(':passWord', $Password);
        $stmt->execute();
        $Result = $stmt->rowcount();
          if($Result==1) {
            return $Found_Account=$stmt->fetch();
          }else {
              return null;
          }
    }
  
    function Confirm_Login() {
      if(isset($_SESSION["UserId"])) {
          return true;
      }else {
          $_SESSION["ErrorMessage"]="Login Required !";
              Redirect_to("logineu.php");
      }
  }


  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}




