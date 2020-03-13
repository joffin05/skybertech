<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

 require 'db/config.php';


$GetMax ="SELECT (SELECT MAX(IMSortOrder) FROM i_memo WHERE IMType='Circulars') AS CirularMaxSort, (SELECT MAX(IMSortOrder) FROM i_memo WHERE IMType='Policies') AS PolicyMaxSort";
$Resulter_max = $conn->query($GetMax);
$Rower_max = $Resulter_max->fetch_assoc();

$Max_sort_circular=$Rower_max['CirularMaxSort']+1;
$Max_sort_policy=$Rower_max['PolicyMaxSort']+1;



if(isset($_POST['submit']))
{


$IMTitle=mysqli_real_escape_string($conn,$_POST['cptitle']);
$IMType=mysqli_real_escape_string($conn,$_POST['cptype']);
$IMDescription=mysqli_real_escape_string($conn,$_POST['cpdescription']);


if($IMType=='Circulars')
{
  $IMSortOrder=$Max_sort_circular;
}
else
{
  $IMSortOrder=$Max_sort_policy;
}



$Query="INSERT INTO i_memo(IMTitle, IMType, IMDescription, IMSortOrder) VALUES('$IMTitle', '$IMType', '$IMDescription', '$IMSortOrder')";

if ($conn->query($Query) === TRUE) {

$memo_id = $conn->insert_id;  

$extension=array("jpeg","jpg","png","gif");

$target_dir = "../uploads/memo-image/";



$i=1;


foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {



$file_name=$_FILES["files"]["name"][$key];

$file_tmp=$_FILES["files"]["tmp_name"][$key];


$ext=pathinfo($file_name,PATHINFO_EXTENSION);

if(in_array($ext,$extension)) {

$uq = $memo_id.$i;

$target=$target_dir.$uq.time().'.'.$ext;
$target_file = $uq.time().'.'.$ext; //full path


if (move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$target))
{



$Query1="INSERT INTO imemo_images(IMemoMID, MMImages) VALUES('$memo_id', '$target_file')";

$conn->query($Query1); 



}

}
else
{

echo "<script language='javascript'>alert('Unsupported File Type')</script>";

}

$i=$i+1;

}  

echo "<script> alert('Success');window.location.href = 'manage-memo.php';</script>";

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
  <title>Internal | Circulars & Policies</title>

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
            <h1>Circulars & Policies</h1>
          </div>

              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Circulars & Policies</h4>
                  </div>

                  <div class="card-body">

                   <form method="POST"  enctype="multipart/form-data">

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="cptype" required>
                          <option value="">----Select----</option>
                          <option value="Circulars">Circulars</option>
                          <option value="Policies">Policies</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cptitle" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="cpdescription" rows="100" required></textarea>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image (Size: 600 * 900 Px)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" name="files[]" class="form-control" required multiple>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
