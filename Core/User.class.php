<?php
namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;

class User{
	
	private $accessToken = null;
	
	const BATCH_GET = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=';
	
	const UPDATE_REMARK = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=';
	
	public function __construct() {
		$this->accessToken = ATFactory::getManager()->getToken();
	}
	
	public function get($next_openid = ''){
		$url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=' . $this->accessToken . '&next_openid=' . $next_openid;
		return Shuttle::send($url);	
	}
	
	public function updateRemark($data = null){
		return Shuttle::push(self::UPDATE_REMARK . $this->accessToken, $data);
	}
	
	public function info($openid){
		$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . $this->accessToken . '&openid=' . $openid . '&lang=zh_CN';
		return Shuttle::send($url);
	}
	
	public function batchGet($data = null){
		return Shuttle::push(self::BATCH_GET . $this->accessToken, $data);
	}
}