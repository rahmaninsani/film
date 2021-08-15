<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL; ?>/assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="<?= BASEURL; ?>/assets/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="<?= BASEURL; ?>/assets/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="<?= BASEURL; ?>/assets/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="<?= BASEURL; ?>/assets/slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css" />
    <!-- Theme styles -->
    <link href="<?= BASEURL; ?>/assets/css/dot-icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASEURL; ?>/assets/css/theme.css" rel="stylesheet" type="text/css" />
    <title><?= $data['title']; ?></title>
  </head>
  <body class="body">
    <header class="header header-horizontal header-view-pannel">
      <div class="container">
        <nav class="navbar sticky-top">
          <button class="navbar-toggler" type="button">
            <span class="th-dots-active-close th-dots th-bars">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </button>
          <div class="navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
            </ul>
            <form action="<?= BASEURL; ?>/home/cari" method="POST" class="form-inline my-2 my-lg-0 ml-auto">
              <input type="text" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Cari" autocomplete="off">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Cari</button>
            </form>
          </div>
        </nav>
      </div>
    </header>