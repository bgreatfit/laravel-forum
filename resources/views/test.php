<?php



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://sosnation.com/wp-json/wp/v2/posts/2992?_embed=",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 3b48f0e5-5f8d-e19e-d228-e89306ba0537"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$results = array();
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $results[0] =json_decode($response,true);
}
//echo '<pre>';
//var_dump($results);
//echo '</pre>';
foreach ($results as $result){
//    echo '<img src="$result['_embedded']['wp:featuredmedia'][0]['source_url']"./></br>';
    echo $result['id'].'</br>';
    $time =$result['date'].'</br>';
    echo date("Y-m-d",strtotime($time));
    echo $result['link'].'</br>';
    echo $result['title']['rendered'].'</br>';
    echo $result['content']['rendered'].'</br>';


}
//$ar1 = array(10, 100, 100, 0);
//$ar2 = array(1, 3, 2, 4);
//array_multisort($ar1, $ar2);
//
//
////    ["Surrender Benefit","Withdrawal/Termination Benefit",
////    "Full Maturity Benefit","Withdrawal/Termination Benefit",
////    "Withdrawal/Termination Benefit"];
////var_dump($ar1);
////var_dump($ar2);
//
////$customer['address'] = '123 fake st';
////$customer['name'] = 'Tim';
////$customer['dob'] = '12/08/1986';
////$customer['dontSortMe'] = 'this value doesnt need to be sorted';
//$array1 =['coscen' => 00020,
//            'coscendesc' => 00020,
//            'branch'=> 0024,
//            'brhdesc' => 'HEADQUARTERS',
//            'agency'=> 'LA5/001/159',
//            'claimtype' => 'Withdrawal/Termination Benefit',
//             'liabtype' => 'IWDRW'];
//$array2 =['coscen' => 00020,
//            'coscendesc' => 00020,
//            'branch'=> 0024,
//            'brhdesc' => 'Surrender',
//            'agency'=> 'LA5/001/159',
//            'claimtype' => 'Surrender Benefit',
//             'liabtype' => 'IWDRW'];
//$array3=['coscen' => 00020,
//            'coscendesc' => 00020,
//            'branch'=> 0024,
//            'brhdesc' => 'HEADQUARTERS',
//            'agency'=> 'LA5/001/159',
//            'claimtype' => 'Full Benefit',
//             'liabtype' => 'IWDRW'
//];
//$array4=['coscen' => 00020,
//    'coscendesc' => 00020,
//    'branch'=> 0024,
//    'brhdesc' => 'HEADQUARTERS',
//    'agency'=> 'LA5/001/159',
//    'claimtype' => 'Withdrawal/Termination Benefit',
//    'liabtype' => 'IWDRW'];
//$array5=['coscen' => 00020,
//    'coscendesc' => 00020,
//    'branch'=> 0024,
//    'brhdesc' => 'HEADQUARTERS',
//    'agency'=> 'LA5/001/159',
//    'claimtype' => 'Withdrawal/Termination Benefit',
//    'liabtype' => 'IWDRW'
//];
//
//$master_arr =[$array1,$array2,$array3,$array4,$array5];
//$ordered_arr = array(' Withdrawal/Termination Benefit ', 'Full Benefit', 'Surrender Benefit');
////$properOrderedArray1 = array_multisort($ordered_arr, $master_arr);
////Or:
//$properOrderedArray2 = array_replace(array_flip($ordered_arr), $master_arr);
//var_dump($properOrderedArray2);
////var_dump($properOrderedArray2);
//
////$properOrderedArray -> array('name' => 'Tim', 'address' => '123 fake st', 'dob' => '12/08/1986', 'dontSortMe' => 'this value doesnt need to be sorted')