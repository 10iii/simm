<?php

function simm($temp, $items) {
	$res = $temp;
	//sections
	$pattern = '/{{#(.+?)}}([\s\S]+?){{\/\1}}/';
	while (preg_match($pattern, $res, $match)) {
		$sectitle = $match[1];
		$secpattern = $match[0];
		$secres = '';
		if (is_array($items[$sectitle])){
			foreach($items[$sectitle] as $em) {
				$secres .= simm($match[2], $em);
			}
		} else if ($items[$sectitle]) {
			$secres = $match[2];
		}
		$res = str_replace($secpattern, $secres, $res);
		
	}
	//end section
	$pattern = '/{{(\{*)(.*?)\}+/';
	$mc = preg_match_all($pattern, $res, $matches, PREG_SET_ORDER);
	$parts = preg_split($pattern, $res);
	$res = '';
	foreach ($matches as $ind => $em) {
		$res .= $parts[$ind];
		if ($em[1] == '{') {
			$res .= $items[$em[2]];
		} else {
			$res .= htmlspecialchars($items[$em[2]]);
		}
	}
	$res .= $parts[$mc];
	return $res;
}

?>