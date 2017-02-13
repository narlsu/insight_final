<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <!-- <link rel="stylesheet" href="css/foundation.min.css"> -->
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>

  <body>
<div id="outer-cont">
  <div class="background-image">
    <div id="logo-container">
      <img id="logo" src="images/logo.png" alt="Insight Logo">
        
        <nav id="nav-bot" class="row">
  <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>
  <div class="top-bar" id="example-menu">
    <div class="top-bar-left">
      <ul id="bottom" class="vertical medium-horizontal menu" data-dropdown-menu>
        <li class="menu-text">Insight</li>
        <li<?php if($page === "home"):?> class="active nav-links" <?php endif; ?>><a href=".\">Home</a></li>
        <li<?php if($page === "about"):?> class="active nav-links" <?php endif; ?>><a href=".\?page=about">About</a></li> 
                
        <?php if(isset($_SESSION['user_id'])): ?>

          <li<?php if($page === "account"):?> class="active" <?php endif; ?>><a href=".\?page=account"><?= $_SESSION['user_email']; ?></a></li>
          <li<?php if($page === "logout"):?> class="active" <?php endif; ?>><a href=".\?page=logout">Logout</a></li>

        <?php else: ?>

          <li<?php if($page === "login"):?> class="active" <?php endif; ?>><a href=".\?page=login">Login</a></li>
          <li<?php if($page === "register"):?> class="active" <?php endif; ?>><a href=".\?page=register">Register</a></li>

        <?php endif; ?>

      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <li><input class="search-style" type="search" placeholder="Search"></li>
        <li><button type="button" class="button">Search</button></li>
      </ul>
    </div>
  </div>
</nav>


    </div>
  </div>
</div>


 <?php $this->content(); ?>


<!-- Pagination -->
<ul class="pagination" role="navigation" aria-label="Pagination">
  <li class="disabled">Previous <span class="show-for-sr">page</span></li>
  <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
  <li><a href="#0" aria-label="Page 2">2</a></li>
  <li><a href="#0" aria-label="Page 3">3</a></li>
  <li><a href="#0" aria-label="Page 4">4</a></li>
  <li class="ellipsis" aria-hidden="true"></li>
  <li><a href="#0" aria-label="Page 12">12</a></li>
  <li><a href="#0" aria-label="Page 13">13</a></li>
  <li><a href="#0" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
</ul>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/foundation.js"></script>
<script type="text/javascript" src="js/what-input.js"></script>
<script>
    $(document).foundation();

    // var $modal = $('#super-modal');

    // $.ajax('./?page=account')
    //   .done(function(resp){
    //     $modal.html(resp).foundation('open');
    // });
</script>

<?php if(isset($_SESSION['error.post'])): ?>

    <script type="text/javascript">

      $('#super-modal').foundation('open');
    </script>

      <?php endif; ?>

<?php if(isset($_SESSION['privilege']) && $_SESSION['privilege']=== 'admin'): ?>
  <?php if(isset($_GET['page']) && $_GET['page']=== "travel.edit" && isset($_GET['id'])): ?>

    <script type="text/javascript">

      $('#super-modal').foundation('open');
    </script>

      <?php endif; ?>
<?php endif; ?>
 
</body>


 





