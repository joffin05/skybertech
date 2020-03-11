<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };


require 'db/config.php';

$IPhotoID=$_GET['p-id'];

$Queryer ="SELECT i_photogallery.*, i_category.* FROM i_photogallery INNER JOIN i_category ON i_photogallery.IPCat=i_category.ICategoryID WHERE i_photogallery.IPhotoID='$IPhotoID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();
$Cat_ID=$Rower['IPCat'];

$Query_C ="SELECT * FROM i_category WHERE ICategoryID!='$Cat_ID' ORDER BY ICategoryID DESC";
$Result_C = $conn->query($Query_C);


if(isset($_POST['update']))
{

$IPCat=mysqli_real_escape_string($conn,$_POST['pcname']);
$IPTitle=mysqli_real_escape_string($conn,$_POST['ptitle']);

$IPDescription=mysqli_real_escape_string($conn,$_POST['pdescription']);

if (!file_exists($_FILES['pimage']['tmp_name']) || !is_uploaded_file($_FILES['pimage']['tmp_name'])) 
{


$Query="UPDATE i_photogallery SET IPCat='$IPCat', IPTitle='$IPTitle', IPDescription='$IPDescription' WHERE IPhotoID='$IPhotoID'";

if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-photogallery.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}

}
else
{



$target_dir = "../uploads/photo-gallery/"; //directory details


$imageFileType = pathinfo($_FILES["pimage"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)

$SupportedImage = array('gif', 'jpg', 'jpeg','png');

if (in_array($imageFileType, $SupportedImage)) {


$target=$target_dir.time().'.'.$imageFileType;
$target_file = time().'.'.$imageFileType; //full path

if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $target)) {

$Query="UPDATE i_photogallery SET IPCat='$IPCat', IPTitle='$IPTitle', IPImage='$target_file', IPDescription='$IPDescription' WHERE IPhotoID='$IPhotoID'";

if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-photogallery.php';</script>";

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
  <title>Internal | Photo Gallery</title>

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
            <h1>Photo Gallery</h1>
          </div>

              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View/Edit Photo Gallery</h4>
                  </div>


                  <div class="card-body">

                  <form method="POST"  enctype="multipart/form-data">


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="pcname">
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
                        <input type="text" name="ptitle" class="form-control" value="<?php echo $Rower['IPTitle']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="pdescription" rows="100" required><?php echo $Rower['IPDescription']; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">


                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                      
                      <div class="col-sm-12 col-md-7">
                        <img src="../uploads/photo-gallery/<?php echo $Rower['IPImage']; ?>" width="200">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Update Image (Size: 600 * 600 Px)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" name="pimage" class="form-control">
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
