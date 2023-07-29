<?php include("header.php") ?>
<?php include("dbcom.php") ?>
 
   <div class="d-flex">
   <h3 class="col-4 mb-4 text-dark">Student Register System</h3>
    <button class="col-2 mb-3 fs-4 offset-6 btn btn-light   bg-primary text-light " data-bs-toggle="modal" data-bs-target="#exampleModal">Add students</button>
   </div>
<table class="table table-hover table-bordered table-striped  border border-secondary border-2 table-rounded-5">
    <thead class="">
        <tr class="table-primary">
            <th>id</th>
            <th>  firstname</th>
            <th>lastname</th>
            <th>age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    
    $query = "select * from `students`";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($sql));
    }else{

        while($row = mysqli_fetch_assoc($result)){
        
        ?>

        
            <tr class="table-light p-3">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success col-4 offset-4 d-flex justify-content-center">Update</a></td>
            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger col-4 offset-4 d-flex justify-content-center">Delete</a></td>
            </tr>
        
            <?php
        }
    }
    
    ?>
       
    </tbody>
</table>

<?php 

if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
}

?>

 <?php 

// if(isset($_GET['insert_msg'])){
//     echo "<h5>".$_GET['insert_msg']."</h5>";
// }

?>


<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5">
    
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_students" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php include("footer.php") ?>