<?php

namespace WeChat\Core;

use WeChat\AccessToken\AccessToken;
use WeChat\AccessToken\ATFactory;

class Message {
	private $accessToken = null;
	
	public function __construct() {
		$this->accessToken = ATFactory::getManager()->getToken();
	}
	
	//  设置模板消息的行业信息
	public function setIndustry($industry_id1, $industry_id2){
		$url  = 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token=' . $this->accessToken;
		$data = '{"industry_id1":"' . $industry_id1 . '","industry_id2":"' . $industry_id2 . '"}';
		return Shuttle::push($url, $data);
	}
	
	//  获取模板消息的行业信息
	public function getIndustry(){
		$url  = 'https://api.weixin.qq.com/cgi-bin/template/get_industry?access_token=' . $this->accessToken;
		return Shuttle::send($url);
	}
	
	//  添加模板消息
	public function apiAddTemplate($template_id_short){
		$url  = 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token=' . $this->accessToken;
		$data = '{"template_id_short":"' . $template_id_short . '"}'; 
		return Shuttle::push($url, $data);
	}
	
	//  获取模板消息列表
	public function getAllPrivateTemplate(){
		$url  = 'https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=' . $this->accessToken;
		return Shuttle::send($url);
	}
	
	//  删除模板消息
	public function delPrivateTemplate($template_id){
		$url  = 'https://api.weixin.qq.com/cgi-bin/template/del_private_template?access_token=' . $this->accessToken;
		$data = '{"template_id":"' . $template_id . '"}';
		return Shuttle::push($url, $data);
	}
	
	//  发送消息        
	public function send($touser, $template_id, $url, $data){
		$temp = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=' . $this->accessToken;
		$data = '{"touser":"' . $touser . '","template_id":"' . $template_id . '","url":"' . $url . '","data":' . json_encode($data) . '}';
		return Shuttle::push($temp, $data);
	}
}