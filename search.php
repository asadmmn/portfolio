<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AQ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">DevFolio</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#work">Work</a></li>
          <li><a class="nav-link scrollto " href="#blog">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div class="hero hero-single route bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="hero-title mb-4">Blog Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Library</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <main id="main">

    <!-- ======= Blog Single Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="post-box">
              <div class="post-thumb">
                <img src="" class="img-fluid" alt="">
              </div>
              <div class="post-meta">

<?php
include('php/connection.php');
// Define number of records per page
$recordsPerPage = 6;

// Determine current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $recordsPerPage;



// Query to retrieve posts
if (isset($_POST['query'])) {
  $query = $_POST['query'];
  $sql = "SELECT * FROM posts WHERE post_title LIKE '%$query%' OR post_content LIKE '%$query%' ORDER BY created_at DESC";
} else {
  $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $offset, $recordsPerPage";
}
$result = $conn->query($sql);

// Display posts
if ($result->num_rows > 0) {
    
         
          while ($row = mysqli_fetch_assoc($result)) {
              $postId = $row['id'];
              $postTitle = $row['post_title'];
              $string  = $row['post_content'];
             
                     // Split the string into an array of words
                   $words = explode(' ', $string);

                   // Slice the array to the first 100 words
                   $sliced_words = array_slice($words, 0, 100);

                    // Join the sliced words back into a string
                   $postDescription = implode(' ', $sliced_words)."...";

              $postCategory = $row['category_id'];
              $postDate = $row['created_at'];

              // Retrieve the category name for the post
              $sql2 = "SELECT * FROM category_table WHERE id = $postCategory";
              $result2 = mysqli_query($conn, $sql2);
              $categoryName = "";
              if (mysqli_num_rows($result2) > 0) {
                $row2 = mysqli_fetch_assoc($result2);
                $categoryName = $row2['category'];


              }

              echo '
     
                <h1 class="article-title">' . $postTitle. '</h1>
                <ul>
                Posted on ' . $postDate . ' in <a href="blog.php?cat_id='. $postCategory .'">' . $categoryName . '</a>
                </ul>
              </div>
              <div class="article-content">
              <p>' . $postDescription . '</p> <button class="btn btn-light" onclick="redirectToReadPost('.$postId.')">Read More</button> </div>
            </div>';
            
            }
            ?>
</div> 
  <?php
} else {
  echo "<tr><td colspan='3'>No Data Found</td></tr>";
}

?>