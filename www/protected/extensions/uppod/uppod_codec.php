<?php
	function uppod_enc_replace($str){
		$uppod_tmp_a=Array('2','Q','9','T','Y','u','4','N','0','Z','3','e','6','n','d','G','o','c','R','W','L','i','v','7','1','=');
		$uppod_tmp_b=Array('U','z','X','M','V','k','t','b','B','D','f','I','m','p','5','w','l','8','x','s','y','g','H','J','a','j');
		$uppod_tmp=$str;
		$uppod_tmp_from=$uppod_tmp_a;
		$uppod_tmp_to=$uppod_tmp_b;

		for($i=0;$i<sizeof($uppod_tmp_from);$i++){
			
			$uppod_tmp=uppod_enc_replace_ab($uppod_tmp_from[$i],$uppod_tmp_to[$i],$uppod_tmp);
		}
		return $uppod_tmp;
	}
	function uppod_enc_replace_ab($a,$b,$tmp){
		$tmp=preg_replace('/'.$a.'/','___',$tmp);
		$tmp=preg_replace('/'.$b.'/',$a,$tmp);
		$tmp=preg_replace('/___/',$b,$tmp);
		return $tmp;	
	}
	function uppod_encode($str,$lkey=''){
		$tmp=uppod_enc_replace(base64_encode($str));
		if($lkey!=''){
			$tmpn=rand(0,strlen($tmp));
			$tmp=substr($tmp,0,$tmpn).uppod_enc_replace(base64_encode($lkey)).substr($tmp,$tmpn);	
		}
		return $tmp;
	}
?>