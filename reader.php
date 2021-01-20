
<?php
  $access = $_POST['code'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DRM book Reader 1.0</title>
<link rel="stylesheet" href="style/style.css" type="text/css" >
        <script language="JavaScript" type="text/javascript" src="cryptico/jsbn.js"></script>
        <script language="JavaScript" type="text/javascript" src="cryptico/random.js"></script>
        <script language="JavaScript" type="text/javascript" src="cryptico/hash.js"></script>
        <script language="JavaScript" type="text/javascript" src="cryptico/rsa.js"></script>
        <script language="JavaScript" type="text/javascript" src="cryptico/aes.js"></script>
        <script language="JavaScript" type="text/javascript" src="cryptico/api.js"></script>
        <?php include 'data.php';?>
        
</head>

<body>
    <!--   HTML: TOP HEADER   -->
    <div class="top">DRM reader v1.0 
      <button id="switch" style="float: right;" class="btn">Dark</button>
    </div>
<!-- HTML START OF CONTAINER -->    
<div class="back" id="back"> 
  <!-- SIDE NUMBERING DIV-->
  <div class="side" id="side"></div>
  <!-- HIDDEN VAL :  CONTAINS THE OUTPUT OF DECRYPTION-->
    <input type="hidden" id="hiddenVar">
    <!-- CANVAS FOR IMAGE OUTPUT-->
    <div style="min-width: 500px;">
      <canvas id="canv"></canvas>
    </div>
    <!-- IMAGE OUTPUT CANVAS-->
    <img id="image" style="visibility: hidden;"/>
  <script>
  
    //  CLIENT SIDE KEY GENERATION START
    
        var PassPhrase = "<?php echo $access; ?>"; //READ FORM POST VALUE
        var Bits = 512;
        var MattsRSAkey = cryptico.generateRSAKey(PassPhrase, Bits);  //CLIENT PRIV KEY
        var MattsPublicKeyString = cryptico.publicKeyString(MattsRSAkey); //CLIENT PUB KEY      
        
      // Book plaintext encrypted === REPLACED PlainText AND EncryptionResult
      // To be replaced with DB fetch result
        var EncryptionResult = "OftyTHynfCDz1rwT9QYscbXKzs/0SZBWodokFYUEWllHtd0E+c/36/86lYtQsVtbqRQhrRdLaqv6VKX7R8PtaQ==?enIEDaMDBOL1wDy5YBI1+ZeKIJuZjcR+7gNpFM6834ZpAG/lFgoNfBMtWxqZonZu2dPRlUtodwXUPAaGGUXvUSBh9xE5qCS98YyrHRGyTNdR3LkpX8Xiy3PzWilYWXf3Q3byZlD4H9yDUmHnWQGwB0KUExTHAN8slDWRe7p0yrVtUgOw4+pMmhCx+gTeye7rVp8w5dPn7XVSSCpSFPa4xs9YeW03oJ4/Cewh9rq7txbeLjPyPuzU4MmkJM0G3s3VtGS+FJSf8z8X7/OOF38EsEb35DA3/9TMmWHZE7664xOW0eD90ZDFFPDFQb6N/1HRhWAZFZczJhgu5MlKeXC427FRspvN3yaIQLAnmF0ONqUlln4CzyKinV72JeKC+Rh0yKlFcfK5TXeoJWmg1XSsi+BHX2i0Jc04EVEGYUZ5Yfck4YEOVIYZKBJF85OTUdnLXjdgTxTtUFGKV2UCJ8MFE9NeOmtFCA1pSuNnNkTzLf0lsTm944ZdxRB3RWUOYe/6v5JMmYx+kGXe6RfnPeSEeKME3EMd9krOBuHSYo8whrK0+D165GYBiwWuqAPxEgq+yMq8E9fjffDgaGHFBlFJ86uxjg5bs2dRrBzk1FBYHlg=";
        
      //  DECRYPTION USING GENERATED KEY BY USER INPUT
        var DecryptionResult = cryptico.decrypt(EncryptionResult, MattsRSAkey);
      
      

      // Decryption output  
      if(DecryptionResult.status =="failure"){
        document.getElementById("back").innerHTML = "Decryption Access Grant: " + DecryptionResult.status;
      }
      else if(DecryptionResult.status =="success"){
        document.getElementById("hiddenVar").value = DecryptionResult.plaintext;
        //document.write(DecryptionResult.plaintext);
      }
      else{
        alert("Failed to load. Please contact support")
      }
  
</script>
    </div>
    <!-- ALTER : REP FOR TEXT-IMAGE GENERATION-->
    <script src="alter/scripts.js"></script>
</body>
<script>
    $(document).ready(function(){
  $("div").on("click", "button", function(event){
    $(event.delegateTarget).css("background-color", "black");
    $(event.delegateTarget).css("color", "white");
  });
});
</script>

<script src="js/line.js"></script>
<script src="js/afunctions.js"></script>
</html>
