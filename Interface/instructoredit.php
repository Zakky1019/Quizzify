<br><br><br>



<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"quizzifynew");

$edit = $_GET['edit'];
$sql = "SELECT * FROM instructor WHERE Instructor_Id = '$edit'";
$run = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($run)){
    $uid =$row['Instructor_Id'];
    $First_Name = $row['FirstName'];
    $Last_Name = $row['LastName'];
    $Username = $row['Username'];
    $Email = $row['Email'];
    
    $Password = $row['Password'];
}

if(isset($_POST['submit']))
{
    $edit = $_GET['edit'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
   
    $Password = $_POST['Password']; // Make sure to use the correct variable name here
    // Assuming $connection is your database connection object
    
    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("UPDATE instructor SET FirstName=?, LastName=?,  Username=?,Email=?, Password=? WHERE Instructor_Id=?");
    
    // Bind parameters
    $stmt->bind_param("sssssi", $First_Name, $Last_Name,  $Username,$Email, $Password, $edit);
    
    if ($stmt->execute()) {
        echo '<script>location.replace("instructor.php")</script>';
    } else {
        echo "Something went wrong: " . $stmt->error;
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instructor Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> 
                        <h1>Edit Instructor Details</h1>
                    </div>
                    <div class="card-body">
                        
                    <form action="" method="post">
                        <label for="">Firstname</label>
                            <input type="text" name="First_Name" class="form-control"  placeholder="Enter UserName"value="<?php echo $First_Name; ?>" readonly>

                            <br>
                            <label for="Lastname">Lastname</label>
                            <input type="text" name="Last_Name" class="form-control"  placeholder="Enter UserName"value="<?php echo $Last_Name; ?>" readonly>

                            <br>
                            <label for="Username">Username:</label>
                            <input type="text" name="Username" class="form-control"  placeholder="Enter UserName"value="<?php echo $Username; ?>" readonly>

                            <br>
                            
                            <label for="Email">Email</label>
                            <input type="text" name="Email" class="form-control"  placeholder="Enter Email"value="<?php echo $Email; ?>" readonly>




                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name ="Password" class="form-control"  placeholder="Enter password" value="<?php echo $Password ?>"> 
                            </div>
                            <br>
                            <input type="submit" class="btn btn-custom" name="submit" value="Edit" style="background-color: #4AA017 ;">

                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>