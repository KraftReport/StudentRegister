<?php include("header.php") ?>
<?php include("dbcom.php") ?>

<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];


    $query = "select * from `students` where `id` = '$id'";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($sql));
    }else{

       $row = mysqli_fetch_assoc($result);
 
        
}}



?>

<?php 

    if(isset($_POST['update_students'])){

        if(isset($_GET['id_new'])){
            $idnew= $_GET['id_new'];
        }
      
        $fename = $_POST['fe_name'];
        $lename = $_POST['le_name'];
        $eage = $_POST['eage'];

        $query = "update `students` set `first_name`='$fename' ,`last_name`='$lename',`age`='$eage' where `id` = '$idnew' ";

        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Query failed");
        }else{
            header('location:index.php?update_msg=UPDATE SUCCESSFUL!');
            // echo $fename;
            // echo $lename;
            // echo $eage;
            // echo $result;
        }
    }  

?>







<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    
            <div class="form-group m-5 fs-4">
                <label for="f_name">First Name</label>
                <input type="text " name="fe_name" class="form-control " value="<?php echo $row['first_name'] ?>">
            </div>
            <div class="form-group m-5 fs-4">
                <label for="l_name">Last Name</label>
                <input type="text" name="le_name" class="form-control" value="<?php echo $row['last_name'] ?>">
            </div>
            <div class="form-group m-5 fs-4">
                <label for="age">Age</label>
                <input type="number" name="eage" class="form-control" value="<?php echo $row['age'] ?>">
            </div>
            <button type="submit" name="update_students" class="btn btn-primary">Update</button>
</form>











<?php include("footer.php") ?>