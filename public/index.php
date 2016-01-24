<?php require_once('../application/start.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Curator v1.0 - C9</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <h1>Curator v1.0</h1>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h3>Developed by: James Druhan</h1>
            </div>
         </div>
         <hr/>
         <div class="row">
            <div class="col-md-12">
               <h4>Selected Language</h4>
               <p><?=$LANG->language;?></p>
            </div>
         </div>
      </div>

      <!-- JavaScript Inserts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>
