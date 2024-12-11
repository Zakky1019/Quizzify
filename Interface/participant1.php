<!DOCTYPE html>

<html>
    

<head>
    <title>participant information</title>
    <link rel="stylesheet" type="text/css" href="../Interface/css_files/participant3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dualuser</title>
    <link rel="icon" href="quiz.png" type="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<!-- Navigation Bar -->

<header id="header">
<link rel="stylesheet" href="../Interface/css_files/header.css">

  <nav>
    
      <div class="logo"><img src="quizzify1.png" alt="logo"></div>
     
      <ul>
          <li><a class="active" href="">Home</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="#about_section">About us</a></li>
          <li><a href="#team_section">Team</a></li>
          
      </ul>
      <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="search.png"search" onclick=slide()></div>
      
      <img src="img/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
  </nav>
  <div class="head-container">
     
     
  </div>
  <div class="side-menu" id="side-menu">
      <div class="close" onclick="sideMenu(1)"><img src="img/close.png" alt=""></div>
      
      <ul> <a class="active" href="">Home</a></li>
          <li><a href="../../QuizCreation/quiz.php">Quiz</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="#about_section">About us</a></li>
          <li><a href="#team_section">Team</a></li>
          
      </ul>
  </div>
</header>
<body>

    <section>
        <div class="sidebar">
            <h1 class="logo">Admin Dashboard</h1>

            <center>
                <div>
                    <img src="user.png" class="dp">
                </div>
                <br>
                <div class="name">
                    <h3>Hi! Admin</h3>
                </div>
                <br>
            </center>

            <ul class="nav">
                <li><a href="index.html"><i class="fa fa-windows"></i> Dashboard</a></li>
                <li><a href="dualuser1.php"><i class="fa-regular fa-user"></i> Dualuser</a></li>
                <li><a href="participant1.php"><i class="fa-regular fa-user"></i> Participant</a></li>
                <li><a href="instructor.php"><i class="fa-regular fa-user"></i> Instructor</a></li>
                
                <li><a href="quizview.php"><i class="fa-solid fa-question"></i> Quiz</a></li>
                <li><a href="#"><i class="fa-solid fa-newspaper"></i> Blogs</a></li>


            </ul>

        </div>
        <div class="main">

            <div class="head-section">
                <div class="col-6">
                    <h2>Participant Informations</h2>

                </div>

                <div class="col-6" style="text-align: right;">


     
                    <img src="logout.png" class="user">

               <div class="profile-div">
    <!-- <p><i class="fa fa-user"></i> Profile</p> -->
    <p><a href="index.html"><i class="fa fa-power-off"></i> Log Out</a></p>
</div>

                </div>

                <div class="clearfix"></div>
            </div>
            

            <br><br>
            <div class="content">
                <p></p><br><br><div class="card-body">

<table class="table">
  <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">FirstName</th><br>
        <th scope="col">LASTNAME</th><br>
        <th scope="col">USERNAME</th>
        <th scope="col">EMAILADDRESS</th>
        
        <th scope="col">PASSWORD</th>
        <th scope="col">OPTION</th>
        

        </tr>
    </thead>
<tbody>
    
<?php
         $con=new mysqli('localhost','root','','quizzifynew');
         if($con){
            echo "";
         }else{
            die(mysqli_error($con));
         }
         
    
         $sql=" select * from participant";
         $run=mysqli_query($con,$sql);
         $id=1;
    
          while($row = mysqli_fetch_array($run))
          
          {
                    $uid =$row['Participant_Id'];
                    $First_Name=$row['FirstName'];
                    $Last_Name=$row['LastName'];
                    $Username =$row['Username'];
                    $Email=$row['Email'];
                    
                    $Password =$row['Password'];
          ?>
        <tr>
    
             <td><?php echo $uid?></td>
            <td><?php echo $First_Name?></td>
            <td><?php echo $Last_Name?></td>
            <td><?php echo $Username?></td>
            <td><?php echo $Email?></td>
            
            <td><?php echo $Password?></td>
         <td>
         <button class="btn btn-success">
      <a href='participantedit.php?edit=<?php echo $uid ?>' class="text-light">Edit</a>
    </button>
    
         <button class="btn btn-danger"> <a href='participant delete.php?del=<?php echo $uid ?>' class="text-light">Delete </a> </button> 
            
    
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




        <main>
</main>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(".user").click(function () {
            $(".profile-div").toggle(1000);
        });
        
    });





</script>


</body>

</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<!-- FOOTER -->
<footer>
  <link rel="stylesheet" href="../Interface/css_files/footer.css">
  <div class="footer-container">
    <div class="left-col">
      <img src="img/QUIZZIFY.png" style="width: 200px;">
      <div class="logo"></div>

      <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
      <br>
      <p><img src="img/location.png"> Passara Road, Badulla</p><br>
      <p><img src="img/phone.png"> 055-222-4446<br>
      <!-- <p><img src="../../images/icon/mail.png">&nbsp; </p> -->
    </div>
    <div class="right-col">
      <h1 style="color: #fff">Our Newsletter</h1>
      <div class="border"></div><br>
      <p>Enter Your Email to get our News and updates.</p>
      <form class="newsletter-form">
        <input class="txtb" type="email" placeholder="Enter Your Email">
        <input class="btn" type="submit" value="Submit">
      </form>
    </div>
  </div>
</footer>
