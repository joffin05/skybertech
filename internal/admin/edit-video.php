<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

require 'db/config.php';

$IVideoID=$_GET['v-id'];

$Queryer ="SELECT i_videogallery.*, i_category.* FROM i_videogallery INNER JOIN i_category ON i_videogallery.IVCat=i_category.ICategoryID WHERE i_videogallery.IVideoID='$IVideoID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();
$Cat_ID=$Rower['IVCat'];

$Query_C ="SELECT * FROM i_category WHERE ICategoryID!='$Cat_ID' ORDER BY ICategoryID DESC";
$Result_C = $conn->query($Query_C);

if(isset($_POST['update']))
{


$IVCat=mysqli_real_escape_string($conn,$_POST['vcname']);
$IVTitle=mysqli_real_escape_string($conn,$_POST['vtitle']);
$IVUrl=mysqli_real_escape_string($conn,$_POST['vurl']);


$Query="UPDATE i_videogallery SET IVCat='$IVCat', IVTitle='$IVTitle', IVUrl='$IVUrl' WHERE IVideoID='$IVideoID'";

if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-videogallery.php';</script>";

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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Internal | Video Gallery</title>

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
            <h1>Video Gallery</h1>
          </div>

              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View/Edit Video Gallery</h4>
                  </div>


                  <div class="card-body">

                  <form method="POST"  enctype="multipart/form-data">


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vcname">
                          <option value="<?php echo $Cat_ID; ?>"><?php echo $Rower['ICName']; ?></option>


                          <?php while($Row_C = $Result_C->fetch_assoc())
                          {
                          ?>

                          <option value="<?php echo $Row_C['ICategoryID']; ?>"><?php echo $Row_C['ICName']; ?></option>

                          <?php }; ?> 
                          

                        </select>
                      </div>
                    </div>

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vtitle" class="form-control" value="<?php echo $Rower['IVTitle']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Code</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vurl" class="form-control" value="<?php echo $Rower['IVUrl']; ?>" required>
                      </div>
                    </div>

                    

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                      </div>
                    </div>
                  </div>
                </form>

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
