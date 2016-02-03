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
               <table class="table table-striped table-bordered">
                  <th>#</th>
                  <th>Varible</th>
                  <th>Value</th>

                  <tr>
                     <td>1</td>
                     <td>Curator Language</td>
                     <td><?=$LANG->language;?></td>
                  </tr>

                  <tr>
                     <td>2</td>
                     <td>Session ID</td>
                     <td><?=session_id()?></td>
                  </tr>

                  <tr>
                     <td>2</td>
                     <td>$_SESSION['Curator_userAgent']</td>
                     <td><?=$_SESSION['Curator_userAgent']?></td>
                  </tr>

                  <tr>
                     <td>4</td>
                     <td>$_SESSION['Curator_Status']</td>
                     <td><?=$_SESSION['Curator_Status']?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>$_SESSION['Curator_startTime']</td>
                     <td><?=(date("i:s", time() - $_SESSION['Curator_startTime']))?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>$_SESSION['Curator_idleTime']</td>
                     <td><?=(date("i:s", time() - $_SESSION['Curator_idleTime']))?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>Timeout Setting</td>
                     <td><?=(date("i:s", Curator\Config\SESSION\TIMEOUT))?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>$_SESSION['Curator_regenTime']</td>
                     <td><?=(date("i:s", time() - $_SESSION['Curator_regenTime']))?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>Timeout Setting</td>
                     <td><?=(date("i:s", Curator\Config\SESSION\ID\REGENERATE\TIME))?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>$_SESSION['Curator_userKey']</td>
                     <td><?=$_SESSION['Curator_userKey']?></td>
                  </tr>

                  <tr>
                     <td>5</td>
                     <td>TIME()</td>
                     <td><?=(time())?></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <!-- JavaScript Inserts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>
