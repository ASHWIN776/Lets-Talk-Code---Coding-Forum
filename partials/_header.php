<?php

  $logged_in = false;
  session_start();

  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
  {
    $logged_in = true;
  }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/myForum/index.php">Lets Talk Code</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/myForum/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <?php
          if($logged_in)
            { ?>

            <p class="text-white m-0 ms-2">Welcome <?php echo $_SESSION['username']; ?></p>
          <?php } ?>
      <div class="ms-2">
        <?php
          if($logged_in)
            { ?>
            <button type="button" class="btn btn-outline-success"><a href="/myForum/partials/_logout.php" style="text-decoration: none; color: white;">Logout</a></button>
          <?php } 
          else { ?>
        <button type="button" class="btn btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>

<?php require '_loginModal.php'; ?>
<?php require '_signupModal.php'; ?>


<!-- Handling redirect from handlesignup.php -->
<?php
  if(isset($_GET['signed_up']))
  { 
    if($_GET['signed_up'])
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account is added, you may login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    
    elseif($_GET['user_exists'])
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Username already exists, try again with a different one. 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Password doesn\'t match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  }
  //  handling invalid creds
  if(isset($_GET['invalid']) && $_GET['invalid'])
  {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Invalid Credentials.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
?>