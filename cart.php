<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Pizza Central 2 - Cart</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- php -->


    <!-- styles -->
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
          <a class="nav-link" href="shakeys.php">Shakeys</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="caesars.php">Caesar's</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <a class="btn btn-outline-success my-2 my-sm-0" href="cart.php">Check your Cart</a>
        <a class="btn btn-outline-success my-2 my-sm-0" href="orders.php">Orders</a>
      </form>
    </div>
  </nav>
</header>

<br>
<br>
<!-- Begin page content -->

<?php require_once 'process.php'  ?>

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
  $result = $mysqli->query("SELECT * FROM cart") or die($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM cart") or die($mysqli->error);
  //pre_r($result);
  ?>

  <div class="container my-container justify content center">
    <br>
    <br>
            <div>
              <div>
                <div class="row" style="text-align: center">
                  <div class="col"> <h4> Name </h4></div>
                  <div class="col"><h4> Picture </h4></div>
                  <div class="col"><h4> Price </h4></div>
                  <div class="col"><h4> Amount </h4></div>
                  <div class="col"><h4> Action </h4></div>
                </div>
              </div>
              <br>
              <?php while ($row = $result->fetch_assoc()): ?>
                <form class="" action="process.php" method="post">
                  <div class="row" style="text-align: center">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col" style="text-align: left"> <?php echo $row['name']; ?> </div>
                    <div class="col"> <img src="<?php echo $row['picture']; ?>" alt=""> </div>
                    <div class="col"> <?php echo $row['price']; ?> </div>
                    <div class="form-group col">

                    <?php if ($update == true):?>
                      <div class="col">
                        <div class="row" style="margin: -5px;">
                          <div class="col-10 my-col"  style="margin-right: -15px;">
                              <input type="text" name="amount" class="form-control" value="<?php echo $row['amount'];?>" placeholder="enter amount" style="" >
                          </div>
                          <div class="col-2">
                              <button type="submit" name="changeamount" class="btn btn-info" style="margin-left: -10px;"  >Change</button>
                          </div>
                        </div>
                      </div>
                    <?php else: ?>
                      <div class="col">
                        <a href="cart.php?setamount=<?php echo $row['id']; ?>"> <?php echo $row['amount']; ?> </a>
                      </div>

                    <?php endif; ?>
                    </div>
                    <div class="col" style="margin: -5px;">
                         <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </form>

                <?php endwhile; ?>
            </div>
            <div class="col">
              <br><br>
              <h4>Total: <?php echo $cart_total ?> pesos</h4>
            </div>
  </div>

  <?php
  pre_r($result->fetch_assoc());

  function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }
?>

<div class="container">
  <h3 class="mt-5"> Receipt </h3>

</div>
<br>
<div class="container my-container">
  <div class="">
    <form class="" action="process.php" method="post">
      <?php if ($show_receipt == false):?>
        <a href="orders.php?addtoorders=<?php echo $show_receipt ?>" class="btn btn-info">Checkout</a>
      <?php else: ?>
        <br>
        <div class="row">
          <div class="col-3">  Name  </div>
          <div class="col-2"> Amount </div>
          <div class="col-2"> Price </div>
          <div class="col-5"> </div>
        </div>
        <br>
        <div class="row">
          <?php while ($row = $result1->fetch_assoc()): ?>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="col-3"> <?php echo $row['name']; ?> </div>
            <div class="col-2"> <?php echo $row['amount']; ?> </div>
            <div class="col-2"> <?php echo $row['total']; ?> </div>
            <div class="col-5"> </div>
          <?php endwhile; ?>
        </div>
        <br>

      <?php endif; ?>
    </form>
  </div>
</div>





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
