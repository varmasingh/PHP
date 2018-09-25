<html>
<head>
</head>
<body>
<?php
$Err ="";
$sampletext = $_POST['sampletext'];
$sampletext = test_input($sampletext);
$finalurl = "https://baseurle";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = array("name" => $sampletext);
  $payload = json_encode($data);

$ch = curl_init($finalurl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type:application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "inputdata=$payload");
$response = curl_exec($ch);
curl_close ($ch);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <center><legend>Enter data</legend></center>
  <input type="text" name="sampletext" value="">
  <span>* <?php echo $Err;?></span>
  <span> <?php echo $response; ?></span>
  <center>
  <input type="submit" name="submit" value="SUBMIT">
  </center>
</form>
</body>
</html>
