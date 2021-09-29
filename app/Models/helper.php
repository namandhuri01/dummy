<?php

function getDiffBwTwoDates($first_date,$second_date){

    $diff = abs(strtotime($second_date) - strtotime($first_date));

    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

    echo $years.'Years, '.$months .' Months, '.$days.' days';
}

function convertNumberIntoWords($number)
{
    $no = floor($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = [];
    $words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');

    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? '' : null;
            $hundred = ($counter == 1 && $str[0]) ? '' : null;
            $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
    }
    $strTemp = array();
	for($i = count($str) - 1; $i >= 0; $i--){
		$strTemp[] = $str[$i];
	}
  $result = implode('', $strTemp);
  echo $result . "Only ";
}

function convertToWords($number) {
	//Get number only
	$no = round($number);
	//Get Decimal Value if any
	$decimal = round($number - ($no = floor($number)), 2) * 100;
	//Numbers Length
	$digits_length = strlen($no);
	$i = 0;
	//Output String
	$str = array();
	//Words with ones and twos
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	//Digits Words Tens Power
	$digits = array('', 'Hundred', 'Thousand', 'Lakh');
	while ($i < $digits_length) {
		//handles digits at tens, hundred places
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$counter = count($str);
			//Get text for number from word and digits array
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter];
		} else {
			$str [] = null;
		}
	}
	$tmpStrArr = [];
	for($i = count($str) - 1; $i >= 0; $i--){
		$tmpStrArr[] = $str[$i];
	}
	$numberWords = implode(' ', $tmpStrArr);

	$decimalWords = ($decimal) ? "And " . ($words[$decimal - $decimal%10]) . " " . ($words[$decimal%10])  : '';

	return ($numberWords ? $numberWords : '') . $decimalWords . " Only";
}



