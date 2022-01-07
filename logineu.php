<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>

<?php
if(isset($_POST["submit"])) {
    $UserName = $_POST["Username"];
    $Password = $_POST["Password"];
    if(empty($UserName) || empty($Password)) {
        $_SESSION["ErrorMessage"]= "All fields must be filled out";
        Redirect_to("logineu.php");
    
    }else {
    $Found_Account = Login_Attempt($UserName,$Password);
    if ($Found_Account) {
     $_SESSION["UserId"]=$Found_Account["id"];
     $_SESSION["UserName"]=$Found_Account["username"];
     $_SESSION["SuccessMessage"]= "Welcome ".$_SESSION["UserName"]."!";
     Redirect_to("dashboard.php");
      
    }else {
        $_SESSION["ErrorMessage"]="Incorrect Username/Password";
        Redirect_to("logineu.php"); 
       }
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- bootstrap css -->
   <link rel="shortcut icon" type="image/png" href="img/instagramsmall.png"/>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <link rel="stylesheet" href="css/back.css">
  <title>Document</title>
</head>


    <!-- body start here --- -->
    <header class="bg-dark text-white py-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-12">
                <h4>
                <i class="fas fa-sign-in-alt text-primary"></i> Login Your Details
                </h4>
            </div>
        </div>
    </div>
    </header>

<body>
   <section>
     <div class="container my-3">
       <div class="row my-4">

        <!-- contain starts Here --- -->
        <div class="container py-2 mb-2">
            <div class="row">
                <div class="col col-12 col-md-6 col-login offset-sm-3">
                <?php
                    echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                    <div class="card bg-dark text-light">
                        <div class="card-header mb-2 bg-info">
                            <h5 class="text-center text-white ">
                            <span class="face_emoji">🌟🌟 </span>
                            Welcome Back! login in
                            <span class="face_emoji">🌟🌟 </span></h5>
                        </div>
                            <div class="card-body mb-2">
                                <form action="logineu.php"  method="post">
                                    <div class="form-group">
                                        <label for="username">
                                            <span class="FieldLogin">
                                                Username
                                            </span>
                                        </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user text-info"></i>
                                            </span>
                                        </div>
                                    <input class="form-control" type="text" name="Username" id="username">
                                    </div>
                                    </div>

                        <!-- ======================================= -->
                        <div class="form-group">
                                        <label for="password">
                                            <span class="FieldLogin">
                                                Password
                                            </span>
                                        </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fas fa-unlock-alt text-info"></i>
                                            </span>
                                        </div>
                                    <input class="form-control" type="password" name="Password" id="password" value="">
                                    </div>
                                    </div>
                                    
                                    <input type="submit" name="submit" class="btn btn-info btn-block" value="Login">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       


       </div>
     </div>
    
   </section>



   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
   integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
         <!--fontawesome kit-->
  <script src="https://kit.fontawesome.com/37e4e6b527.js" crossorigin="anonymous"></script>
</body>
</html>