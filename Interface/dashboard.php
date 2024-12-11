<!DOCTYPE html>

<html>



<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../Interface/css_files/dashboard.css">
    <!-- Navigation Bar -->

<header id="header">
<link rel="stylesheet" href="../Interface/css_files/header.css">

  <nav>
    
      <div class="logo"><img src="quizzify1.png" alt="logo"></div>
     
      <ul>
          <li><a class="active" href="">Home</a></li>
          <li><a href="../blog/index.php">Blog</a></li>
          <li><a href="#about_section">About us</a></li>
          <li><a href="#team_section">Team</a></li>
          
      </ul>
      <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="search.png"search" onclick=slide()></div>
      
      <img src="img/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
  </nav>
  <div class="head-container">
     
     
  </div>
    
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
   


</head>

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
                <li><a href="#"><i class="fa fa-windows"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa-regular fa-user"></i> User</a></li>
                <li><a href="#"><i class="fa-solid fa-question"></i> Quiz</a></li>
                <li><a href="#"><i class="fa-solid fa-newspaper"></i> Blogs</a></li>


            </ul>

        </div>
        <div class="main">

            <div class="head-section">
                <div class="col-6">
                    <h2>participant / Instructor Informations</h2>

                </div>

                <div class="col-6" style="text-align: right;">



                    <img src="logout.png" class="user">

                    <div class="profile-div">
                        <!-- <p><i class="fa fa-user"></i>   Profile</p> -->
                        <p><i class="fa fa-power-off"></i> Log Out</p>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>

            <br><br>







 










      



           
            
                    




    
    
</div>


     </td>

      </form>

        
    </tr>
    


    
 </tbody>
</table>
</div>
</div>

            </div> 
        </div>
    </div>
    <main>
    </section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(".user").click(function () {
            $(".profile-div").toggle(1000);
        });
        $(".hicon:nth-child(1)").click(function () {
            $(".notification-div").toggle(1000);
        });
        $(".sicon").click(function () {
            $(".search").toggle(1000);
        });
    });
</script>

<script type="text/javascript">
    $('li').click(function () {
        $('li').removeClass("active");
        $(this).addClass("active");
    });




</script>
<br>
<br><br>
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
<br><br>
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
</body>

</html>