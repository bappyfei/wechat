<?php

namespace WeChat;

use WeChat\Core\Menu;
use WeChat\Core\WxServer;
use WeChat\AccessToken\ATFactory;
use WeChat\Core\User;
use WeChat\Core\QrCode;
use WeChat\Core\Message;
use WeChat\Core\Material;
use WeChat\Core\Datecube;
use WeChat\Core\KfSessionService;
use WeChat\Core\KfSession;
use WeChat\Core\MsgRecord;
use WeChat\Core\CustomService;
use WeChat\Core\ShortUrl;
use WeChat\Core\Kefu;
use WeChat\Business\OrderMessage;

class WeChat {

	// 获取微信服务器地址
	public static function getCallBackIP() {
		$server = new WxServer ();
		return $server->getCallBackIP ();
	}
	
	// 素材
	public static function material(){
		return new Material();
	}
	
	// 客服管理
	public static function kefu(){
		return new Kefu();
	}
	
	// 处理保单返回信息
	public static function orderMessage(){
		return new OrderMessage();
	}
	
	//
	public static function customService(){
		return new CustomService();
	}
	
	//短连接转换
	public static function shortURL($long_url){
		$shortUrl = new ShortUrl();
		return $shortUrl->turn($long_url);		
	}
	
	//
	public static function KfSession(){
		return new KfSession();
	}
	
	// 
	public static function msgRecord(){
		return new MsgRecord();
	}
	
	//
	public static function menu() {
		return new Menu();
	}
	
	// 消息
	public static function Datecube(){
		return new Datecube();
	}
	
	//
	public static function user(){
		return new User();
	}
	
	//
	public static function message(){
		return new Message();
	}
	
	//
	public static function qrcode(){
		return new QrCode();
	}
	
	public static function AccessToken(){
		return ATFactory::getManager()->getToken();
	}
}