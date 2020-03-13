<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

require 'db/config.php';

$ICategoryID=$_GET['c-id'];

$Queryer ="SELECT * FROM i_category WHERE ICategoryID='$ICategoryID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();




if(isset($_POST['update']))
{

$ICName=mysqli_real_escape_string($conn,$_POST['cname']);
$ICType=mysqli_real_escape_string($conn,$_POST['cptype']);


if (!file_exists($_FILES['cimage']['tmp_name']) || !is_uploaded_file($_FILES['cimage']['tmp_name'])) 
{


$Query="UPDATE i_category SET ICName='$ICName', ICType='$ICType' WHERE ICategoryID='$ICategoryID'";


if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-category.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}

}
else
{


$target_dir = "../uploads/category-image/"; //directory details

$imageFileType = pathinfo($_FILES["cimage"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)

$SupportedImage = array('gif', 'jpg', 'jpeg','png');

if (in_array($imageFileType, $SupportedImage)) {


$target=$target_dir.time().'.'.$imageFileType;
$target_file = time().'.'.$imageFileType; //full path

if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $target)) {

$Query="UPDATE i_category SET ICName='$ICName', ICImage='$target_file', ICType='$ICType' WHERE ICategoryID='$ICategoryID'";


if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-category.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}

}

else
{

echo "<script language='javascript'>alert('Upload Error')</script>";

}

}

else
{

echo "<script language='javascript'>alert('Unsupported File Type')</script>";

}

}


$conn->close();

};

?>



<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Internal | Banner</title>

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
            <h1>Category</h1>
          </div>

              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Category</h4>
                  </div>


                  <form method="POST"  enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cname" class="form-control" value="<?php echo $Rower['ICName'];?>" required>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="cptype">

                          <?php if($Rower['ICType']=='Photo')
                          {
                          ?>

                          <option value="Photo">Photo</option>
                          <option value="Video">Video</option>
                          <option value="Both">Both</option>
                          
                          <?php
                          }
                          elseif($Rower['ICType']=='Video')
                          { ?>

                          <option value="Video">Video</option>
                          <option value="Photo">Photo</option>
                          <option value="Both">Both</option>

                          <?php } 
                          else
                          { ?>


                          <option value="Both">Both</option>
                          <option value="Photo">Photo</option>
                          <option value="Video">Video</option>  

                          <?php 
                          } ?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      
                      <div class="col-sm-12 col-md-7">
                        <img src="../uploads/category-image/<?php echo $Rower['ICImage']; ?>" width="200">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Update Image (Size: 600 * 600 Px)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" name="cimage" class="form-control">
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
