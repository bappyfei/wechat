<?php

namespace WeChat;

class Conf {
	//
	const TOKEN = 'weixin';
	//
	const APPID = '';
	//
	const APPSECRET = '';

	// access_token的过期时间不超过7200秒
	const EXPIRES_IN = 6000;
	// access_token的存储的管理类, 系统默认 ATInFile; 0 = 'ATInMySQL' / 1 = 'ATInFile';
	const STORE_TYPE = 0;
	// access_token的保存文件名
	const FILE = 'access_token.txt';
}
