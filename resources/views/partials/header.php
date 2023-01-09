<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts --> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">


<style>
@import url('https://fonts.googleapis.com/css2?family=Secular+One&display=swap');
h2,p{
    font-family: 'Playfair Display', serif;}
body {
  font-family: Assistant, sans-serif;
}
.login {
  color: white;
  background: #136a8a;
  background: 
    -webkit-linear-gradient(to right, #267871, #136a8a);
  background: 
    linear-gradient(to right, #267871, #136a8a);
  margin: auto;
  margin-top: 150px;
  box-shadow: 
    0px 2px 10px rgba(0,0,0,0.2), 
    0px 10px 20px rgba(0,0,0,0.3), 
    0px 30px 60px 1px rgba(0,0,0,0.5);
  border-radius: 8px;
  padding: 50px;
  width: 400px;
}
.login .head {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
}
.login .head .company {
  font-size: 2.2em;
}
.login .msg {
  text-align: center;
  vertical-align: text-bottom;
}
.login .form input[type=text].text{
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
}
button{
margin-left: 50px;

}
.login .form .text::placeholder {
  color: #D3D3D3;
}
.login .form input[type=checkbox].checkbox {
  margin-bottom: 20px;
  margin-top: 20px;

}

.login .form input[type=password].password {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
  margin-bottom: 20px;
  margin-top: 20px;
}
.login .form .password::placeholder {
  color: #D3D3D3;
}

.login .form .btn-login {
  background: none;
  text-decoration: none;
  color: white;
  box-shadow: 0px 0px 0px 2px white;
  border-radius: 3px;
  padding: 5px 2em;
  transition: 0.5s;
}
.login .form .btn-login:hover {
  background: white;
  color: dimgray;
  transition: 0.5s;
}

img {
  margin-right: 0px;
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

<body>


    <nav class="navbar navbar-expand-lg bg-secondary text-dark bg-opacity-25">
        <div class="container-fluid d-flex gap-2">
            <a class="navbar-brand" href="">HTU Store</a>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <img src="https://www.htu.edu.jo/images/HTU%20Logo200.png" width="40px" height="40px" class="d-inline-block align-top" alt="">

            </div>
        </div>
    </nav>

    <div class="container my-5">