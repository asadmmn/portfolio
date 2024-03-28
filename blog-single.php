<?php

include 'php/connection.php';
if(isset($_GET['cat_id'])){

  $id = $_GET['cat_id'];
  $sql = "SELECT * FROM posts WHERE category_id='$id'";
}else{
  $sql = "SELECT * FROM posts";

}

// Define the number of posts to display per page
$numPerPage = 5;

// Get the current page number from the query string
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

// Calculate the offset for the SQL query
$offset = ($page - 1) * $numPerPage;

// Add the limit and offset to the SQL query
$sql .= " LIMIT $offset, $numPerPage";

?>
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

      <h1 class="logo"><a href="index.php">AQ</a></h1>
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

  <main id="main d-flex">

    <!-- ======= Blog Single Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="post-box">
              <div class="post-thumb">
                <img src="" class="img-fluid" alt="">
              
          <div class="post-meta">
              <?php
      // Connect to the MySQL database
      include 'php/connection.php';
 
      $result = mysqli_query($conn, $sql);

      // Display the posts in a table
      if (mysqli_num_rows($result) > 0) {

        
         
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
                
              </div>
              <div class="article-content">
              
              <p>' . $postDescription . '</p> <button class="btn btn-light" onclick="redirectToReadPost('.$postId.')">Read More</button> </div>
              <ul>
              Posted on ' . $postDate . ' in <a href="blog.php?cat_id='. $postCategory .'">' . $categoryName . '</a>
              </ul>
              </div>';
            
            }
            ?>
</div> <?php
         }
   
      // Display pagination links
   $sqlCount = "SELECT COUNT(*) AS count FROM posts";
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $totalPosts = $rowCount['count'];
   $totalPages = ceil($totalPosts / $numPerPage);
   
   echo '<nav aria-label="Page navigation example">
     <ul class="pagination">';
   
   // Add the previous link if not on the first page
   if ($page > 1) {
     echo '<li class="page-item"><a class="page-link" href="blog-single.php?page=' . ($page - 1) . '">Previous</a></li>';
   }
   
   for ($i = 1; $i <= $totalPages; $i++) {
     if ($i == $page) {
       echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
     } else {
       echo '<li class="page-item"><a class="page-link" href="blog.php?page=' . $i . '">' . $i . '</a></li>';
     }
   }
   
   // Add the next link if not on the last page
   if ($page < $totalPages) {
     echo '<li class="page-item"><a class="page-link" href="blog.php?page=' . ($page + 1) . '">Next</a></li>';
   }
   
   echo '</ul>
   ';
   
   
       
           ?>
   
            <div class="box-comments">
              <div class="title-box-2">
                <h4 class="title-comments title-left">Comments (34)</h4>
              </div>
             </div>
            <div class="form-comments">
              <div class="title-box-2">
                <h3 class="title-left">
                  Leave a Reply
                </h3>
              </div>
              <form class="form-mf">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" class="form-control input-mf" id="inputName" placeholder="Name *" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="email" class="form-control input-mf" id="inputEmail1" placeholder="Email *" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="url" class="form-control input-mf" id="inputUrl" placeholder="Website">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
  
          <div class="col-md-4 aside">
            <div class="widget-sidebar sidebar-search">
              <h5 class="sidebar-title">Search</h5>
              <div class="sidebar-content">
                <form action="search.php">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary btn-search" type="button">
                        <span class="bi bi-search"></span>
                      </button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <div class="widget-sidebar">
              <h5 class="sidebar-title">Recent Post</h5>
              <div class="sidebar-content">
                <ul class="list-sidebar">
                  <li>
                    <a href="#">Atque placeat maiores.</a>
                  </li>
                  <li>
                    <a href="#">Lorem ipsum dolor sit amet consectetur</a>
                  </li>
                  <li>
                    <a href="#">Nam quo autem exercitationem.</a>
                  </li>
                  <li>
                    <a href="#">Atque placeat maiores nam quo autem</a>
                  </li>
                  <li>
                    <a href="#">Nam quo autem exercitationem.</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget-sidebar">
              <h5 class="sidebar-title">categories</h5>
              <div class="sidebar-content">
                <ul class="list-sidebar">
                <?php
          
          include('category_box.php'); ?>  
              </div>
            </div>
            <div class="widget-sidebar widget-tags">
              <h5 class="sidebar-title">Tags</h5>
              <div class="sidebar-content">
                <ul>
                  <li>
                    <a href="#">Web.</a>
                  </li>
                  <li>
                    <a href="#">Design.</a>
                  </li>
                  <li>
                    <a href="#">seo.</a>
                  </li>
                  <li>
                    <a href="#">development</a>
                  </li>
                  <li>
                    <a href="#">php</a>
                  </li>
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">&copy; Copyright <strong>AQ</strong>. All Rights Reserved</p>
            <div class="credits">
       
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>