<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;
use WeChat\WeChat;

class MsgRecord {
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	// 获取聊天记录
	public function getMsgList($starttime, $endtime, $msgid, $number){
		$url  = 'https://api.weixin.qq.com/customservice/msgrecord/getmsglist?access_token=' . $this->accessToken;
		$json = '{"starttime":' . $starttime . ',"endtime":' . $endtime . ',"msgid":' . $msgid . ',"number":' . $number . '}';
		return Shuttle::push($url, $json);
	}
	
}