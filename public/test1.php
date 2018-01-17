<?php

/**
 * @param array $A
 * @return int
 */
function solution($A=[])
{
    $length = count($A);
    $P=0;
    $sum = 0;
    for($i=0;$i<$length-1;$i++)
    {
        for($j=$i+1;$j<$length;$j++)
        {
            $sum+=$A[$j];
            echo $sum;
        }
        $P += $A[$i];
        $minDiff[] = abs($P - $sum);
    }
    return  (($minDiff));
}
$array = [3,1,2,4,3];
var_dump(solution($array));
//phpinfo();
//
//$curl = curl_init();
//$url = 'http://elearninga-z.com/ursaminor/www/runtest.php';
//
//$ch = curl_init($url);
//
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$output = curl_exec ($ch);
//$info = curl_getinfo($ch);
//$http_result = $info ['http_code'];
//curl_close ($ch);
//var_dump(json_encode($output,true));