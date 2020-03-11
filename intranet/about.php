<?php 

require 'admin/db/config.php';

$Query_siscon ="SELECT * FROM i_business ORDER BY IBSSortOrder ASC";
$Result_siscon = $conn->query($Query_siscon);

include 'header.php';?>


       

       <div class="about-area default-padding pb0">
        <div class="container">
            <div class="row">
                <div class="about-info">
                  
                    <div class="col-md-12 info">
                        
                       
                            
<?php echo $a_about; ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div> <br>
    
            <section id="event" class="event-area bg-gray single-view default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center" style="margin-bottom:0px">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Our Sister Concerns</h2>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            
<div class="col-md-12">
<div class="row">


 <?php while($Row_siscon = $Result_siscon->fetch_assoc())
 {
 ?> 

 <a href="<?php echo $Row_siscon['IBSUrl']; ?>" target="_blank"><div class="col-md-4 col-xs-6" style="margin-top: 20px; padding-right:2px; padding-bottom: 5px; padding-top:10px; margin-bottom:5px">   
 <img src="uploads/sisconcern-logo/<?php echo $Row_siscon['IBSLogo']; ?>" alt="thumb"  style="height: 103px; width: 200px" /> 
 <h4>
 </h4>
 </div> </a>

<?php }; ?> 





</div>
</div>
            


       
    </section>


<?php include 'footer.php';?>