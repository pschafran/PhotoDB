<?php

  // Create database connection
  $db = new SQLite3('photos.db');

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];

    // image file directory
    date_default_timezone_set('America/New_York');
    $curDate = date('Y.m.d');

    if (!file_exists("DB/$curDate")) {
      mkdir("DB/$curDate", 0777, true);
      }
  	$target = "DB/$curDate/".basename($image);

    if (!file_exists("$target")){
          if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        		$msg = "Image uploaded successfully";
        	}else{
        		$msg = "Failed to upload image";
        	}
          echo $msg;

        	// Get text
        	$phylum = SQLite3::escapeString($_POST['phylum']);
          $class = SQLite3::escapeString($_POST['class']);
          $order= SQLite3::escapeString($_POST['order']);
          $family = SQLite3::escapeString($_POST['family']);
          $genus = SQLite3::escapeString($_POST['genus']);
          $species = SQLite3::escapeString($_POST['species']);
          $infraspecific = SQLite3::escapeString($_POST['infraspecific']);
          $country = SQLite3::escapeString($_POST['country']);
          $state = SQLite3::escapeString($_POST['state']);
          $county = SQLite3::escapeString($_POST['county']);
          $site = SQLite3::escapeString($_POST['site']);
          $locality = SQLite3::escapeString($_POST['locality']);
          $latitude = SQLite3::escapeString($_POST['latitude']);
          $longitude = SQLite3::escapeString($_POST['longitude']);
          $habitat = SQLite3::escapeString($_POST['habitat']);
          $date = SQLite3::escapeString($_POST['year']);
          $date = SQLite3::escapeString($_POST['month']);
          $date = SQLite3::escapeString($_POST['day']);
          $photographer = SQLite3::escapeString($_POST['photographer']);
          $others = SQLite3::escapeString($_POST['others']);
          $specimen = SQLite3::escapeString($_POST['specimen']);
          $collection = SQLite3::escapeString($_POST['collection']);
          $notes = SQLite3::escapeString($_POST['notes']);
          $caption = SQLite3::escapeString($_POST['caption']);
          $anatomy = SQLite3::escapeString($_POST['anatomy']);
        #  $target = SQLite3::escapeString($_POST['target']);
        #  $curDate = SQLite3::escapeString($_POST['$curDate']);

        	$sql = "INSERT INTO MAIN (PHYLUM , CLASS , ORDER_, FAMILY, GENUS, SPECIES, INFRASPECIFIC, COUNTRY, STATE, COUNTY, SITE, LOCALITY_DESCRIPTION, LATITUDE, LONGITUDE, HABITAT, YEAR, MONTH, DAY, PHOTOGRAPHER, OTHERS_PRESENT, SPECIMEN_ID, PHOTO_COLLECTION, NOTES, CAPTION, ANATOMY, UPLOAD_DATE, IMAGE_PATH) VALUES ('$phylum','$class','$order','$family', '$genus', '$species', '$infraspecific', '$country', '$state', '$county', '$site', '$locality', '$latitude', '$longitude', '$habitat', '$year', '$month', '$day', '$photographer', '$others', '$specimen', '$collection', '$notes', '$caption', '$anatomy', '$curDate', '$target')";
        	// execute query
        	$db->query($sql);
      }else{
      echo "Failed to upload. File already exists.";
      }
  }

