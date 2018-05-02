<?php

namespace WeChat\AccessToken;

use WeChat\Conf;

class ATInMySQL extends AccessToken {
	//token
	private $access_token = null;
	
	public function __construct() {
		$this->checket();
	}

	// 检测access_token
	private function checket(){
		// 读取数据库access_token
		$data = M('access_token')->find();
		// 过期则从新获取，反之则用已有的
		if(empty($data) || $data['expires_in'] <= time()){
			$this->getInfo($data['id']);
		}else{
			$this->access_token = $data['access_token'];
		}
	}
	
	// 获取access_token
	private function getInfo($id = null){
		$url  = sprintf ( 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s', Conf::APPID, Conf::APPSECRET );
		while (true){
			$data = json_decode ( file_get_contents ( $url ), true );
			if(isset($data['errcode'])){
				usleep(1000);
			}else{
				break;
			}
		}
		$data['expires_in'] = time() + $data['expires_in'] * 0.9;
		if($id){
			M('access_token')->where(array('id'=>$id))->save($data);
		}else{
			M('access_token')->add($data);
		}		
		$this->access_token = $data['access_token'];
	}
	
	public function getToken() {
		if($this->access_token == null){
			$this->checket();
		}		
		return $this->access_token;
	}
}