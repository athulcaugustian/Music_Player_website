<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<?php if(isset($_POST['save'])){

$genreid = $_POST['genre_id'];
$title = $_POST['title'];
$artist = $_POST['artist'];
$description = $_POST['description'];
//add mp3
$dir='assets/uploads/';
//$audio =$_FILES['audio']['name'];
$audio_path = $dir.basename($_FILES['audio']['name']);
move_uploaded_file($_FILES['audio']['tmp_name'],$audio_path);
//add image
//$photo = $_FILES['cover']['name'];
$photo_path = $dir.basename($_FILES['cover']['name']);
move_uploaded_file($_FILES['cover']['tmp_name'],$photo_path);

$sql = "INSERT INTO uploads (genre_id,title,artist,description,upath,cover_image) values($genreid,'$title','$artist','$description','$audio_path','$photo_path')";
$query = mysqli_query($conn, $sql); 
echo '<script> alert("Song Added") </script>';
}
?>
<style>
  .desc{
    width: 60%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;

  }
  </style>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<!-- <form action="" id="manage-music"> -->
        <form method="post" enctype="multipart/form-data">

        <!-- <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>"> -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group text-dark">
              <label for="" class="control-label">Genre</label>
              <select name="genre_id" id="genre_id" class="form-control select2 text-dark">
                <option value=""></option>
                <?php
                  $genres = $conn->query("SELECT * FROM genres order by genre asc");
                  while($row = $genres->fetch_assoc()):
                ?>
                <option value="<?php echo $row['id'] ?>" <?php echo isset($genre_id) && $genre_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['genre']) ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
        </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Title</label>
							<input type="text" class="form-control form-control-sm" name="title">
              
						</div>
					</div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Artist</label>
              <input type="text" class="form-control form-control-sm" name="artist">
            
            </div>
          </div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="" class="control-label">Description</label><br>
							<textarea name="description"  cols="30" rows="4" class="desc"></textarea>
              
						</div>
					</div>
				</div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Upload Music</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="audio" accept="audio/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

           
         
          
          </div>
          <div class="col-md-6">
           <div class="form-group">
              <label for="" class="control-label">Cover Image</label>
                <div class="custom-file">
                  <!-- <input type="file" name="cover"> -->
                  <input type="file" class="custom-file-input" id="customFile" name="cover" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            
          </div>
        </div>
        <button class="btn btn-flat  bg-gradient-primary mx-2" name="save">Save</button>
        </form>
    	</div>
    
	</div>
</div>
