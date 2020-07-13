<?php
$navItems = [
  'home' => 'Home',
  'test' => 'Test Pagina',
];

$navItemsRight = [
  'registeruser' => 'Registration',
  'login' => 'Login',
];
?>


  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php?page=home">Gray-Savings</a>
      </div>
      <ul class="nav navbar-nav">
        <?php foreach ($navItems as $navItem => $navName) :
        ?>
          <?PHP if(!$navItem){
            header('index.php?page=404');
            } else{?>
          <li><a href="index.php?page=<?php echo $navItem; ?>"><?php echo $navName; ?></a></li>
        <?php }endforeach; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if (isset($_SESSION["loggedinAdmin"]) or isset($_SESSION["loggedin"])) { ?>
        <?php echo $logoutbutton;
        }else{
          foreach($navItemsRight as $navRight => $navName){ ?>
            <li><a href="index.php?page=<?php echo $navRight; ?>"><?php echo $navName; ?></a></li>
          <?php }
        };
        ?>
      </ul>
    </div>
  </nav>