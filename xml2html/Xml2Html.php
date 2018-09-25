<?php
header('Content-Disposition: attachment; filename="report.html"');
$xml=simplexml_load_file("results.xml") or die("Error: Cannot create object");
$i=1;
$j=1;
$k=1;
$numberoftestcases = $xml->suite->test->count();
echo "<!DOCTYPE html>
<html>
<body>";
for($i=0; $i < $numberoftestcases ;$i++)
{
        $classes = $xml->suite->test[$i]->class->count();
        for($j=0; $j < $classes;$j++)
        {
        $data2=$xml->suite->test[$i]->class[$j]['name'];
        $testcasecounter = $xml->suite->test[$i]->class[$j]->{'test-method'}->count();
        echo "
        <table>
        <tr>
           <td>scenario</td>
           <td>Status</td>
        </tr>
        <h2>".$data2."</h2>";
          for($k=0; $k < $testcasecounter;$k++)
          {
          $data3=$xml->suite->test[$i]->class[$j]->{'test-method'}[$k]['status'];
          $temp=$xml->suite->test[$i]->class[$j]->{'test-method'}[$k]['name'];
		      if ($data3== "FAIL")
          {
          echo "<tr class='accordion'>
          <th> ".$temp."</th>
          <th><h4 style='color:red;'>".$data3."</h4></th>
          </tr>";
          }
          else if ($data3== "SKIP")
          {
          echo "<tr>
          <th>  ".$temp."</th>
          <th><h4 style='color:blue;'>".$data3."</h4></th>
          </tr>";
          }
          else
          {
           echo "<tr>
          <th>  ".$temp."</th>
          <th><h4 style='color:green;'>".$data3."</h4></th>
          </tr>";
          }
          }
        }
}
echo  "</table>
</body>
</html>";
?>
