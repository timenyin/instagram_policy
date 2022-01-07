<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php 
    Confirm_Login();
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
  <title>Dashboard</title>
</head>


    <!-- body start here --- -->
    <header class="bg-dark text-white py-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-12">
                <h4>
                <i class="fas fa-sign-in-alt text-primary"></i> Manage Admins
                </h4>

                <button class="btn btn-danger float-right"><a href="logout.php" class="text-white">
                   <i class="fas fa-user-times mx-2"></i>Logout</a> 
                </button>
            </div>
        </div>
    </div>
    </header>

<body>
   <section>
     <div class="container my-3">
     <?php
                    echo ErrorMessage();
                    echo SuccessMessage();
                ?>
       <div class="row my-4">
         
      
              <div  class="col col-12 col-md-8 offset-lg-2">
              <table class="table table-striped table-hover">
                <thead class="thead-dark">
          <tr>
            <th>No. </th>
            <th>UserName</th>
            <th>Password</th>
            <th>Datetime</th>
          </tr>
          <?php
                        $SrNo = 0;
                        global $ConnectingDB;
                        $sql = "SELECT * FROM username ORDER BY id desc";
                        $stmt = $ConnectingDB->query($sql);
                        while ($DataRows=$stmt->fetch()) {
                        $UserAdmin  = $DataRows["id"];
                        $ins_name = $DataRows["username"];
                        $ins_Pass = $DataRows["password"]; 
                        $DateTime = $DataRows["datetime"]; 
                        $SrNo++;         
         ?>
      <tbody>
        <tr>
        <td><?php echo htmlentities($SrNo); ?></td>
          <td><?php echo htmlentities($ins_name); ?></td>
          <td><?php echo htmlentities($ins_Pass); ?></td>
          <td><?php echo htmlentities($DateTime); ?></td>

      </tbody>
      <?php } ?>
      </table> 

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