?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
    width:100%;
    max-width:1200px;
   }

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div id="content">
<form method="post" action="index.php" enctype="multipart/form-data">
    <img id="blah">
    <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
    <br/>

    <b>Taxonomy</b>
  	<div>
      <input type="text" name="phylum" placeholder="Phylum" value="<?php if (isset($_REQUEST['phylum'])) echo $_REQUEST['phylum']?>">
  	</div>
    <div>
      <input type="text" name="class" placeholder="Class" value="<?php if (isset($_REQUEST['class'])) echo $_REQUEST['class']?>">
    </div>
    <div>
      <input type="text" name="order" placeholder="Order" value="<?php if (isset($_REQUEST['order'])) echo $_REQUEST['order']?>">
    </div>
    <div>
      <input type="text" name="family" placeholder="Family" value="<?php if (isset($_REQUEST['family'])) echo $_REQUEST['family']?>">
    </div>
    <div>
      <input type="text" name="genus" placeholder="Genus" value="<?php if (isset($_REQUEST['genus'])) echo $_REQUEST['genus']?>">
    </div>
    <div>
      <input type="text" name="species" placeholder="Specific Epithet" value="<?php if (isset($_REQUEST['species'])) echo $_REQUEST['species']?>">
    </div>
    <div>
      <input type="text" name="infraspecific" placeholder="Infraspecific Name" value="<?php if (isset($_REQUEST['infraspecific'])) echo $_REQUEST['infraspecific']?>">
    </div>
    <div>
      <input type="text" name="common_name" placeholder="Common Name" value="<?php if (isset($_REQUEST['common_name'])) echo $_REQUEST['common_name']?>">
    </div>
    <b>Location</b>
    <div>
      <input type="text" name="country" placeholder="Country" value="<?php if (isset($_REQUEST['country'])) echo $_REQUEST['country']?>">
    </div>
    <div>
      <input type="text" name="state" placeholder="State/Province" value="<?php if (isset($_REQUEST['state'])) echo $_REQUEST['state']?>">
    </div>
    <div>
      <input type="text" name="county" placeholder="County" value="<?php if (isset($_REQUEST['county'])) echo $_REQUEST['county']?>">
    </div>
    <div>
      <input type="text" name="site" placeholder="Site Name" value="<?php if (isset($_REQUEST['site'])) echo $_REQUEST['site']?>">
    </div>
    <div>
      <input type="text" name="locality" placeholder="Site Geographic Description" value="<?php if (isset($_REQUEST['locality'])) echo $_REQUEST['locality']?>">
    </div>
    <div>
      <input type="text" name="latitude" placeholder="Latitude" value="<?php if (isset($_REQUEST['latitude'])) echo $_REQUEST['latitude']?>">
    </div>
    <div>
      <input type="text" name="longitude" placeholder="Longitude" value="<?php if (isset($_REQUEST['longitude'])) echo $_REQUEST['longitude']?>">
    </div>
    <div>
      <input type="text" name="habitat" placeholder="Habitat Description" value="<?php if (isset($_REQUEST['habitat'])) echo $_REQUEST['habitat']?>">
    </div>
    <div>
      <input type="text" name="year" placeholder="Year" value="<?php if (isset($_REQUEST['year'])) echo $_REQUEST['year']?>">
    </div>
    <div>
      <input type="text" name="month" placeholder="Month" value="<?php if (isset($_REQUEST['month'])) echo $_REQUEST['month']?>">
    </div>
    <div>
      <input type="text" name="day" placeholder="Day" value="<?php if (isset($_REQUEST['day'])) echo $_REQUEST['day']?>">
    </div>
    <b>People</b>
    <div>
      <input type="text" name="photographer" placeholder="Photographer" value="<?php if (isset($_REQUEST['photographer'])) echo $_REQUEST['photographer']?>">
    </div>
    <div>
      <input type="text" name="others" placeholder="Others Present" value="<?php if (isset($_REQUEST['others'])) echo $_REQUEST['others']?>">
    </div>
    <b>Misc.</b>
    <div>
      <input type="text" name="specimen" placeholder="Specimen ID / Collection Number" value="<?php if (isset($_REQUEST['specimen'])) echo $_REQUEST['specimen']?>">
    </div>
    <div>
      <input type="text" name="collection" placeholder="Photo Collection" value="<?php if (isset($_REQUEST['collection'])) echo $_REQUEST['collection']?>">
    </div>
    <div>
      <input type="text" name="notes" placeholder="Notes" value="<?php if (isset($_REQUEST['notes'])) echo $_REQUEST['notes']?>">
    </div>
    <div>
      <input type="text" name="caption" placeholder="Photo Caption" value="<?php if (isset($_REQUEST['caption'])) echo $_REQUEST['caption']?>">
    </div>
    <div>
      <input type="text" name="anatomy" placeholder="Parts Shown" value="<?php if (isset($_REQUEST['anatomy'])) echo $_REQUEST['anatomy']?>">
    </div>
  	<div>
  		<button type="submit" name="upload">ADD TO DB</button>
  	</div>
  </form>
</div>
<div align='center'>
  <a href="search.php">Search</a>
</div>

</body>
</html>
