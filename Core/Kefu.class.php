<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;
use WeChat\WeChat;

class Kefu {
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	public function getkfList(){
		$url = 'https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=' . $this->accessToken;
		return file_get_contents($url);
	}
	
	public function del($account, $nickname, $password){
		$url = 'https://api.weixin.qq.com/customservice/kfaccount/del?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $account . '","nickname" : "' . $nickname . '","password" : "' . $password . '",}';
		return Shuttle::push($url, $json);
	}
	
	public function add($account, $nickname, $password){
		$url = 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $account . '","nickname" : "' . $nickname . '","password" : "' . $password . '",}';
		return Shuttle::push($url, $json);
	}
	
	public function update($account, $nickname, $password){
		$url = 'https://api.weixin.qq.com/customservice/kfaccount/update?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $account . '","nickname" : "' . $nickname . '","password" : "' . $password . '",}';
		return Shuttle::push($url, $json);
	}
	
	public function uploadheadimg($account){
		$url = 'http://api.weixin.qq.com/customservice/kfaccount/uploadheadimg?access_token=' . $this->accessToken . '&kf_account=' . $account;
		return Shuttle::push($url, array());
	}
	
}