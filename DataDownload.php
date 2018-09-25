<?php
require_once 'connection.php';
$sql   = "Select * From userlist";
$result = mysql_query($sql);
function cleanData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="data.xlsx"');
$flag = false;
while (false !== ($row = mysql_fetch_assoc($result)))
{
    if (!$flag) {
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    array_walk($row, '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
}
exit;
?>
