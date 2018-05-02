<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;
use WeChat\WeChat;

class CustomService {
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	// 获取客服基本信息
	public function getkfList(){
		return Shuttle::send('https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=' . WeChat::AccessToken());
	}
	
	// 获取客服基本信息
	public function getOnlinekfList(){
		return Shuttle::send('https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist?access_token=' . WeChat::AccessToken());
	}
	
	// 添加客服
	public function add($kf_account, $nickname){
		$url  = 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token=' . WeChat::AccessToken();
		$json = '{"kf_account":"' . $kf_account . '","nickname":"' . $nickname . '"}';
		return Shuttle::push($url, $json);
	}
	
	// 绑定客服
	public function inviteWorker($kf_account, $invite_wx){
		$url  = 'https://api.weixin.qq.com/customservice/kfaccount/inviteworker?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $kf_account . '","invite_wx" : "' . $invite_wx . '"}';
		return Shuttle::push($url, $json);
	}
	
	// 上传头像
	public function uploadHeadImg($kf_account, $filepath){
		$url = 'https://api.weixin.qq.com/customservice/kfaccount/uploadheadimg?access_token=' . $this->accessToken . '&kf_account=' . $kf_account;
		if (class_exists ( '\CURLFile' )) {
			$json = array ( 'media' => new \CURLFile ( realpath ( $filepath ) ) );
		} else {
			$json = array ( 'media' => '@' . realpath ( $filepath ) );
		}
		return Shuttle::push($url, $json);
	}
	
	// 设置客服信息
	public function update($kf_account, $nickname){
		$url  = 'https://api.weixin.qq.com/customservice/kfaccount/update?access_token=' . $this->accessToken;
		$json = '{"kf_account" : "' . $kf_account . '","nickname" : "' . $nickname . '"}';
		return Shuttle::push($url, $json);
	}
	
	// 删除客服
	public function del($kf_account){
		return Shuttle::send('https://api.weixin.qq.com/customservice/kfaccount/del?access_token=' . $this->accessToken . '&kf_account=' . $kf_account);
	}
}