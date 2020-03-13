<?php 

require 'admin/db/config.php';



include 'header.php'; ?>
    <!-- Start Breadcrumb 
    ============================================= -->

<script>
window.onload = function() {
  Getproducts();
};
</script>

    <section id="management" class="advisor-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Products</h2>

                        <div class="input-group">
                         <input class="form-control" id="search" name="search" placeholder="Search" type="text" style="height:47px">
                         <span class="input-group-btn">
                         <button type="submit" name="submit" id="submit" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;margin-left: 10px;" onclick="Getproducts()"> Search <i class="fa fa-paper-plane"></i>
                         </button></span>
                         </div>

                    </div>
                </div>
            </div>


             <div class="col-md-12">
             <div class="row">
             
             </div>
             </div>

            <div class="row">
            <div class="advisor-items text-center text-light"> 

               <div id="Products">
                   

               </div>



            </div>
            </div>
            </div>

    </section>



<script>
    
           function Getproducts()
           {


           var SearchKey=document.getElementById('search').value
      
           xhr = new XMLHttpRequest();
           xhr.open('POST' , 'getproducts.php' , true);

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

     
          document.getElementById('Products').innerHTML =temp;
           

           }

           }
           };      
       };

</script>



<?php include 'footer.php'; ?>