<?php
use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTU Store</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">

  <style>
    h1,h5,p {
      font-family: 'Playfair Display', serif;
    }

    @import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins&display=swap');

    .wrapper {
      background-color: #222;
      min-height: 100px;
      max-width: 800px;
      margin: 10px auto;
      padding: 10px 30px
    }

    .nav.nav-tabs .nav-link.active {
      background-color: #222;
      border: none;
      color: #fff;
      border-bottom: 4px solid #fff
    }

    .table-dark {
      background-color: #222
    }

    #table thead th {
      text-transform: uppercase;
      color: #bbbffb;
      font-size: 12px
    }




    @media(min-width:768px) and (max-width: 991px) {
      .wrapper {
        margin: auto
      }
    }

    @media(min-width: 300px) and (max-width: 767px) {
      .wrapper {
        margin: auto
      }
    }

    @media(max-width: 400px) {
      .wrapper {
        padding: 10px 15px;
        margin: auto
      }
    }
  </style>

</head>

<body class="admin-view">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/dashboard">HTU Store</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
      <div class="d-flex flex-row gap-3">
        <img src="https://www.htu.edu.jo/images/HTU%20Logo200.png" width="40px" height="40px" id="image" class="d-inline-block align-top " alt="">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Services</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <?php if (Helper::check_permission(['item:read'])) : ?>
              <a class="nav-link dropdown-toggle my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Stocks
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">

                  <li><a class="dropdown-item" href="/items">All Stocks</a></li>
                <?php endif;
                if (Helper::check_permission(['item:create'])) :
                ?>
                  <li><a class="dropdown-item" href="/items/create">Add New Stocks</a></li>
              </ul>
            <?php endif;
                if (Helper::check_permission(['user:read'])) :
            ?>
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                
                  <a class="nav-link dropdown-toggle my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Users
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">


                    <li><a class="dropdown-item" href="/users">All Users</a></li>

                  <?php endif;
                if (Helper::check_permission(['user:create'])) :
                  ?>
                    <li><a class="dropdown-item" href="/users/create">Add User</a></li>
                  </ul>
                  
                  <?php endif;
                    if (Helper::check_permission(['transaction:create'])) :
                    ?>
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <a class="nav-link dropdown-toggle my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Selling
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="/transactions/create">Add Transactions</a></li>
                    </ul>
                  </ul>

                  <?php endif;
                    if (Helper::check_permission(['transaction:read'])) : ?>
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  
                    <a class="nav-link dropdown-toggle my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Transactions
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                   
                      <li><a class="dropdown-item" href="/transactions">All Transactions</a></li>

                    <?php endif; ?>
                    </ul>

                </ul>
            </li>
          </ul>
        </div>
  </nav>

  <div class="d-flex flex-column justify-content-center align-items-center gap-5">
    <div class="container my-5">



    