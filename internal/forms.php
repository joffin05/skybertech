<?php 

require 'admin/db/config.php';


$Query_form ="SELECT * FROM i_forms ORDER BY IFSortOrder ASC";
$Result_form = $conn->query($Query_form);


include 'header.php';?>
    <!-- Start Breadcrumb 
    ============================================= -->

    <!-- End Breadcrumb --><br>
<section class="qp-area default-padding ">
    <div class="container">
    




  <div class="row">

    <div class="col-xs-12">
      <center><h2>Forms</h2></center>
<table id="example" class="table table-striped table-bordered table-sm display text-center" cellspacing="0" width="100%">
  <thead>
    <tr id="tophead">
      <th class="num">#</th>
      <th>Title</th>
      <th>View/Download</th>
    </tr>
  </thead>
  <tbody>
    
  <?php while($Row_form = $Result_form->fetch_assoc())
  {
  ?>   
    <tr>
      <td><?php echo $Row_form['IFSortOrder']; ?></td>
      <td><?php echo $Row_form['IFTitle']; ?></td>
      <td><a href="uploads/form-pdf/<?php echo $Row_form['IFPDF']; ?>" class="download" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> View / Download</a></td>
    </tr>

  <?php }; ?> 
  </tbody>
</table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</section>


<?php include 'footer.php';?>