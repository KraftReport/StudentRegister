<?php

include('dbcom.php');

if(isset($_POST['add_students'])){
   $fname = $_POST['f_name'];
   $lname = $_POST['l_name'];
   $age = $_POST['age'];
   
   if($fname== "" || empty($fname)  || $lname== "" || empty($lname) || $age== "" || empty($age)  ){
    header('location:index.php?message=YOU NEED TO FILL FIRST NAME !');
   }else{
      $query = "insert into `students` (`first_name`,`last_name`,`age`) values ('$fname','$lname','$age')";

      $result = mysqli_query($connection,$query);

      if(!$result){
         die("Query failed");
      }else{
         header('location:index.php?insert_msg=UPDATED SUCCESSFULLLY !');
      }
   }
}