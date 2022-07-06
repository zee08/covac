<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "covac";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }
if(isset($_POST['submit']))
{    
     $date = $_POST['date'];
     $time = $_POST['time'];
     $phoneno = $_POST['phoneno'];
     $sql = "INSERT INTO appointment (date,time,phoneno)
     VALUES ('$date','$time','$phoneno')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully!";
       
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>