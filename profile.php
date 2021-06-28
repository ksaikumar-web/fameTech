<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile</title>
  <link rel="stylesheet" href="css/profilestyle.css">

</head>
<body>
  <script>
    $("#stark .nav-icon").click(function(){  
  $("#stark").addClass("animate-out");
  $("#martell").addClass("animate-out");
});

$("#martell .nav-icon").click(function(){  
  $("#martell").addClass("animate-out-again");
  $("#baratheon").addClass("animate-out");
});
    
  </script>
 
  <section id="user">
    
    <div class="profile-card">
      <img  class="nav-icon" src="C:\Users\K.Sai kumar\Pictures\20200315164712_IMG_2409.jpg">
      <div class="photo"></div>
      <div class="text-info-outer">
        <div class="text-info-inner">
          <div class="follow-button"><h4>Follow</h4></div>
          <h3>King in da Norf</h3>
          <h1>Ned Stark</h1>
          <h2>Followers: 1022</h2>
          <h2>Following: 20</h2>
          <p>Eddard Stark was the head of House Stark and Lord Paramount of the North. The North is one of the constituent regions of the Seven Kingdoms, and House Stark is one of the Great Houses of the realm. House Stark rules the region from their seat of Winterfell, and Eddard also held the title Lord of Winterfell. In addition, he was the Warden of the North.</p>
         
        </div>
      </div>
    </div>
  </section>
  
 
</body>
</html>