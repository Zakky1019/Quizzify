<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"quizzify");

$edit = $_GET['edit'];
$sql = "SELECT * FROM user WHERE User_Id = '$edit'";
$run = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($run)){
    $uid =$row['User_Id'];
    $First_Name = $row['First_Name'];
    $Last_Name = $row['Last_Name'];
    $Email = $row['Email'];
    $Username = $row['Username'];
    $Password = $row['Password'];
}

if(isset($_POST['submit']))
{
    $edit = $_GET['edit'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Email = $_POST['Email'];
   
    $Password = $_POST['Password']; // Make sure to use the correct variable name here
    // Assuming $connection is your database connection object
    
    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("UPDATE user SET First_Name=?, Last_Name=?, Email=?, Username=?, Password=? WHERE User_Id=?");
    
    // Bind parameters
    $stmt->bind_param("sssssi", $First_Name, $Last_Name, $Email, $Username, $Password, $edit);
    
    if ($stmt->execute()) {
        echo '<script>location.replace("index.php")</script>';
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
    <title>Edit User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> 
                        <h1>Edit User Details</h1>
                    </div>
                    <div class="card-body">
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label> First Name</label>
                                <input type="text" name="First_Name" class="form-control"  placeholder="Enter first Name" value="<?php echo $First_Name ?>"> 
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="Last_Name" class="form-control"  placeholder="Enter last Name"  value="<?php echo $Last_Name ?>"> 
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name ="Email" class="form-control"  placeholder="Enter Email" value="<?php echo $Email ?>"> 
                            </div>
                            <br>
                            
                            
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