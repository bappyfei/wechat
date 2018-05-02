<?php

namespace WeChat\AccessToken;

use WeChat\Conf;

class ATFactory {
	
	// 禁止创建实例
	private function __construct() {}

	/**
	 * 返回
	 */
	public static function getManager() {
		if(Conf::STORE_TYPE == 0){
			return new ATInMySQL();
		}elseif(Conf::STORE_TYPE == 1){
			return new ATInFile();
		}
	}
	
	// 禁止克隆本类实例
	public function __clone() {}
}