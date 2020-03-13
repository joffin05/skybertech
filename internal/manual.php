<?php 

require 'admin/db/config.php';


$Query_manual ="SELECT * FROM i_manual ORDER BY IMNLSortorder ASC";
$Result_manual = $conn->query($Query_manual);


include 'header.php';?>
    <!-- Start Breadcrumb 
    ============================================= -->

    <!-- End Breadcrumb --><br>
<section class="qp-area default-padding ">
    <div class="container">
    




  <div class="row">

    <div class="col-xs-12">
      <center><h2>User Manual</h2></center>
<table id="example" class="table table-striped table-bordered table-sm display text-center" cellspacing="0" width="100%">
  <thead>
    <tr id="tophead">
      <th class="num">#</th>
      <th>Title</th>
      <th>View/Download</th>
    </tr>
  </thead>
  <tbody>
    
  <?php while($Row_manual = $Result_manual->fetch_assoc())
  {
  ?>   
    <tr>
      <td><?php echo $Row_manual['IMNLSortorder']; ?></td>
      <td><?php echo $Row_manual['IMNLName']; ?></td>
      <td><a href="uploads/manual-pdf/<?php echo $Row_manual['IMNLPDF']; ?>" class="download" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> View / Download</a></td>
    </tr>

  <?php }; ?> 
  </tbody>
</table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</section>


<?php include 'footer.php';?>