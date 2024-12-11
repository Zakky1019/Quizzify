<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Instructor Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
      <style>
          body {
  margin: 0;
  padding: 0;
  background-color:#808080;
  color: #9e9ea4;
  font-family: 'Montserrat', sans-serif;
}

.material-icons-outlined {
  vertical-align: middle;
  line-height: 1px;
  font-size: 35px;
}

.grid-container {
  display: grid;
  grid-template-columns: 260px 1fr 1fr 1fr;
  grid-template-rows: 0.2fr 3fr;
  grid-template-areas:
    'sidebar header header header'
    'sidebar main main main';
  height: 100vh;
}

/* ---------- HEADER ---------- */
.header {
  grid-area: header;
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px 0 30px;
  box-shadow: 0 6px 7px -3px rgba(0, 0, 0, 0.35);
}

.menu-icon {
  display: none;
}

/* ---------- SIDEBAR ---------- */

#sidebar {
  grid-area: sidebar;
  height: 100%;
  background-color: #4AA017;
  overflow-y: auto;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
}

.sidebar-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 30px 30px 30px 30px;
  margin-bottom: 30px;
  background-color: #ffffff;
}

.sidebar-title > span {
  display: none;
  
}

.sidebar-brand {
  margin-top: 15px;
  font-size: 20px;
  font-weight: 700;
  
}

.sidebar-list {
  padding: 0;
  margin-top: 15px;
  list-style-type: none;
}

.sidebar-list-item {
  padding: 20px 20px 20px 20px;
  font-size: 18px;
}

.sidebar-list-item:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
}

.sidebar-list-item > a {
  text-decoration: none;
  color: #ffffff;
}

.sidebar-responsive {
  display: inline !important;
  position: absolute;
  /*
    the z-index of the ApexCharts is 11
    we want the z-index of the sidebar higher so that
    the charts are not showing over the sidebar 
    on small screens
  */
  z-index: 12 !important;
}

/* ---------- MAIN ---------- */

.main-container {
  grid-area: main;
  overflow-y: auto;
  padding: 20px 20px;
  color: #ffffff;
}

.main-title {
  display: flex;
  justify-content: space-between;
   color: #000000;
}

.main-cards {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 20px;
  margin: 20px 0;
}

.card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 25px;
  border-radius: 5px;
}

.card:first-child {
  background-color: #2962ff;
}

.card:nth-child(2) {
  background-color: #2962ff;
}


.card:nth-child(3) {
  background-color: #2962ff;
}

.card:nth-child(4) {
  background-color: #2962ff;
}


.card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-inner > .material-icons-outlined {
  font-size: 45px;
  
}

.charts {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  margin-top: 60px;
}

.charts-card {
  background-color: #263043;
  margin-bottom: 20px;
  padding: 25px;
  box-sizing: border-box;
  -webkit-column-break-inside: avoid;
  border-radius: 5px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}

.chart-title {
  display: flex;
  align-items: center;
  justify-content: center;
}

/* ---------- MEDIA QUERIES ---------- */

/* Medium <= 992px */

@media screen and (max-width: 992px) {
  .grid-container {
    grid-template-columns: 1fr;
    grid-template-rows: 0.2fr 3fr;
    grid-template-areas:
      'header'
      'main';
    
  }

  #sidebar {
    display: none;
  }

  .menu-icon {
    display: inline;
  }

  .sidebar-title > span {
    display: inline;
  }
}

/* Small <= 768px */

@media screen and (max-width: 768px) {
  .main-cards {
    grid-template-columns: 1fr;
    gap: 10px;
    margin-bottom: 0;
    
  }

  .charts {
    grid-template-columns: 1fr;
    margin-top: 30px;
  }
  

}

/* Extra Small <= 576px */

@media screen and (max-width: 576px) {
  .hedaer-left {
    display: none;
  }
}

      </style>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined"></span> Quizzify
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
               Customize Quiz
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
               Start and terminate Quiz attempts
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
                
              Manage Participants
              
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
             Manage Question and Scores
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
            </a>
          </li>
          
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2> Instructor </h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner" id="addQuizButton">
            <h2><a href="http://localhost/Quizzify/Quizzify/public_html/addquiz.php" style="color: white;">Add Quiz</a></h2>
                
              <span class="material-icons-outlined"></span>
              
             <script>
             document.addEventListener("DOMContentLoaded", function() {
    
             const addQuizButton = document.getElementById("addQuizButton");
    
            addQuizButton.addEventListener("click", function() {
            window.location.href = "addquiz.html"; 
            });
            });
            </script>
            </div>
            
          </div>

       

            <div class="card">
            <div class="card-inner">
                
              <h2>Quiz Analysis</h2>
              <span class="material-icons-outlined">poll</span> 
            </div>
            
          </div>
           
          <div class="card">
            <div class="card-inner">
                
                
              <h2>ALERTS</h2>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>56</h1>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Ratings and Reviews
</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">View Blogs</h2>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>