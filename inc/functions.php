<?php
// Convert number to always have 2 decimals
function priceConverter($price) {
	if (strpos($price, '.') !== false) {
		$splitString = explode('.', $price);
		$numberOfDecimals = strlen($splitString[count($splitString)-1]);
		if ($numberOfDecimals == 1) {
			$price = $price . 0;
		}
		return str_replace('.' , ',' , $price);
	}
	else {
		$price = $price . '.00';
		return str_replace('.' , ',' , $price);
	}
}