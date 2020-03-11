<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

require 'db/config.php';


$IKeyPersonID=$_GET['k-id'];

$Queryer ="SELECT i_keyperson.*, i_keypercategory.* FROM i_keyperson INNER JOIN i_keypercategory ON i_keyperson.IKeyCategory=i_keypercategory.IKeyCatID WHERE i_keyperson.IKeyPersonID='$IKeyPersonID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();

$CurntcatID=$Rower['IKeyCategory'];
$Old_sort=$Rower['IKeySortOrder'];

$Query_C ="SELECT * FROM i_keypercategory WHERE IKeyCatID!='$CurntcatID' ORDER BY IKeyCatID DESC";
$Result_C = $conn->query($Query_C);


if(isset($_POST['update']))
{


$IKeyCategory=mysqli_real_escape_string($conn,$_POST['kpcname']);
$IkeyPName=mysqli_real_escape_string($conn,$_POST['kpname']);
$IkeyDesignation=mysqli_real_escape_string($conn,$_POST['kpdesignation']);
$IKeyPhone=mysqli_real_escape_string($conn,$_POST['kpphone']);
$IkeyEmail=mysqli_real_escape_string($conn,$_POST['kpemail']);
$IKeyListing=mysqli_real_escape_string($conn,$_POST['kplisting']);
$IKeyDescription=mysqli_real_escape_string($conn,$_POST['kpdescription']);
$SortOrder=mysqli_real_escape_string($conn,$_POST['sortorder']);


if($SortOrder==$Old_sort)
{

if (!file_exists($_FILES['kpimage']['tmp_name']) || !is_uploaded_file($_FILES['kpimage']['tmp_name'])) 
{



$Query="UPDATE i_keyperson SET IKeyCategory='$IKeyCategory', IkeyPName='$IkeyPName', IkeyDesignation='$IkeyDesignation', IKeyPhone='$IKeyPhone', IkeyEmail='$IkeyEmail', IKeyDescription='$IKeyDescription', IKeyListing='$IKeyListing' WHERE IKeyPersonID='$IKeyPersonID'";

if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-keyperson.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}


}
else
{

$target_dir = "../uploads/keyperson-image/"; //directory details


$imageFileType = pathinfo($_FILES["kpimage"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)

$SupportedImage = array('gif', 'jpg', 'jpeg','png');

if (in_array($imageFileType, $SupportedImage)) {


$target=$target_dir.time().'.'.$imageFileType;
$target_file = time().'.'.$imageFileType; //full path

if (move_uploaded_file($_FILES["kpimage"]["tmp_name"], $target)) {


$Query="UPDATE i_keyperson SET IKeyCategory='$IKeyCategory', IkeyPName='$IkeyPName', IkeyDesignation='$IkeyDesignation', IKeyphoto='$target_file', IKeyPhone='$IKeyPhone', IkeyEmail='$IkeyEmail', IKeyDescription='$IKeyDescription', IKeyListing='$IKeyListing' WHERE IKeyPersonID='$IKeyPersonID'";

if ($conn->query($Query) === TRUE) {

echo "<script> alert('Success');window.location.href = 'manage-keyperson.php';</script>";

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

}

else
{

// Sort

$GetOld ="SELECT * FROM i_keyperson WHERE IKeySortOrder='$SortOrder'";
$Resulter_old = $conn->query($GetOld);
$Rower_old = $Resulter_old->fetch_assoc();
$Last_sort_id=$Rower_old['IKeyPersonID'];  


if (!file_exists($_FILES['kpimage']['tmp_name']) || !is_uploaded_file($_FILES['kpimage']['tmp_name'])) 
{



$Query="UPDATE i_keyperson SET IKeyCategory='$IKeyCategory', IkeyPName='$IkeyPName', IkeyDesignation='$IkeyDesignation', IKeyPhone='$IKeyPhone', IkeyEmail='$IkeyEmail', IKeyDescription='$IKeyDescription', IKeyListing='$IKeyListing', IKeySortOrder='$SortOrder' WHERE IKeyPersonID='$IKeyPersonID'";

if ($conn->query($Query) === TRUE) {

$UPDATE_SORT="UPDATE i_keyperson SET IKeySortOrder='$Old_sort' WHERE IKeyPersonID='$Last_sort_id'";
$conn->query($UPDATE_SORT);   

echo "<script> alert('Success');window.location.href = 'manage-keyperson.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}


}
else
{

$target_dir = "../uploads/keyperson-image/"; //directory details


$imageFileType = pathinfo($_FILES["kpimage"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)

$SupportedImage = array('gif', 'jpg', 'jpeg','png');

if (in_array($imageFileType, $SupportedImage)) {


$target=$target_dir.time().'.'.$imageFileType;
$target_file = time().'.'.$imageFileType; //full path

if (move_uploaded_file($_FILES["kpimage"]["tmp_name"], $target)) {


$Query="UPDATE i_keyperson SET IKeyCategory='$IKeyCategory', IkeyPName='$IkeyPName', IkeyDesignation='$IkeyDesignation', IKeyphoto='$target_file', IKeyPhone='$IKeyPhone', IkeyEmail='$IkeyEmail', IKeyDescription='$IKeyDescription', IKeyListing='$IKeyListing', IKeySortOrder='$SortOrder' WHERE IKeyPersonID='$IKeyPersonID'";

if ($conn->query($Query) === TRUE) {

$UPDATE_SORT="UPDATE i_keyperson SET IKeySortOrder='$Old_sort' WHERE IKeyPersonID='$Last_sort_id'";
$conn->query($UPDATE_SORT);   
echo "<script> alert('Success');window.location.href = 'manage-keyperson.php';</script>";

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









}

};

$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Internal | Key Person</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">




  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">

</head>

<body>

<?php include 'partials/sidebar.php'?>

      <div class="main-content">

        <section class="section">
          <div class="section-header">
            <h1>Key Person</h1>
          </div>
          </section>


              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Key Person</h4>
                  </div>
                  
                  



                  <form method="POST"  enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Key Person Name</label>
                      <div class="col-sm-12 col-md-8">
                        <input type="text" name="kpname" class="form-control"  value="<?php echo $Rower['IkeyPName'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="kpcname" required>
                          <option value="<?php echo $CurntcatID ?>"><?php echo $Rower['IKeyCatName']; ?></option>

                          <?php while($Row_C = $Result_C->fetch_assoc())
                          {
                          ?>

                          <option value="<?php echo $Row_C['IKeyCatID']; ?>"><?php echo $Row_C['IKeyCatName']; ?></option>

                          <?php }; ?> 
                          

                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Designation</label>
                      <div class="col-sm-12 col-md-8">
                        <input type="text" name="kpdesignation" class="form-control"  value="<?php echo $Rower['IkeyDesignation'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                      <div class="col-sm-12 col-md-8">
                        <input type="number" name="kpphone" class="form-control"  value="<?php echo $Rower['IKeyPhone'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-8">
                        <input type="email" name="kpemail" class="form-control"  value="<?php echo $Rower['IkeyEmail'];?>" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">


                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>     
                    <div class="col-sm-12 col-md-7">
                    <img src="../uploads/keyperson-image/<?php echo $Rower['IKeyphoto']; ?>" width="200">
                    </div>
                    </div>



                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image (Size: 400 * 400 Px)</label>
                      <div class="col-sm-12 col-md-8">
                        <input type="file" name="kpimage" class="form-control">
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-8">
                        <textarea id ="summernote" name="kpdescription"><?php echo $Rower['IKeyDescription'];?></textarea><br>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Top Listing</label>
                      <div class="col-sm-12 col-md-8">


                        <?php if($Rower['IKeyListing']=='True')
                        { ?>
        
                        <label class="radio-inline">
                        <input type="radio" value="True" name="kplisting" checked> True
                        </label> &nbsp&nbsp
                        <label class="radio-inline">
                        <input type="radio" value="False" name="kplisting"> False
                        </label>
                  
        

                        <?php
                        } 
                        else
                        { ?>
                    
                        <label class="radio-inline">
                        <input type="radio" value="True" name="kplisting"> True
                        </label> &nbsp&nbsp
                        <label class="radio-inline">
                        <input type="radio" value="False" name="kplisting" checked> False
                        </label>

                       <?php } ?>

                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sort Order</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="sortorder" class="form-control" value="<?php echo $Old_sort;?>" required>
                      </div>
                    </div>


                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-8">
                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                      </div>
                    </div>

                  </form>
                  </div>
                </div>
              </div>
            </div>



      </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>


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
