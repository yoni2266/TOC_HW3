<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
/*$data = json_decode(file_get_contents('data.json'), true);
$section = '文山區';
$road = '木柵路';
$year = 101;*/

$url = $_POST['url']; 
$section = $_POST['county']; 
$road = $_POST['location']; 
$year = $_POST['year'];

$data = json_decode(file_get_contents($url), true);

$count = 0;
$cost_sum = 0;
$cost_avg = 0;

foreach ($data as $set)
{
	if (strcmp($set['鄉鎮市區'], $section) == 0){
		//echo "Name: " . $set['鄉鎮市區'] . "	" . $set['土地區段位置或建物區門牌'] . "<br />";
		if (strpos($set['土地區段位置或建物區門牌'], $road) != false){
			$cmp = $set['交易年月'] / 100;
			//echo "Name: " . $set['鄉鎮市區'] . "	" . $set['土地區段位置或建物區門牌'] . "	" . $set['交易年月'] . "<br />";
			if ($cmp >= $year){
				/*echo "Name: " . $set['鄉鎮市區'] . "	" 
							  . $set['土地區段位置或建物區門牌'] . "	" 
							  . $set['交易年月'] . "	" 
							  . $set['總價元'] . "<br />";*/
				$count++;
				$cost_sum += $set['總價元'];
			}
			else;
		}
		else;
	}
	else;
}

$cost_avg = $cost_sum / $count;
echo $cost_avg . "<br />";

?>
</body>
</html>
