<?php include('dbcom.php'); ?>

<?php 



if(isset($_GET['id'])){
    $id= $_GET['id'];

    $query = "delete from `students` where `id` = $id";

    $result = mysqli_query($connection,$query);

    if(!$result){
        die('Query failed');
    }else{
        header('location:index.php?delete_msg=SUCCESSFULLY DELETED');
    }
}