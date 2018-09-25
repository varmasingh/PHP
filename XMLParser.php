<?php
$sqlname='127.0.0.1';
$username='';
$db='';
$cons= @mysqli_connect("$sqlname", "$username","","$db") or die(@mysqli_connect_error());
$xml=simplexml_load_file("report.xml") or die("Error");
$counter = $xml->httpSample->count();
for($i=0; $i <$counter;$i++) {
        $data1=$xml->httpSample[$i]['lb'];
		    $rc=$xml->httpSample[$i]['rc'];
	 	    $rm=$xml->httpSample[$i]['rm'];
		    $success=$xml->httpSample[$i]['s'];
	            if($success=='true')
                  $success='UP';
            	else
                  $success='DOWN';
		  $responseHeader=$xml->httpSample[$i]->responseHeader;
		 	$responseHeader = @mysqli_real_escape_string($cons,$responseHeader);
		  $requestHeader=$xml->httpSample[$i]->requestHeader;
	 	 	$requestHeader = @mysqli_real_escape_string($cons,$requestHeader);
		  $responseData=$xml->httpSample[$i]->responseData;
	 		$responseData = @mysqli_real_escape_string($cons,$responseData);
	 	  $URL=$xml->httpSample[$i]->$URL;
	 		$URL = @mysqli_real_escape_string($cons,$URL);
	   	$queryString=$xml->httpSample[$i]->queryString;
	 		$queryString = @mysqli_real_escape_string($cons,$queryString);
		  $guid=uniqid().uniqid();

if(!@mysqli_query($cons,"INSERT INTO Table (lb,rc,rm,failure,responseHeader,requestHeader,responseData,URL,guid,QueryData)
                    VALUES ('$data1','$rc','$rm','$success','$responseHeader','$requestHeader','$responseData','$URL','$guid','$queryString')"))
{
die(@mysqli_connect_error());
}
}
?>
