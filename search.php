<?php
// Create database connection
$db = new SQLite3('photos.db');

if(isset($_GET['last_image'])) {
  $last_image = $_GET['last_image'];
  }
else {
  $last_image = 0;
  }

// If upload button is clicked ...
if (isset($_POST['search'])) {
  // Get text
  $keyword = SQLite3::escapeString($_POST['keyword']);
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
  $date = SQLite3::escapeString($_POST['date']);
  $photographer = SQLite3::escapeString($_POST['photographer']);
  $others = SQLite3::escapeString($_POST['others']);
  $specimen = SQLite3::escapeString($_POST['specimen']);
  $collection = SQLite3::escapeString($_POST['collection']);
  $notes = SQLite3::escapeString($_POST['notes']);
  $caption = SQLite3::escapeString($_POST['caption']);
  $anatomy = SQLite3::escapeString($_POST['anatomy']);



  //$sql = "select name from images where id=1";
  //$result = SQLite3::query($con,$sql);
  //$row = SQLite3Result::fetchArray($result);

  //$image_src = $row['IMAGE_PATH'];

  //
  $query = "";
  if(!empty($keyword)){//if keyword set goes here
    $query = "SELECT * FROM MAIN WHERE PHYLUM LIKE '$keyword' OR CLASS LIKE '$keyword' OR ORDER_ LIKE '$keyword' OR FAMILY LIKE '$keyword' OR GENUS LIKE '$keyword' OR SPECIES LIKE '$keyword' OR INFRASPECIFIC LIKE '$keyword' OR COUNTRY LIKE '$keyword' OR STATE LIKE '$keyword' OR COUNTY LIKE '$keyword' OR SITE LIKE '$keyword' OR LOCALITY_DESCRIPTION LIKE '$keyword' OR LATITUDE LIKE '$keyword' OR LONGITUDE LIKE '$keyword' OR HABITAT LIKE '$keyword' OR DATE_TAKEN LIKE '$keyword' OR PHOTOGRAPHER LIKE '$keyword' OR OTHERS_PRESENT LIKE '$keyword' OR SPECIMEN_ID LIKE '$keyword' OR NOTES LIKE '$keyword' OR PHOTO_COLLECTION LIKE '$keyword' OR CAPTION LIKE '$keyword' OR ANATOMY LIKE '$keyword'";
  }else if(!empty($phylum)){ $query = "SELECT * FROM MAIN WHERE PHYLUM LIKE '$phylum'";
    if(!empty($class)){ $query = $query . "AND CLASS LIKE '$class'"; }
    if(!empty($order)){ $query = $query . "AND ORDER_ LIKE '$order'"; }
    if(!empty($family)){ $query = $query . "AND FAMILY LIKE '$family'"; }
    if(!empty($genus)){ $query = $query . "AND GENUS LIKE '$genus'"; }
    if(!empty($species)){ $query = $query . "AND SPECIES LIKE '$species'"; }
    if(!empty($infraspecific)){ $query = $query . "AND INFRASPECIFIC LIKE '$infraspecific'"; }
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($class)){ $query = "SELECT * FROM MAIN WHERE CLASS LIKE '$class'";
    if(!empty($order)){ $query = $query . "AND ORDER_ LIKE '$order'"; }
    if(!empty($family)){ $query = $query . "AND FAMILY LIKE '$family'"; }
    if(!empty($genus)){ $query = $query . "AND GENUS LIKE '$genus'"; }
    if(!empty($species)){ $query = $query . "AND SPECIES LIKE '$species'"; }
    if(!empty($infraspecific)){ $query = $query . "AND INFRASPECIFIC LIKE '$infraspecific'"; }
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($order)){ $query = "SELECT * FROM MAIN WHERE ORDER_ LIKE '$order'";
    if(!empty($family)){ $query = $query . "AND FAMILY LIKE '$family'"; }
    if(!empty($genus)){ $query = $query . "AND GENUS LIKE '$genus'"; }
    if(!empty($species)){ $query = $query . "AND SPECIES LIKE '$species'"; }
    if(!empty($infraspecific)){ $query = $query . "AND INFRASPECIFIC LIKE '$infraspecific'"; }
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($family)){ $query = "SELECT * FROM MAIN WHERE FAMILY LIKE '$family'";
    if(!empty($genus)){ $query = $query . "AND GENUS LIKE '$genus'"; }
    if(!empty($species)){ $query = $query . "AND SPECIES LIKE '$species'"; }
    if(!empty($infraspecific)){ $query = $query . "AND INFRASPECIFIC LIKE '$infraspecific'"; }
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($genus)){ $query = "SELECT * FROM MAIN WHERE GENUS LIKE '$genus'";
    if(!empty($species)){ $query = $query . "AND SPECIES LIKE '$species'"; }
    if(!empty($infraspecific)){ $query = $query . "AND INFRASPECIFIC LIKE '$infraspecific'"; }
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($species)){ $query = "SELECT * FROM MAIN WHERE SPECIES LIKE '$species'";
    if(!empty($infraspecific)){ $query = $query . "AND INFRASPECIFIC LIKE '$infraspecific'"; }
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($infraspecific)){ $query = "SELECT * FROM MAIN WHERE INFRASPECIFIC LIKE '$infraspecific'";
    if(!empty($country)){ $query = $query . "AND COUNTRY LIKE '$country'"; }
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($country)){ $query = "SELECT * FROM MAIN WHERE COUNTRY LIKE '$country'";
    if(!empty($state)){ $query = $query . "AND STATE LIKE '$state'"; }
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($state)){ $query = "SELECT * FROM MAIN WHERE STATE LIKE '$state'";
    if(!empty($county)){ $query = $query . "AND COUNTY LIKE '$county'"; }
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($county)){ $query = "SELECT * FROM MAIN WHERE COUNTY LIKE '$county'";
    if(!empty($site)){ $query = $query . "AND SITE LIKE '$site'"; }
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($site)){ $query = "SELECT * FROM MAIN WHERE SITE LIKE '$site'";
    if(!empty($locality)){ $query = $query . "AND LOCALITY_DESCRIPTION LIKE '$locality'"; }
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($locality)){ $query = "SELECT * FROM MAIN WHERE LOCALITY_DESCRIPTION LIKE '$locality'";
    if(!empty($latitude)){ $query = $query . "AND LATITUDE LIKE '$latitude'"; }
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($latitude)){ $query = "SELECT * FROM MAIN WHERE LATITUDE LIKE '$latitude'";
    if(!empty($longitude)){ $query = $query . "AND LONGITUDE LIKE '$longitude'"; }
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($longitude)){ $query = "SELECT * FROM MAIN WHERE LONGITUDE LIKE '$longitude'";
    if(!empty($habitat)){ $query = $query . "AND HABITAT LIKE '$habitat'"; }
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($habitat)){ $query = "SELECT * FROM MAIN WHERE HABITAT LIKE '$habitat'";
    if(!empty($date)){ $query = $query . "AND DATE_TAKEN LIKE '$date'"; }
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($date)){ $query = "SELECT * FROM MAIN WHERE DATE_TAKEN LIKE '$date'";
    if(!empty($photographer)){ $query = $query . "AND PHOTOGRAPHER LIKE '$photographer'"; }
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($photographer)){ $query = "SELECT * FROM MAIN WHERE PHOTOGRAPHER LIKE '$photographer'";
    if(!empty($others)){ $query = $query . "AND OTHERS_PRESENT LIKE '$others'"; }
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($others)){ $query = "SELECT * FROM MAIN WHERE OTHERS_PRESENT LIKE '$others'";
    if(!empty($specimen)){ $query = $query . "AND SPECIMEN_ID LIKE '$specimen'"; }
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($specimen)){ $query = "SELECT * FROM MAIN WHERE SPECIMEN_ID LIKE '$specimen'";
    if(!empty($collection)){ $query = $query . "AND PHOTO_COLLECTION LIKE '$collection'"; }
    if(!empty($notes)){ $query = $query . "AND NOTES LIKE '$notes'"; }
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($notes)){ $query = "SELECT * FROM MAIN WHERE NOTES LIKE '$notes'";
    if(!empty($caption)){ $query = $query . "AND CAPTION LIKE '$caption'"; }
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($caption)){ $query = "SELECT * FROM MAIN WHERE CAPTION LIKE '$caption'";
    if(!empty($anatomy)){ $query = $query . "AND ANATOMY LIKE '$anatomy'"; }
  }else if(!empty($anatomy)){ $query = "SELECT * FROM MAIN WHERE ANATOMY LIKE '$anatomy'";
  }
// Get images from the database
  echo $query;
  $results = $db->query($query);
  $numRows = 0;
    while($row = $results->fetchArray()) {
      ++$numRows;
      echo "<div align='center'><i> {$row['GENUS']} {$row['SPECIES']} {$row['INFRASPECIFIC']} </i><br/>";
      if(!empty($row['CAPTION'])){ echo "{$row['CAPTION']}<br/>"; }
      echo "{$row['COUNTRY']}, {$row['STATE']}, {$row['COUNTY']}, {$row['SITE']}, {$row['LOCALITY']}<br/>";
      echo "{$row['LATITUDE']}, {$row['LONGITUDE']}<br/>";
      echo "{$row['HABITAT']}<br/>";
      $imageURL = $row["IMAGE_PATH"]; ?><div align='center'><a href="<?php echo $imageURL; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo $imageURL; ?>" alt=""/></a></div><br/><?php
      }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Image Search</title>
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
    display: block;
    width:100%;
    max-width:600px;
    max-height:600px;
    width: auto;
    height: auto;
   }

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <div id="content">
  <form method="post" action="search.php" enctype="multipart/form-data">
      <b>Keyword (search any field)</b>
      <div>
        <input type="text" name="keyword" placeholder="Keyword" value="<?php if (isset($_REQUEST['keyword'])) echo $_REQUEST['keyword']?>">
      </div>
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
        <input type="text" name="date" placeholder="Date" value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']?>">
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
    		<button type="submit" name="search">SEARCH</button>
    	</div>
    </form>
  </div>
<div align='center'>
  <a href="index.php">Upload</a>
</div>
</body>
</html>
