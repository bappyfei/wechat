<?php

namespace WeChat\Core;

use WeChat\Core\Shuttle;
use WeChat\AccessToken\ATFactory;

class Media {
	
	// access_token
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	// 上传图片
	public function uploadImg(){
		$url = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=' . $this->accessToken;
		return Shuttle::push($url);
	}
}