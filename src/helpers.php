<?php

use JiJiHoHoCoCo\PHPENV\ENV;

if(!function_exists('getStringBetween')){
	function getStringBetween (string $str,string $from,string $to) : string {

		$string = substr($str, strpos($str, $from) + strlen($from));

		if (strstr ($string,$to,TRUE) != FALSE) {

			$string = strstr ($string,$to,TRUE);

		}

		return $string;

	}
}

if(!function_exists('gete')){
	function gete(string $data){
		$previousData=$data;
		$dataset=ENV::getDataset();
		if(isset($dataset[$data])){
			return  preg_replace('/\s+/', '',$dataset[$data]);
		}else{
			$data=$data.'=';
			$env=ENV::get();
			$comma=ENV::getComma();
			if($env==NULL){
				throw new \Exception("Please set the file path firstly", 1);
			}
			$getData=strpos($env,$data)!==FALSE ? getStringBetween($env,$data,$comma) : NULL;
			ENV::setDataset($previousData,$getData);
			return  preg_replace('/\s+/', '',$getData);
		}
	}
}