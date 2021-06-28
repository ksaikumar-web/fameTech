<?php
session_start();
include "dbconnection.php"; 
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if(isset($_POST['register'])){
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Password = $_POST['password'];
  $ConfirmPassword = $_POST['confirmPassword'];
  $Email = $_POST['Email'];
  $phoneNumber = $_POST['phoneNumber'];
  $image=basename( $_FILES["fileToUpload"]["name"]);
	$Usernamequery="select * from loginDetails where Email='$Email'";
	$result=mysqli_query($conn,$Usernamequery);
	$Usernamecount=mysqli_num_rows($result);
	if ($Usernamecount>0){
		 ?>
      	     <script>
      	     	alert("Email already exists.... ");

      	     </script>
      	 <?php
	}
	else 
	{
		if ($Password===$ConfirmPassword) {

  	
  
       $query="insert into loginDetails(Email,FirstName,LastName,password,confirmPassword,Profile_img,phoneNumber) values('$Email','$FirstName','$LastName','$Password','$ConfirmPassword','$image','$phoneNumber')";
     $Fresult=mysqli_query($conn,$query);
   

  	
      if ($Fresult) {
      	     ?>
      	     <script>
      	     	alert("Sucessfully Registered ");
      	     </script>
      	     <?php
      	             ?>
      	              <script>
                 	   	   location.replace("login.html");
                 	   </script>
                 	   <?php
      }
      else{
      	 ?>
      	     <script>
      	     	alert("Error Please try again...");
      	     </script>
      	     <?php

      }
	}
	else{
		 ?>
      	     <script>
      	     	alert("password and ConfirmPassword is not matching");
      	     </script>
      	 <?php
	}
 }

}
elseif(isset($_POST['update'])){
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Password = $_POST['password'];
  $ConfirmPassword = $_POST['confirmPassword'];
  $Email = $_POST['Email'];
  $phoneNumber = $_POST['phoneNumber'];
  $image=basename( $_FILES["fileToUpload"]["name"]);
  $Usernamequery="select * from loginDetails where Email='$Email'";
  $result=mysqli_query($conn,$Usernamequery);
  $Usernamecount=mysqli_num_rows($result);
  echo $Email;
    if ($Password===$ConfirmPassword) {

    
  
       $query="UPDATE logindetails SET `FirstName`='$FirstName',`LastName`='$LastName',`password`='$Password',`confirmPassword`='$ConfirmPassword',`Profile_img`='$image',`phoneNumber`='phoneNumber' WHERE Email='$Email'";
    $Fresult=mysqli_query($conn,$query);
   

    
      if ($Fresult) {
             ?>
             <script>
              alert("Sucessfully updated ");
             </script>
             <?php
                     ?>
                      <script>
                         location.replace("login.html");
                     </script>
                     <?php
      }
      else{
         ?>
             <script>
              alert("Error Please try again...");
             </script>
             <?php

      }
  }
  else{
     ?>
             <script>
              alert("password and ConfirmPassword is not matching");
             </script>
         <?php
  }
 

}
elseif(isset($_POST['delete'])){
        $_Email=$_SESSION['Email'];
        $image='image.jpg';
       $query="UPDATE logindetails SET `Profile_img`='$image' WHERE Email='$_Email'";
    $Fresult=mysqli_query($conn,$query);
   

    
      if ($Fresult) {
             ?>
             <script>
              alert("Sucessfully deleted ");
             </script>
             <?php
                     ?>
                      <script>
                         location.replace("login.html");
                     </script>
                     <?php
      }
      else{
         ?>
             <script>
              alert("Error Please try again...");
             </script>
             <?php

      }
}

else
{
?>
      	     <script>
      	     	alert(" Please Enter valid details...");
      	     </script>
      	 <?php
      	}

?>