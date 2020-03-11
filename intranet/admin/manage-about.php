
<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

 require 'db/config.php';

$IAboutID=1;

$Queryer ="SELECT * FROM i_about WHERE IAboutID='$IAboutID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();

if(isset($_POST['update']))
{


$IAHome=mysqli_real_escape_string($conn,$_POST['habout']);
$IFB=mysqli_real_escape_string($conn,$_POST['afb']);
$IInsta=mysqli_real_escape_string($conn,$_POST['ainsta']);
$ILinkedIn=mysqli_real_escape_string($conn,$_POST['alinkedin']);
$ITwitter=mysqli_real_escape_string($conn,$_POST['atwitter']);
$IYoutube=mysqli_real_escape_string($conn,$_POST['ayoutube']);



$Query="UPDATE i_about SET IAHome='$IAHome', IFB='$IFB', ILinkedIn='$ILinkedIn', ITwitter='$ITwitter', IInsta='$IInsta', IYoutube='$IYoutube' WHERE IAboutID='$IAboutID'";

if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-about.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}



$conn->close();

};

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Internal | About</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>

<?php include 'partials/sidebar.php'?>

      <div class="main-content">

        <section class="section">
          <div class="section-header">
            <h1>About</h1>
          </div>

              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit About</h4>
                  </div>


                  <form method="POST"  enctype="multipart/form-data">
                  <div class="card-body">


                  	<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About (Home Page)</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="habout" rows="100" required><?php echo $Rower['IAHome'];?></textarea>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook (Url)</label>
                      <div class="col-sm-12 col-md-7"> 
                        <input type="text" name="afb" class="form-control" value="<?php echo $Rower['IFB'];?>" required>
                      </div>
                    </div>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram (Url)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="ainsta" class="form-control" value="<?php echo $Rower['IInsta'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Linked In (Url)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="alinkedin" class="form-control" value="<?php echo $Rower['ILinkedIn'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Twitter (Url)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="atwitter" class="form-control" value="<?php echo $Rower['ITwitter'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube (Url)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="ayoutube" class="form-control" value="<?php echo $Rower['IYoutube'];?>" required>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>

        </section>

      </div>


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
