<?php

session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

require 'db/config.php';

$IMemoID=$_GET['m-id'];

$Queryer ="SELECT * FROM i_memo WHERE IMemoID='$IMemoID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();
$Old_sort=$Rower['IMSortOrder'];
$Old_Type=$Rower['IMType'];


if(isset($_POST['update']))
{

$IMTitle=mysqli_real_escape_string($conn,$_POST['cptitle']);
$IMType=mysqli_real_escape_string($conn,$_POST['cptype']);
$IMDescription=mysqli_real_escape_string($conn,$_POST['cpdescription']);
$SortOrder=mysqli_real_escape_string($conn,$_POST['sortorder']);


if($Old_Type==$IMType)
{


$Query="UPDATE i_memo SET IMTitle='$IMTitle', IMType='$IMType', IMDescription='$IMDescription', IMSortOrder='$SortOrder' WHERE IMemoID='$IMemoID'";

$GetOld ="SELECT * FROM i_memo WHERE IMSortOrder='$SortOrder' AND IMType='$IMType'";

$Resulter_old = $conn->query($GetOld);
$Rower_old = $Resulter_old->fetch_assoc();
$Last_sort_id=$Rower_old['IMemoID'];


if ($conn->query($Query) === TRUE) {

$UPDATE_SORT="UPDATE i_memo SET IMSortOrder='$Old_sort' WHERE IMemoID='$Last_sort_id'";
$conn->query($UPDATE_SORT);   

echo "<script> alert('Success');window.location.href = 'manage-memo.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}



} 
else
{


$Query="UPDATE i_memo SET IMTitle='$IMTitle', IMType='$IMType', IMDescription='$IMDescription', IMSortOrder='$SortOrder' WHERE IMemoID='$IMemoID'";

$GetOld ="SELECT * FROM i_memo WHERE IMSortOrder='$SortOrder' AND IMType='$IMType'";

$Resulter_old = $conn->query($GetOld);
$Rower_old = $Resulter_old->fetch_assoc();
$Last_sort_id=$Rower_old['IMemoID'];

$GetMax ="SELECT (SELECT MAX(IMSortOrder) FROM i_memo WHERE IMType='Circulars') AS CirularMaxSort, (SELECT MAX(IMSortOrder) FROM i_memo WHERE IMType='Policies') AS PolicyMaxSort";
$Resulter_max = $conn->query($GetMax);
$Rower_max = $Resulter_max->fetch_assoc();

$Max_sort_circular=$Rower_max['CirularMaxSort']+1;
$Max_sort_policy=$Rower_max['PolicyMaxSort']+1;


if($IMType=='Circulars')
{
  $NIMSortOrder=$Max_sort_circular;
}
else
{
  $NIMSortOrder=$Max_sort_policy;
}


if ($conn->query($Query) === TRUE) {

$UPDATE_SORT="UPDATE i_memo SET IMSortOrder='$NIMSortOrder' WHERE IMemoID='$Last_sort_id'";
$conn->query($UPDATE_SORT);   

echo "<script> alert('Success');window.location.href = 'manage-memo.php';</script>";

}

else
{

echo "<script language='javascript'>alert('Error Try again')</script>";

}




}






$conn->close();

};


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
                    <h4>Edit Circulars & Policies</h4>
                  </div>

                  <div class="card-body">

                   <form method="POST"  enctype="multipart/form-data">

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="cptype">

                          <?php if($Rower['IMType']=='Circulars')
                          {
                          ?>

                          <option value="Circulars">Circulars</option>
                          <option value="Policies">Policies</option>
                          
                          <?php
                          }
                          else
                          { ?>

                          <option value="Policies">Policies</option>
                          <option value="Circulars">Circulars</option> 

                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cptitle" class="form-control" value="<?php echo $Rower['IMTitle'];?>" required>
                      </div>
                    </div>




                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="cpdescription" rows="100" required><?php echo $Rower['IMDescription'];?></textarea>
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
