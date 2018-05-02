<?php
namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;

class WxServer{
	const IP = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=';
	
	public function getCallBackIP(){
		return Shuttle::pull(self::IP . ATFactory::getATManager()->getToken());
	}
}