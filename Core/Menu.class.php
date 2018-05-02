<?php

namespace WeChat\Core;

use WeChat\Core\Shuttle;
use WeChat\AccessToken\ATFactory;

class Menu {
	
	// access_token
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	/**
	 * 创建菜单
	 * @param mixed $data
	 * @return mixed
	 */
	public function create($data) {
		if (is_array ( $data ) || is_object ( $data )) {
			$data = json_encode ( $data, JSON_UNESCAPED_UNICODE );
		}
		return Shuttle::push ( 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $this->accessToken, $data );
	}

	/**
	 * 获取当前的菜单
	 * @return string
	 */
	public function get() {
		return Shuttle::send ( 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=' . $this->accessToken );
	}

	/**
	 * 删除并重新添加菜单
	 * @param mixed $data
	 * @return mixed
	 */
	public function update($data) {
		$json = self::delete ();
		$result = json_decode ( $json, true );		
		if (isset ( $result ['errcode'] ) && ($result ['errcode'] == 0 || $result ['errcode'] == 46003)) {
			return self::create ( $data );
		} else {
			return false;
		}
	}

	/**
	 * 删除当前菜单
	 * @return mixed
	 */
	public function delete() {
		return Shuttle::send ( 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=' . $this->accessToken );
	}

	/**
	 * 创建个性化菜单
	 * @param mixed $data
	 * @return mixed
	 */
	public function addConditional($data) {
		if (is_array ( $data ) || is_object ( $data )) {
			$data = json_encode ( $data, JSON_UNESCAPED_UNICODE );
		}
		return Shuttle::push ( 'https://api.weixin.qq.com/cgi-bin/menu/addconditional?access_token=' . $this->accessToken, $data );
	}

	/**
	 * 删除个性化菜单
	 * @return mixed
	 */
	public function delConditional() {
		return Shuttle::send ( 'https://api.weixin.qq.com/cgi-bin/menu/delconditional?access_token=' . $this->accessToken );
	}

	/**
	 * 返回当前菜单配置
	 * @return mixed
	 */
	public function getCurrentSelfMenuInfo() {
		return Shuttle::send ( 'https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=' . $this->accessToken );
	}

	/**
	 * 测试个性化菜单匹配结果
	 * @return mixed
	 */
	public function tryMatch() {
		return Shuttle::send ( 'https://api.weixin.qq.com/cgi-bin/menu/trymatch?access_token=' . $this->accessToken );
	}
}