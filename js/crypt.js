function print(string)
        {
            document.write(string + "\n\n");
        }


        //  CLIENT SIDE KEY GENERATION START
        var PassPhrase = "<?php echo $access; ?>";
        var Bits = 512;
        var MattsRSAkey = cryptico.generateRSAKey(PassPhrase, Bits);
        var MattsPublicKeyString = cryptico.publicKeyString(MattsRSAkey);       
        //  CLIENT SIDE KEY GENERATION COMPLETE
        
        // Book plaintext encrypted === REPLACED PlainText AND EncryptionResult
        var EncryptionResult = "OftyTHynfCDz1rwT9QYscbXKzs/0SZBWodokFYUEWllHtd0E+c/36/86lYtQsVtbqRQhrRdLaqv6VKX7R8PtaQ==?enIEDaMDBOL1wDy5YBI1+ZeKIJuZjcR+7gNpFM6834ZpAG/lFgoNfBMtWxqZonZu2dPRlUtodwXUPAaGGUXvUSBh9xE5qCS98YyrHRGyTNdR3LkpX8Xiy3PzWilYWXf3Q3byZlD4H9yDUmHnWQGwB0KUExTHAN8slDWRe7p0yrVtUgOw4+pMmhCx+gTeye7rVp8w5dPn7XVSSCpSFPa4xs9YeW03oJ4/Cewh9rq7txbeLjPyPuzU4MmkJM0G3s3VtGS+FJSf8z8X7/OOF38EsEb35DA3/9TMmWHZE7664xOW0eD90ZDFFPDFQb6N/1HRhWAZFZczJhgu5MlKeXC427FRspvN3yaIQLAnmF0ONqUlln4CzyKinV72JeKC+Rh0yKlFcfK5TXeoJWmg1XSsi+BHX2i0Jc04EVEGYUZ5Yfck4YEOVIYZKBJF85OTUdnLXjdgTxTtUFGKV2UCJ8MFE9NeOmtFCA1pSuNnNkTzLf0lsTm944ZdxRB3RWUOYe/6v5JMmYx+kGXe6RfnPeSEeKME3EMd9krOBuHSYo8whrK0+D165GYBiwWuqAPxEgq+yMq8E9fjffDgaGHFBlFJ86uxjg5bs2dRrBzk1FBYHlg=";
        
        //  DECRYPTION USING GENERATED KEY BY USER INPUT
        var DecryptionResult = cryptico.decrypt(EncryptionResult, MattsRSAkey);


  if(DecryptionResult.status =="failure"){
    document.getElementById("back").innerHTML = "Decryption Access Grant: " + DecryptionResult.status;
  }
  else if(DecryptionResult.status =="success"){
    //document.getElementById("back").innerHTML = DecryptionResult.plaintext;
    document.write(DecryptionResult.plaintext);
  }
  else{
    alert("Failed to load. Please contact support")
  }
  