<?php

namespace WeChat\Core;

use WeChat\Core\Shuttle;
use WeChat\AccessToken\ATFactory;

class QrCode {
	
	// 创建永久二维码的整形的场景值ID字符串
	const LIMIT_ID = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": %d}}}';
	// 创建永久二维码的字符串形式的场景值ID字符串
	const LIMIT_STR = '{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "%s"}}}';
	// 创建二维码的字符串
	const CREATE_CODE = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=';
	// access_token
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}
	
	// 创建临时二维码
	public function temp($scene_id, $expire_seconds = 2592000){
		
		$temp = '{"expire_seconds": %d, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": %d}}}';
		
		// scene_id 最大长度是32
		if(!is_int($scene_id) || mb_strlen($scene_id) > 32){
			return null;	
		}
		
		//过期时间最大30天即2592000
		if(!is_numeric($expire_seconds) || $expire_seconds <=0 || $expire_seconds > 2592000){
			$expire_seconds = 2592000;
		}
		
		$data = sprintf($temp, $expire_seconds, $scene_id);
		
		return Shuttle::push(QrCode::CREATE_CODE . $this->accessToken, $data);
	}
	
	// 创建永久二维码
	public function permanent($scene){
		// 整形最大为10000 ，最小为1
		if(is_int($scene)){
			if($scene <0 || $scene > 100000){
				return null;
			}
			$data = vsprintf(QrCode::LIMIT_ID, $scene);
		}elseif(is_string($scene)){// 字符串最大长度为64， 最小为1
			if(mb_strlen($scene) > 64 || mb_strlen($scene) <0){
				return null;
			}
			$data = sprintf(QrCode::LIMIT_STR, $scene);
		}else{
			return null;
		}
		return Shuttle::push(QrCode::CREATE_CODE . $this->accessToken, $data);
	}

	//
	public function showQrCode($ticket) {
		$show_qrcode = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=';
		return file_get_contents ( $show_qrcode . $ticket );
	}
}