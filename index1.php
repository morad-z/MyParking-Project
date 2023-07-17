<?php
include('config.php');

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php"); // Redirect to the sign-in page
    exit();
}

$query = "SELECT * FROM tbl_216_aps";
$result = mysqli_query($conn, $query);

// Sign out functionality
if (isset($_POST['signout'])) {
    // Clear session data
    session_unset();
    session_destroy();

    header("Location: index.php"); // Redirect to the sign-in page after signing out
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384- 9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5JvoRxTsoB1TGf 0 bubble 1QofQ" crossorigin="anonymous" />
    <!-- //link to javascript file by cdn   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <!-- import bree serif font from google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet" />
    <title>Home Page</title>
  </head>
  <body>
  <h1 >amin MORAD amin </h1>

    <header class="header_index">
      <a id="logo" href="index.php"></a>
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" role="switch" id="darkModeSwitch">
      <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>
    </div>
    <section class="user">
      <section class="elipse"></section>
      <svg id="notificationIcon" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
        class="bi bi-bell" viewBox="0 0 16 16">
        <path
          d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
      </svg>
      <img class="profileImage" src="images/profile_mobile.jpg" alt="">
    </section>
    </header>
    <div id="wrapper_navBar">
      <nav>
        <div class="navbar">
          <div class="container nav-container">
              <input class="checkbox" type="checkbox" name="" id="" />
              <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
              </div>  
            
            <div class="menu-items">
              <li><a href="index.php">Home</a></li>
              <li><a href="upload_aps.php">upload Parking Spot</a></li>
              <li><a href="index.php">show all parkings list</a></li>
              <li><a href="#">logout</a></li>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <main class="main100">
      <section class="menuIconSection_index">
        <svg id="menuIconMobile_index" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
        <button class="btn btn-primary" id="listBtn">List</button>
        <button class="btn btn-secondary">Map</button>
        <form class="d-none d-md-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded" placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
          <span class="input-group-text border-0">
            <i class="fas fa-search"></i>
          </span>
        </form>
      </section>
      <nav class="mainNav_index">
        <ul class="MainNavUl_index">
          <li>
            <a href="index.php">Floors</a>
          </li>
          <li>
            
          </li>
          <li>
            <a href="mainObject.php">Add guest</a>
          </li>
          <li>
            <a href="mainObject.php">Add parking spot</a>
          </li>
        </ul>
      </nav>
      <div class="input-group" id="searchSection">
        <input id="search-input" type="search" class="form-control" placeholder="Search anything...">
      </div>
    </main>
    <h1 class="h1_mobile_list">uploaded parkings </h1>

    <div id="mobileWrapper">
      
            
      <section class="parkingSection_mobile" id="mobile_list">
        <div class="list-group" id="list-tab1" role="tablist">
          <!-- <a class="list-group-item list-group-item-action active" id="sectionA-list-park1-list" data-toggle="list" href="mainObject.php" role="tab">metola 11 , Rmat Gan <small> 11-sep-2022</small></a>
          <a class="list-group-item list-group-item-action" id="sectionA-list-park2-list" data-toggle="list" href="mainObject.php" role="tab">yarkon 31 , Rmat Gan <small> 13-sep-2022</small></a>
          <a class="list-group-item list-group-item-action" id="sectionA-list-park3-list" data-toggle="list" href="mainObject.php" role="tab">yarkon 31 , Rmat Gan <small> 13-sep-2022</small></a>
          <a class="list-group-item list-group-item-action" id="sectionA-list-park4-list" data-toggle="list" href="mainObject.php" role="tab">ehad haam 9, Bat Yam <small> 13-sep-2022</small></a>
          <a class="list-group-item list-group-item-action" id="sectionA-list-park5-list" data-toggle="list" href="mainObject.php" role="tab">jerusalim 45 , Holon <small> 13-sep-2022</small></a> -->
          <a class="list-group-item list-group-item-action" id="sectionA-add" data-toggle="list" href="mainObject.php" role="tab">Add park <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
        </div>
      </section>
      
    </div>
    <div id="wrapper_index">
      <section>
        <nav class="SideNav_index">
          <ul class="SideNaveUl">
            <li>
              <a href="index.php">Floors</a>
            </li>
            <li>
              <a href="index.php">1</a>
            </li>
            <li>
              <a href="index.php">2</a>
            </li>
            <li>
              <a href="index.php">3</a>
            </li>
          </ul>
        </nav>
      </section>
      <section class="parkingSection">
        <span class="SectionName"> SECTION A </span>
        <div class="list-group" id="list-tab2" role="tablist">
        <?php 
                while($row = mysqli_fetch_assoc($result)) { //results are in associative array. keys are cols names
                  $id = $row['id'];
                  echo '<a class="list-group-item list-group-item-action" id="sectionC-list-park2-list" data-toggle="list" href="mainObject.php?id='.$id.'" role="tab">park 2 </a>';
                }
            ?> 


          <a class="list-groupitem list-group-item-action" id="sectionAs-add" data-toggle="list" href="upload_aps.php" role="tab">Add park <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
        </div>
      </section>
      <section class="parkingSection">
        <span class="SectionName"> SECTION B </span>
        <div class="list-group" id="list-tab" role="tablist">
        <?php 
                while($row = mysqli_fetch_assoc($result)) { //results are in associative array. keys are cols names
                  $id = $row['id'];
                  echo '<a class="list-group-item list-group-item-action" id="sectionC-list-park2-list" data-toggle="list" href="mainObject.php?id='.$id.'" role="tab">park 2 </a>';
                }
            ?> 
          <!-- <a class="list-group-item list-group-item-action" id="sectionB-list-park1-list" data-toggle="list" href="mainObject.php" role="tab">park 1 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park2-list" data-toggle="list" href="mainObject.php" role="tab">park 2 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park3-list" data-toggle="list" href="mainObject.php" role="tab">park 3 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park4-list" data-toggle="list" href="mainObject.php" role="tab">park 4 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park5-list" data-toggle="list" href="mainObject.php" role="tab">park 5 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park6-list" data-toggle="list" href="mainObject.php" role="tab">park 6 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park7-list" data-toggle="list" href="mainObject.php" role="tab">park 7 </a>
          <a class="list-group-item list-group-item-action" id="sectionB-list-park8-list" data-toggle="list" href="mainObject.php" role="tab">park 8 </a> -->
          <a class="list-groupitem list-group-item-action" id="sectionB-add" data-toggle="list" href="upload_aps.php" role="tab">Add park <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
        </div>
      </section>
      <section class="parkingSection">
        <span></span>
      </section>
      <section>
        <span class="SectionName"> SECTION C </span>
        <div class="list-group" id="list-tab3" role="tablist">
        <?php 
                while($row = mysqli_fetch_assoc($result)) { //results are in associative array. keys are cols names
                  $id = $row['id'];
                  echo '<a class="list-group-item list-group-item-action" id="sectionC-list-park2-list" data-toggle="list" href="mainObject.php?id='.$id.'" role="tab">park 2 </a>';
                }
            ?> 
          <!-- <a class="list-group-item list-group-item-action" id="sectionC-list-park1-list" data-toggle="list" href="mainObject.php" role="tab">park 1 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park2-list" data-toggle="list" href="mainObject.php" role="tab">park 2 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park3-list" data-toggle="list" href="mainObject.php" role="tab">park 3 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park4-list" data-toggle="list" href="mainObject.php" role="tab">park 4 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park5-list" data-toggle="list" href="mainObject.php" role="tab">park 5 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park6-list" data-toggle="list" href="mainObject.php" role="tab">park 6 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park7-list" data-toggle="list" href="mainObject.php" role="tab">park 7 </a>
          <a class="list-group-item list-group-item-action" id="sectionC-list-park8-list" data-toggle="list" href="mainObject.php" role="tab">park 8 </a> -->
          <a class="list-groupitem list-group-item-action" id="sectionC-add" data-toggle="list" href="upload_aps.php" role="tab">Add park <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
        </div>
      </section>
      
    </div>
    <footer id="footer_index">
    <a href="index.php" id="signout-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left"
          viewBox="0 0 16 16">
          <path
            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
          <path
            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
      </a>
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear-fill"
        viewBox="0 0 16 16">
        <path
          d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
      </svg>
    </footer>

    <!-- Sign out form -->
    <form id="signout-form" action="index1.php" method="POST" style="display: none;">
        <input type="hidden" name="signout" value="1">
    </form>
    <script src="javaScript/index.js"></script>
  </body>
</html>