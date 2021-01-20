<?php
  $id = $_POST['id'];
  $choice = $_POST['choice'];
  $code = $_POST['code'];

include 'data.php';

?>

<script language="JavaScript" type="text/javascript" src="cryptico/jsbn.js"></script>
<script language="JavaScript" type="text/javascript" src="cryptico/random.js"></script>
<script language="JavaScript" type="text/javascript" src="cryptico/hash.js"></script>
<script language="JavaScript" type="text/javascript" src="cryptico/rsa.js"></script>
<script language="JavaScript" type="text/javascript" src="cryptico/aes.js"></script>
<script language="JavaScript" type="text/javascript" src="cryptico/api.js"></script>

    <form id="jsform" action="server.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <input type="hidden" id="choice" name="choice" value="<?php echo $choice; ?>">
    <input type="hidden" id="code" name="code" value="<?php echo $code; ?>">
    <input type="hidden" id="crypt" name="crypt">
    </form>
<script>
     var PassPhrase = "<?php echo $code; ?>";
        var Bits = 512;
        var MattsRSAkey = cryptico.generateRSAKey(PassPhrase, Bits);
        var MattsPublicKeyString = cryptico.publicKeyString(MattsRSAkey);
        var PlainText = "<?php echo $data; ?>";
        var EncryptionResult = cryptico.encrypt(PlainText, MattsPublicKeyString);
            document.getElementById("crypt").value = EncryptionResult.cipher;
</script>



<script type="text/javascript">
  document.getElementById('jsform').submit();
</script>