<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Pizza Central 2 - Shakeys</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }

        img{
          width: 100%;
          height: auto;
          display: block;
          margin-left: auto;
          margin-right: auto;
        }

        .my-container{

        }

        .my-col{
          text-align: center;
          border: 4px black;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">Pizza Central</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="bianos.php">Bianos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shakeys</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="caesars.php">Caesar's</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <a class="btn btn-outline-success my-2 my-sm-0" style="margin-right:10px" href="cart.php">Check your Cart</a>
        <a class="btn btn-outline-success my-2 my-sm-0" href="orders.php">Orders</a>
      </form>
    </div>
  </nav>
</header>

<br>
<br>
<!-- Begin page content -->

<?php require_once 'process.php' ?>

<?php if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  ?>
</div>

<?php endif ?>

<?php
  $mysqli = new mysqli('localhost', 'root', '', 'pc2') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM shakeys") or die($mysqli->error);
  //pre_r($result);
  ?>

<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5" style="text-align: center;">SHAKEYS'S PIZZA</h1>
    <p class="lead" style="text-align: center;">Choose a pizza to add to cart! </p>

  </div>
</main>

<br>
<br>
<div class="container my-container justify content center" >
  <form class="" action="process.php" method="post">
  <?php while ($row = $result->fetch_assoc()): ?>
  <form class="" action="process.html" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row" style="text-align:left;border:none;margin-bottom:10px">
      <div class="col-4">
        <img src="<?php echo $row['picture']; ?>" alt="" style="">
      </div>
      <div class="col" style="height:150px">
        <div class="col text-left">
          <p> <?php echo $row['name']; ?> </p>
        </div>
        <div class="row" style="padding-left:15px">
          <div class="col">
            <p style="font-weight:bold"> Starts at ₱ <?php echo $row['price']; ?></p>
          </div>
          <div class="col-3" style="align-items:right"> 
            <a href="shakeys.php?addtoshakeys=<?php echo $row['id']; ?>" class="btn btn-info">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </form>
</div>
<br>
<br>



<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">All rights reserved</span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
