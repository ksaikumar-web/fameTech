<link rel="stylesheet" href="css/profilestyle.css">
<?php 
     session_start();
   include "dbconnection.php"; 
          if(isset($_POST['login']))
          { 
            $_Email=$_POST['Email'];
             $_Password=$_POST['password'];
            
               $Email_search="select * from loginDetails where Email='$_Email' ";
             $result=mysqli_query($conn,$Email_search);
              $Usernamecount=mysqli_num_rows($result);
        if($Usernamecount)
        {
               $Usernamepass=mysqli_fetch_assoc($result);
               $db_pass=$Usernamepass['password'];
            
                 if ($db_pass==$_Password ) {
                     ?>
                     <section id="user">
    
               <div class="profile-card">

        
          
             <?php
            
               $user="select * from loginDetails where Email='$_Email' ";
             $result=mysqli_query($conn,$user);
              
               while($row = mysqli_fetch_array($result))
        {
            echo "<marquee width=50%><h1 font-color=skyblue>WELCOME TO FAME TECHNOLOGIES</h1></marquee>";
            echo "<img class=photo  src='images/".$row['Profile_img']."' >";
            
            echo "<h1 align=center>YOUR PROFILE</h1>";
            echo "<p align=center>";
            echo "NAME:"." ".$row["FirstName"]." ".$row["LastName"]."</br></br>";
             echo "EMAIL:"." ".$row["Email"]."</br></br>";
              echo "MOBILE:"." ".$row["phoneNumber"]."</br></br>";
            echo "</p>";
            $_SESSION['Email'] = $row["Email"];
           $_SESSION['FirstName'] = $row["FirstName"];
           $_SESSION['LastName'] = $row["LastName"];
           $_SESSION['Password'] = $row["password"];
           $_SESSION['mobile'] = $row["phoneNumber"];
            echo "<form action=update.php align=center><input type=submit value=UPDATE name=update></form>";
                
           
      
       }
        ?>
        
                
             
          
      </div>
    </div>
  </section>
                     <?php
                 }
                 else{
                  ?>
             <script>
              alert("Incorrect Password...");
             </script>
             <?php
                 }
                
             } 
              else{
                  ?>
             <script>
              alert("Fnter valid details....");
             </script>
             <?php
                   
                 } 
        }

        
       
       ?>