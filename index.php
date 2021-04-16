<?php
   require 'lib/function.php';
   $conn = db_connect();

   if(!$conn)
   {
       die("Connection Failed :(");
   }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Coding Forum</title>
    <style>
      body{
        background-color: #222430;
      }
      #cat_div{
        background-color: #1B1E27;
      }

      #cat_div h1{
        color: whitesmoke;
      }
      .alert{
        margin: 0;
      }
    </style>

  </head>
  <body>
<?php require 'partials/_header.php'; ?>

<!-- Slider begins here -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slider1.jpg" class="d-block w-100" alt="Slider 1 Pic">
    </div>
    <div class="carousel-item">
      <img src="images/slider2.jpg" class="d-block w-100" alt="Slider 2 pic">
    </div>
    <div class="carousel-item">
      <img src="images/slider3.jpg" class="d-block w-100" alt="Slider 3 pic">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Slider ends here -->

<!-- Category div starts here -->
<div class="container" id="cat_div">
  <h1 class="text-center py-3">Browse Categories</h1>
  <div class="row">
    <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn, $sql);

      $num = mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result))
      { 
        $cat_id = $row['category_id'];
        $title = $row['category_name'];
        $desc = $row['category_description'];
      ?>
        <div class="col-md-4 my-3">
          <div class="card m-auto" style="width: 18rem;">
            <img src="images/card<?php echo $cat_id; ?>.jpg" class="card-img-top" alt="Category pic">
            <div class="card-body">
              <h5 class="card-title"><?php echo $title; ?></h5>
              <p class="card-text"><?php echo substr($desc, 0, 140) . '...'; ?></p>
              <a href="/myForum/threads.php?cat_id=<?php echo $cat_id; ?>" class="btn btn-primary">Explore threads</a>
            </div>
          </div>
        </div>
      <?php } ?>
  </div>
</div>




<?php require 'partials/_footer.php'; ?>
