<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/img.png" type="">

  <title> Primary EdHub </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td, {
    text-align: left;
    padding: 8px;
    }

    tr:nth-child() {
    background-color: #f2f2f2;
    }

    th {
    background-color: #4CAF50;
    color: white;
    }
</style>

</head>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Primary EdHub
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.html">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="">Grades <span class="sr-only">(current)</span> </a>
                <div class="grades-dropdown">

                  <div class="grades">
                      <a href="adminIndex.php">GRADE 1</a>
                      <a href="adminIndex.php">GRADE 2</a>
                      <a href="adminIndex.php">GRADE 3</a>
                      <a href="adminIndex.php">GRADE 4</a>
                      <a href="adminIndex.php">GRADE 5</a>
                      <a href="adminIndex.php">GRADE 6</a>
                  </div>
              </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Modules</span>
          </h2>
          <p>
            Explore and Learn
          </p>
          <button class="add-module-button" onclick="location.href='add_module.php'">Add Module</button>
        </div>
        <h2>Filter Modules</h2>
        <form action="adminIndex.php" method="get">
            <label for="filterGrade">Select Grade:</label>
            <select name="filterGrade">
                <option value="">All</option>
                <option value=1>Grade 1</option>
                <option value=2>Grade 2</option>
                <option value=3>Grade 3</option>
                <option value=4>Grade 4</option>
                <option value=5>Grade 5</option>
                <option value=6>Grade 6</option>
            </select>
            <input type="submit" value="Filter">
        </form>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Module Name</th>
                <th>Category</th>
                <th>Grade</th>
                <th>PDF File</th>
                <th>Actions</th>
            </tr>

        <?php
        include 'read.php';
        ?>
        </table>
      </div>
    </div>
  </section>

  <!-- end service section -->


 
  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>