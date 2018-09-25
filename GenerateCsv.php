<?php
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="data_CSV.csv"');
$data = htmlentities($_GET['data']);
$data1 ="0";
$BINARY = array("0","1");
$NUMBER = rand(100000,999999);
$Counter = '0';
$data = array();
// define  csv header
	     $data[$Counter][0]="First";
		 $data[$Counter][1]="Second";
		 $data[$Counter][2]="Third";
		 $data[$Counter][3]="Fourth";
         $Counter++;

         while($Counter <= 5)
		   {
		 $data[$Counter][0]="$data";
		 $data[$Counter][1]="$data1";
         $data[$Counter][2]=$BINARY[array_rand($BINARY)];
		 $data[$Counter][3]="$NUMBER";
		 $Counter++;
}
// Create a stream opening it with read / write mode
$stream = fopen('data://text/plain,' . "", 'w+');
// Iterate over the data, writting each line to the text stream
foreach ($data as $val) {
    fputcsv($stream, $val);
}
// Rewind the stream
rewind($stream);
// You can now echo it's content
echo stream_get_contents($stream);
// Close the stream
fclose($stream);
?>
