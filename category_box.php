
  <?php
  // Connect to the MySQL database
  include 'php/connection.php';
  // Retrieve all categories from the "categories" table
  $sql3 = "SELECT * FROM category_table";
  $result = mysqli_query($conn, $sql3);

  // Display the categories in a list
  if (mysqli_num_rows($result) > 0) {
    while ($r = mysqli_fetch_assoc($result)) {
      $categoryId = $r['id'];
      $category_Name = $r['category'];
      echo '<li><a href="blog-single.php?cat_id=' . $category_Name. '">' . $category_Name . '</a></li>';
    }
  } else {
    echo 'No categories found.';
  }


  
      ?>
  