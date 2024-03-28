<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AQ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">AQ</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
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


 <?php
if(isset($_SESSION['status'])){ echo '<div class="alert alert-success" role="alert">Post Created successfully!</div>';}
?>

<title>Create Post Page</title>
</head>

<h2 style="text-align:center; margin-top:50px;">
Create New Post
</h2>

<body>
<div class="d-flex justify-content-center mt-5">
    <form method="post" action="store.php" class="p-3 mb-2 bg-light text-dark shadow" style="width: 50%;">
        <input type="hidden" id="date" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
       
       
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter the Title">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-select" id="category" name="category">
                
                // Add an option to select a new category
                <option disabled selected>---Select a category---</option>
                <option value="web design">web design</option>
                <option value="web development">web development</option>
                <option value="SEO">seo</option>
            </select>
        

        <div class="form-group">
            <label">Article</label>
            <textarea class="form-control" id="content" name="article"> </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div></div>

<script>
    CKEDITOR.replace('content');
</script>

</body>
</html>
