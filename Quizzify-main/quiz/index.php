<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User view Details</title>
    <link rel="icon" href="quiz.png" type="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<style>
  .btn-success {
    background-color: #4AA017; /* Change to your desired background color */
    color: red; /* Change to your desired text color */
  }
</style>

<body>
    
</body>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card-header">
                    <div class="card-header">
        <h1>User View Details</h1>
    </div>
    <div class="card-body">
        
    <button class="btn btn-success"> <a  class="text-light"> View Details  </a> </button>
     <br/>
     <br/>

    <table class="table">
      <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">FIRST NAME</th><br>
            <th scope="col">LAST NAME</th><br>
            <th scope="col">EMAIL ADDRESS</th>
            <th scope="col">USER NAME</th>
            <th scope="col">PASSWORD</th>
            <th scope="col">OPTION</th>
            

            </tr>
        </thead>
<tbody>
    <?php
     $con=new mysqli('localhost','root','','quizzify');
     if($con){
        echo "connection successfull";
     }else{
        die(mysqli_error($con));
     }
     

     $sql=" select * from user";
     $run=mysqli_query($con,$sql);
     $id=1;

      while($row = mysqli_fetch_array($run))
      
      {
                $uid =$row['User_Id'];
                $First_Name=$row['First_Name'];
                $Last_Name=$row['Last_Name'];
                $Email=$row['Email'];
                $Username =$row['Username'];
                $Password =$row['Password'];
      ?>
    <tr>

         <td><?php echo $uid?></td>
        <td><?php echo $First_Name?></td>
        <td><?php echo $Last_Name?></td>
        <td><?php echo $Email?></td>
        <td><?php echo $Username?></td>
        <td><?php echo $Password?></td>
     <td>
     <button class="btn btn-success">
  <a href='edit.php?edit=<?php echo $uid ?>' class="text-light">Edit</a>
</button>

     <button class="btn btn-danger"> <a href='delete.php?del=<?php echo $uid ?>' class="text-light">Delete </a> </button> 
        

     </td>

      </form>

        
    </tr>
    <?php $id++;}?>
        




    
 </tbody>
</table>
      </div>
</div>

            </div> 
        </div>
    </div>
     
</body>
      </html>