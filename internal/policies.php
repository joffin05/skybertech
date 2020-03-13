<?php 

require 'admin/db/config.php';


include 'header.php';?>

<script>
window.onload = function() {
  Getpolicies();
};
</script>

          <div class="top-cat-area inc-trending-courses about-area default-padding">
        <div class="container">
            <div class="row">


                <!-- End Home Sidebar -->
                <div class="col-md-12 home-sidebar">

                     <div class="input-group">
                         <input class="form-control" id="search" name="search" placeholder="Search" type="text" style="height:47px">
                         <span class="input-group-btn">
                         <button type="submit" name="submit" id="submit" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;margin-left: 10px;" onclick="Getpolicies()"> Search <i class="fa fa-paper-plane"></i>
                         </button></span>
                         </div><br>

                    <!-- Start Latest Post -->
                    <div class="sidebar-item latest-posts trending-courses-box" >
                        <h4 style="background:<?php echo $C_color; ?>">Policies</h4>
                        <div class="trending-courses-items">

                         <div id="policies">
                             
                         </div>


                            
                        </div>
                    </div>
                    <!-- End Latest Posts -->
                </div>
                <!-- End Home Sidebar -->

            </div>
        </div>
    </div>

<script>
    
           function Getpolicies()
           {


           var SearchKey=document.getElementById('search').value
      
           xhr = new XMLHttpRequest();
           xhr.open('POST' , 'getpolicies.php' , true);

           xhr.setRequestHeader('Content-Type', 'application/json');
           xhr.send(JSON.stringify({
           SearchKey:SearchKey

           }));


           xhr.onreadystatechange = function() {
  
           if (this.readyState == 4 && this.status == 200) {


            console.log('-------------------------------111--------------------------->>>')
           
           var temp =xhr.responseText;
           if (temp) {
           
           temp= JSON.parse(temp);

     
          document.getElementById('policies').innerHTML =temp;
           

           }

           }
           };      
       };

</script>

    <?php include 'footer.php';?>