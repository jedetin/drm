<?php
  $id = $_POST['id'];
  $choice = $_POST['choice'];
  $code = $_POST['code'];
  $crypt = $_POST['crypt'];
  
?>
<html>
    <head><title>Reader Accesss</title>
        <link rel="stylesheet" href="style/form.css" type="text/css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div class="flex-container">
            <div class="content-container">
              <div class="form-container">
              <h3 style="color:green;"> Code successfully generated               </h3>
                  <p> Please store the access code and <br> the email used for future references<p>
                    <p>
                    <?php
                      echo "email Id: ".$id."<br>";
                      echo "Book choice: ".$choice."<br>";
                      echo "access code: ".$code."<br>";
                      //echo "crypt text: ".$crypt."<br>";
                    ?>
                  </p>
                  
                <p class="subtitle">
                  <a id="download_link" download="<?php echo $code; ?>.txt" href="" style="color:red">Download as Text File</a>  
                  <script>
                    var text = "Access Code: <?php echo $code;?>";
                  </script>                  
                </p>
              </div>
            </div>
          </div>
</body>
<script src="js/download.js"></script>
</html>
