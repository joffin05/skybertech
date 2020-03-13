<?php 

require 'admin/db/config.php';


$Query_cat ="SELECT * FROM i_keypercategory ORDER BY IKeyCatID DESC";
$Result_cat = $conn->query($Query_cat);


include 'header.php';?>

<script>
window.onload = function() {
  Getkeyperson();
};
</script>


    <section id="management" class="advisor-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Key Persons</h2>
                    </div>
                </div>

                <section>

                <div class="col-md-12 col-sm-12">
                <div class="row">

                <div class="col-md-4 col-sm-4" style="padding-top:10px">
                <input class="form-control" id="search" name="search" placeholder="Search" type="text" style="height:47px" >
                </div>

                <div class="col-md-4 col-sm-4" style="padding-top:10px">

                <select class="form-control" style="height:47px" name="keycat" id="keycat">

                
                  <option value="0">All</option>
                  <?php while($Row_cat = $Result_cat->fetch_assoc())
                  {
                  ?>

                  <option value="<?php echo $Row_cat['IKeyCatID']; ?>"><?php echo $Row_cat['IKeyCatName']; ?></option>

                 <?php }; ?> 

                </select>  
                
                </div>

                <div class="col-md-4 col-sm-4" style="padding-top:10px">
                <button type="submit" name="submit" id="submit" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>" onclick="Getkeyperson()"> Search <i class="fa fa-paper-plane"></i></button>
                </div>
                <div>
                </div> 
              </section><br><br><br><br>



            </div>
            <div class="row">
                <div class="advisor-items text-center text-light">

                    
                   <div id="keypersons">
                     

                   </div>

 
                </div>
            </div>
        </div>
    </section>



    <script>
    
           function Getkeyperson()
           {


           var SearchKey=document.getElementById('search').value
           var keycat=document.getElementById('keycat').value
      
           xhr = new XMLHttpRequest();
           xhr.open('POST' , 'getkeyperson.php' , true);

           xhr.setRequestHeader('Content-Type', 'application/json');
           xhr.send(JSON.stringify({
           SearchKey:SearchKey,
           keycat:keycat

           }));


           xhr.onreadystatechange = function() {
  
           if (this.readyState == 4 && this.status == 200) {


            console.log('-------------------------------111--------------------------->>>')
           
           var temp =xhr.responseText;
           if (temp) {
           
           temp= JSON.parse(temp);

     
          document.getElementById('keypersons').innerHTML =temp;
           

           }

           }
           };      
       };

</script>

<?php include 'footer.php';?>