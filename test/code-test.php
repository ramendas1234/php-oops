<?php
function fnb($count){
	$before = 0 ;
	$after = 1 ;
	for($i = 0 ; $i < $count; $i++){
		if($before < 1 && $after < 2){
			$buff[] = $before ;
			$buff[] = $after ;
		}
		$fn = $after + $before ;
		$before = $after ;
		$after = $fn ;
		$buff[] = $fn;
	}
	return $buff ;
}

print_r(fnb(10));

?>