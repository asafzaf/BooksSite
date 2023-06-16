<?php 
    include 'db.php';
    include 'config.php';

    session_start();//on logout session_destroy();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/css_pack.css">
    <title>Asaf's Books Shop</title>
</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Asaf's Book Shop</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Select Category
          </a>
          <ul class="dropdown-menu" id="nav-place">
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">All</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search For Book" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>
<body>
    <div class="container">
        <div class="container text-center d-flex">
            <div class="row g-2">
                <?php
                    if(empty($_POST["category"])) {
                        $query = "SELECT * FROM tbl_93_books";
                
                    }
                
                    if(!empty($_POST["category"])) { //true if form was submitted
                
                        $query  = "SELECT * FROM tbl_93_books WHERE category='" 
                
                        . $_POST["category"] 
                
                        ."'";
        
                    }

                    $result = mysqli_query($connection, $query);
                
                        if($result->num_rows > 0) {
                            while($row = mysqli_fetch_array($result)) {
                                echo '<div class="col-6">
                                <div class="p-3">' . $row["name"] . " // " . $row["author_name"] . '</div>
                              </div>';
                            }
                        }
                ?>
              <div class="col-6">
                <div class="p-3">Custom column padding</div>
              </div>
              
            </div>
          </div>
    </div>
    <script src="./js/getbookscategories.js"></script>
</body>
</html>