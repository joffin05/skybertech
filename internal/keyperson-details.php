<?php 

require 'admin/db/config.php';

$IKeyPersonID=$_GET['k-id'];

$Queryer ="SELECT i_keyperson.*, i_keypercategory.* FROM i_keyperson INNER JOIN i_keypercategory ON i_keyperson.IKeyCategory=i_keypercategory.IKeyCatID WHERE i_keyperson.IKeyPersonID='$IKeyPersonID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();


include 'header.php';?>

    <section id="event" class="event-area default-padding">
        <div class="container">
            <div class="row">
                <div class="event-items">

                    <!-- Single Item -->
                    <div id="Chapel" class="item vertical col-md-8 col-md-offset-2">
                        
                        <div class="info">
                            
                            
                            
                            <center><img src="uploads/keyperson-image/<?php echo $Rower['IKeyphoto'];?>" style="width:300px"></center><br>
                            <h4>
                             Name: <?php echo $Rower['IkeyPName'];?>
                            </h4>
                            <h4 style="color:red">
                             <?php echo $Rower['IKeyCatName'];?>
                            </h4>
                            <h5>
                             Designation: <?php echo $Rower['IkeyDesignation'];?>
                            </h5>
                            
                            <h5>
                             Mobile: <?php echo $Rower['IKeyPhone'];?>
                            </h5>
                            <h5>
                             Email: <?php echo $Rower['IkeyEmail'];?>
                            </h5><br>
                            
                            <?php echo $Rower['IKeyDescription'];?>
                            
                            
                           <br>
                            

                        </div>
                    </div>
                    
               
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php';?>