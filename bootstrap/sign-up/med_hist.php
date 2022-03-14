<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'covac');

if (isset($_POST['submit'])) {
$name = $_POST['name'];
$age = $_POST['age'];
$allergies = $_POST['allergies'];
$covid = $_POST['covid'];
$cov_det = $_POST['cov_det'];
$tobacco = $_POST['tobacco'];  // Would return an array of all selected option items
  
// For checkboxes, only checked values would be submitted, so lets see what was checked
// isset() function must return not null, for parameters that are submitted
$conditions = '';
if(isset($_POST['Asthama'])){
$subjects = $subjects . ' Asthama, ';
} if(isset($_POST['Cancer'])){
$subjects = $subjects . ' Cancer, ';
} if(isset($_POST['cardiac'])){
$subjects = $subjects . ' cardiac';
}
$sql = "INSERT INTO med_hist (name,age,allergies,covid,covid_det,tobacco,conditions)
     VALUES ('$name','$age','$allergies','$covid','$covid_det', '$tobacco', '$conditions')";
     if (mysqli_query($db, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

  ?>