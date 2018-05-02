<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;

class ShortUrl {
	
	// access_token
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}
	
	public function turn($long_url){
		$url      = 'https://api.weixin.qq.com/cgi-bin/shorturl?access_token=' . $this->accessToken;
		
		$json     = '{"action":"long2short","long_url":"' . $long_url . '"}';
		
		$result = Shuttle::push($url, $json);
		
		$result = json_decode($result, true);
		if($result['errcode'] == 0){
			return $result['short_url'];
		}else{
			$result = Shuttle::push($url, $json);
			$result = json_decode($result, true);
			return $result['short_url'];
		}
	}
}