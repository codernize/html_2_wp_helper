<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages</title>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body style="    background: #2E2E2E;">
    <div class="row">
      <div class="large-12 columns">
        <div style="
    padding: 20px 30px;
    background: #4A64A3;
    border-radius: 3px;
    margin-top: 20px;
    /* box-shadow: 0 0 5px #2C3856; */
    border: 2px solid #3B5CAC;
">
            <p class="text-center"><img src="images/logo.png" alt=""></p>
            <div class="row">
              
          <?php 

          $files = scandir(dirname(__FILE__));
          foreach ($files as $i => $name) {
            if (strlen($name) > 4) {
              if (substr($name, -4) == '.php' && substr($name, 0,1) != '_' && $name != 'index.php') {
                $show_name = ucfirst(str_replace(array('_','-'), array(' ',' '), substr($name, 0,-4)));
                ?>
                <div class="columns small-6 medium-4 large-3"><a href="<?php echo $name ?>" class="button expanded" target="_blank" ><?php echo $show_name ?></a></div>
                <?php
              }
            }
          }
           ?>
            </div>
          
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="large-12 columns">
      </div>
    </div>

    

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/what-input/what-input.js"></script>
    
    <script src="js/app.js"></script>
  </body>
</html>
