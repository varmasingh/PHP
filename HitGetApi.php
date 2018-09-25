<html>
<head>
 <title>Hit Get API</title>
  </head>
<body>
<?php
$Err ="";
$input = $_POST['input'];
$input = test_input($input);
$finalurl = "http://baseurl.baseurl?input=".$input;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["input"])) {
    $Err = "Please fill input";
  }
  else{
$ch = curl_init($finalurl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close ($ch);
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div>
  <center><h2>Enter Data</h2></center>
   <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="input" placeholder="input" />
    <h3>Response</h3>
    <span> <?php echo $response; ?></span>
    <center><input type="submit" name="submit" value="SUBMIT"> </center>
  </form>
</div>
</body>
</html>
