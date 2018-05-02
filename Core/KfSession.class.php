<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;
use WeChat\WeChat;

class KfSession {
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	// 创建会话
	public function create($kf_account, $openid){
		$url  = 'https://api.weixin.qq.com/customservice/kfsession/create?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $kf_account . '","openid" : "' . $openid . '"}'; 
		return Shuttle::push($url, $json);
	}
	
	// 关闭会话
	public function close($kf_account, $openid){
		$url  = 'https://api.weixin.qq.com/customservice/kfsession/close?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $kf_account . '","openid" : "' . $openid . '"}';
		return Shuttle::push($url, $json);
	}
	
	// 获取会话状态
	public function getSession($openid){
		return Shuttle::send('https://api.weixin.qq.com/customservice/kfsession/getsession?access_token=' . $this->accessToken . '&openid=' . $openid);
	}
	
	// 获取客服会话列表
	public function getSessionList($kf_account){
		return Shuttle::send('https://api.weixin.qq.com/customservice/kfsession/getsessionlist?access_token=' . $this->accessToken . '&kf_account=' . $kf_account);
	}
	
	// 获取未接入会话列表
	public function getWaitCase(){
		return Shuttle::send('https://api.weixin.qq.com/customservice/kfsession/getwaitcase?access_token=' . $this->accessToken);
	}
}