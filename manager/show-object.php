<!-- Navbar -->
<?php include('partial/navbar.php') ?>
<?php
   // Get ID of the object needed to be delete
   $id = $_GET['id'];

   // Queries to select the object (data)
   $sql = "SELECT * FROM  table01 WHERE id=$id";

   // Execute the queries
   $res = mysqli_query($conn,$sql);
?>

<section class="show-object">
   <div class="container">
         <p style="font-size:25px; font-weight: bold;">Object details</p>
   </div>

   <div class="container">
      <a href="<?php echo SITEURL; ?>/manager/edit-object.php?id=<?php echo $id; ?>" class="show-btn" >
         Edit
      </a>

      <a href="index.php" class="add-new toprightbtn">
         Back
      </a>
   </div>

   <div class="container show-1-object">
      <table class="object-table">
         <?php
            // Check queries working or not
            if ($res==TRUE)
            {
               // Count rows (also to check if table has data)
               $count = mysqli_num_rows($res);   //Function to get all rows in database

               if($count>0)
               {// Has data
                  $idcnt = 0;
                  while($rows=mysqli_fetch_assoc($res))
                  {
                     $idcnt++;
                     //If there's still data, the code will continue to fetch
                     $id = $rows['id'];
                     $title = $rows['title'];
                     $description = $rows['description'];
                     $image = $rows['image'];
                     $status = $rows['status'];
                     ?>
                        <tr>
                           <td colspan="2" class="title-cell"><?php echo $title; ?></td>
                        </tr>
                        <tr>
                           <td class="image-cell">
                              <?php
                                 if($image!='')
                                 {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>/img/<?php echo $image ?>" width="350px">
                                    <?php
                                 }
                                 else
                                 {
                                    echo "No image";
                                 }
                              ?>
                           </td>

                           <td class="description-cell"><?php echo $description; ?></td>
                        </tr>
                     <?php
                  }
               }
            }
         ?>
      </table>
   </div>
</section>

<?php include('partial/footer.php') ?>