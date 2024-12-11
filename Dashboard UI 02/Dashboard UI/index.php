
<!DOCTYPE html>
<html>

<head>
  <title>Instructor Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <section>
    <div class="sidebar">
      <h1 class="logo">Instructor Dashboard</h1>

      <ul class="nav">
        <li> <a href="#"><i class="fa fa-windows"></i> Dashboard</a></li>
        <li><a href="AddQuiz.php"><i class="fa fa-pie-chart"></i> Add Quiz</a></li>
        <li><a href="manageQuiz.php"><i class="fa fa-cube"></i> Manage Quiz</a></li>
        <li><a href="#"><i class="fa fa-tag"></i> View Results</a></li>
      </ul>
    </div>

    <div class="main">
      <div class="head-section">
        <div class="col-6">
          <h2>Quiz Results analysis</h2>
        </div>

        <div class="col-6" style="text-align: right;">
          <img src="user.png" class="user">
          <div class="profile-div">
            <p><i class="fa fa-user"></i> Profile</p>
            <p><i class="fa fa-power-off"></i> Log Out</p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <br><br>

      
      <div class="content">
        <p>All participant's results</p><br><br>

        <table>

          <thead>
            <tr>
              <th scope="col" width="50px">Quiz ID</th>
              <th scope="col" width="100px">Participant Name</th>
              <th scope="col" width="290px">Exam Name</th>
              <th scope="col">Score</th>
              <th scope="col">Status</th>
              <th scope="col" width="70px">Action</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td data-label="Account">#3412</td>
              <td data-label="Due Date"><img src="user.png" class="tab-img">Manoj</td>
              <td data-label="Amount">Php</td>
              <td data-label="Period">04</td>
              <td data-label="Amount" style="position: relative;"><span class="pe"></span>week</td>
              <td data-label="Period"><i class="fa fa-pencil" aria-hidden="true"></i>

                <i class="fa fa-trash" aria-hidden="true"></i>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
    </div>
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

  

</body>
</html>