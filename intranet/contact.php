<?php 

require 'admin/db/config.php';

include 'header.php';?>

<script>
window.onload = function() {
  Getbranch();
};
</script>

    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Contact Info -->
                <div class="contact-info">
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Call Us</h4>
                                <span><?php echo $C_phone; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Address</h4>
                                <span><?php echo $C_address; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email Us</h4>
                                <span><?php echo $C_email; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Info -->
            </div>
        </div>
    </div>



                   <div class="container">

                    <div id="syllabus" class="row course-details-area cda default-padding">
                    <div class="col-md-12">
                        
                    <div class="tab-info">
                            <!-- Tab Nav -->
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                     Branches   
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                     Departments
                                    </a>
                                </li>
                            </ul>
                            <!-- End Tab Nav -->
                            <!-- Start Tab Content -->

                            <div class="tab-content tab-content-info">
                                <!-- Single Tab -->



                                <div id="tab1" class="tab-pane fade active in">

                                   

                                <div class="col-md-12" style="margin-bottom:10px;margin-left: -27px;"> 
                                <div class="col-md-6"> 
                                <div class="input-group">
                                <input class="form-control" id="bsearch" name="bsearch" placeholder="Search" type="text" style="height:47px">
                                <span class="input-group-btn">
                                <button type="submit" name="bsubmit" id="bsubmit" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;margin-left: 10px;" onclick="Getbranch()"> Search <i class="fa fa-paper-plane"></i>
                                </button></span>
                                </div> 
                                </div>

                                <div class="col-md-6" > 
                                </div> 

                                
                                </div>

                                <div id="branch">
                                    

                                </div>
                                

                                </div>



                                <!-- Single Tab -->
                                <div id="tab2" class="tab-pane fade">

                                <div class="col-md-12" style="margin-bottom:10px;margin-left: -27px;"> 
                                <div class="col-md-6 "> 
                                <div class="input-group">
                                <input class="form-control" id="csearch" name="csearch" placeholder="Search" type="text" style="height:47px">
                                <span class="input-group-btn">
                                <button type="submit" name="csubmit" id="csubmit" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;margin-left: 10px;" onclick="Getbranch()"> Search <i class="fa fa-paper-plane"></i>
                                </button></span>
                                </div> 
                                </div>

                                <div class="col-md-6" > 
                                </div> 

                                
                                </div>    


                                <div id="contactperson">
                                    
                                </div>


                            </div>
                            <!-- End Tab Content -->
                        </div>
                        </div>
                </div>

                </div>
                </div>


    <script>
    
           function Getbranch()
           {


           var BSearchKey=document.getElementById('bsearch').value
           var CSearchKey=document.getElementById('csearch').value
      
           xhr = new XMLHttpRequest();
           xhr.open('POST' , 'getbranches.php' , true);

           xhr.setRequestHeader('Content-Type', 'application/json');
           xhr.send(JSON.stringify({
           BSearchKey:BSearchKey,
           CSearchKey:CSearchKey

           }));


           xhr.onreadystatechange = function() {
  
           if (this.readyState == 4 && this.status == 200) {


            console.log('-------------------------------111--------------------------->>>')
           
           var temp =xhr.responseText;
           if (temp) {
           
           temp= JSON.parse(temp);

     
          document.getElementById('branch').innerHTML =temp.brnch;
          document.getElementById('contactperson').innerHTML =temp.dep;
           

           }

           }
           };    

       };


       
</script>            
                
                
    <?php include 'footer.php';?>