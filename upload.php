<?php
echo '<script src="testMe.js"></script>';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = true;

$submittedFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$currentNumber = file_get_contents("tests.json");
$testboy = json_decode($currentNumber, true);  
$nextRunningFile = $testboy["nextToRun"];
$newfilename = $target_dir.strval($nextRunningFile).'.'.$submittedFileType;





// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = false;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadOk = false;
}

// Only Allows python
if($submittedFileType != "py") {
  $uploadOk = false;
}

// Check if $uploadOk is set to 0 by an error

  if (($uploadOk == true) and (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename))) {
    $testboy["currentNumber"] =  $testboy["currentNumber"]+1;
    echo "<script>test(".$currentNumber.")</script>";
    echo "<p>studid</p>";
  } 
 

$lastFileNumber = $testboy["currentNumber"];

$newJsonString = json_encode($testboy);
file_put_contents('tests.json', $newJsonString);
?>
