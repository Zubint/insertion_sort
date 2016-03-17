<html>
<head>
	<title>Insertion Sort</title>
</head>
<body>
<?php


set_time_limit(0);  //escapes the default 30 second time limit for executing code set by Apache.

function insert_sort(){
	$sortArray = [];
	$j = 0;
	$k = 0;
	$l= 0;
	$m = 0;
	$cutOff = 0;
	$temp = 0;
	$sortTemp = 0;

	for ($k=0; $k<10000; $k++){
		$sortArray[$k] = rand(1,10000);
	}
	// $sortArray = [5,2,7,10,8,3,1,4,6,9];


	for($j=0; $j<count($sortArray); $j++){

			// echo ("<br>  J is " . $j);

			if($j+1>count($sortArray)-1){
				$l=$j;
			}else{
				$l=$j+1;
			}

			for ($l; $l>=0; $l--){
					// echo ("<br> is ". $sortArray[$j] ." < " . $sortArray[$l]);
					if($sortArray[$j]<$sortArray[$l]){
						$cutOff = $l;
						// echo ("<br> yes it is!  Cutoff is: " . $cutOff);
					}else
					{
						// echo ("<br> no it is not! j [" . $j . "]: " . $sortArray[$j] ." and l[" .$l . "]: " . $sortArray[$l] );
					}
				}
				$temp = $sortArray[$j];
				// echo ("temp: " . $temp . " j[" . $j . "]");


				for($m=$j; $m>=$cutOff; $m--){
					// echo (" Starting re-arrangement");
						//store the value you are going to move in a temporary variable
						//set current location to the value of the location above it
						//move each element down.  Example:  [7] comes down to [6].  [6] comes down to [5]
						if ($m!= $cutOff){
							// echo ("<br> changing: " . $sortArray[$m] ." to m-1 " .  $sortArray[$m-1] );
							$sortTemp = $sortArray[$m-1];
							$sortArray[$m] = $sortTemp;
							
						}else{
							$sortArray[$m] = $temp;
							// echo ("<br> changing: " . $sortArray[$m] ." to temp:  " .  $temp );
						}
						// var_dump($sortArray);
					}
	}
	return $sortArray;
}

$startTime = 0;
$endTime = 0;
$elapsedTime = 0;

$startTime = microtime(true);
var_dump(insert_sort());
$endTime = microtime(true);

$elapsedTime = $endTime - $startTime ;

echo ("Sort completed in: " . $elapsedTime . " seconds");


?>
</body>
</html>