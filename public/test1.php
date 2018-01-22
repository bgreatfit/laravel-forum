<?php

/**
 * @param array $A
 * @return int
 */
function solution($A=[])
{
    $length = count($A);
    $P = 0;
     $sum = 0;

    for ($i = 0; $i < $length - 1; $i++) {
        //ineer loop sums the other part of the array
        for ($j = $i + 1; $j < $length; $j++) {

            $sum += $A[$j];
        }
        //sum the first part of the array
        $P += $A[$i];
        //$minDiff = abs($P - $sum);
        $minDiff[] = abs($P - $sum);
        $sum = 0;
    }
    $minLength = count($minDiff);
    $min = $minDiff[0]; //assume the first item int the collection id the minimum
    //find the minimum in the collection
    for ($a = 0 + 1; $a < $minLength; $a++) {
        if ($minDiff[$a] < $min) {
            $min = $minDiff[$a];
        }
    }

    return (($min));
}
$array = [1,2,2,1];
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

?>

<html>
<head>
    <script src="js/test.js"></script>

</head>

    <body>
    <p>  jbjnkjnkj</p>
    <a onclick="open('http')">app2</a>
<?php echo true ?>
    <a onclick="refreshExistingTab()">Refresh</a>
    </body>
</html>
