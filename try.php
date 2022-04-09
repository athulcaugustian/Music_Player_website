<?php include('db_connect.php') ?>
 <?php 
 $id = $_GET['id'];
 //echo $id;

$sql = "SELECT * from uploads where id=$id";
$query = mysqli_query($conn, $sql); 

$rows = mysqli_fetch_assoc($query);

 

?>

<style>
/* .icon-container {
  width: 300;
  height: 300;
  background-color: #DE5E97;
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

.audio-icon {
   width: 90%;
   height: 90%;} */

   body{
       display: flex;
       justify-content: center;
       align-items: center;
       min-height: 100vh;
       background: #000;
   }
   .player{
       position:relative;
       width: 350px;
       background: #f1f3f4;
       box-shadow:0 50px 80px rgba(0,0,0,0.25);
   }
   .player .icon-container{
     position:relative;
     width:100%;
     height:350px;
   }
   .player .icon-container img{
       position:absolute;
       top:0;
       left:0;
       width:100%;
       height:100%;
       object-fit:cover;
   }
   .player audio {
       width:100%;
       outline: none;
       margin-top:270
   }

   
</style>
<body>
 <div class="player">
  <div class="icon-container">
    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="audio-icon" viewBox="0 0 20 20" fill="currentColor"> -->
        <img src="<?php echo $rows['cover_image'];?>"    >
    <!-- <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
    </svg> -->


    <audio controls>

    <source src="<?php echo $rows['upath']; ?>" type="audio/mpeg"> </source>
     </audio>  








<!-- <div class="audio-player">
  <div class="icon-container">
    <svg xmlns="http://www.w3.org/2000/svg" class="audio-icon" viewBox="0 0 20 20" fill="currentColor">
    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
    </svg>

     <audio controls>

    <source src="<?php echo $rows['upath']; ?>" type="audio/mpeg"> </source>
     </audio>  
</div>
</div> -->

  
