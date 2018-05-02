<?php
namespace WeChat\Core;
/**
 * accessToken的抽象管理类
 * @author Administrator
 * @version 1.0
 */
abstract class TokenManager{
	
	//获取accessToken
	public function getAccessToken(){}
	
	//设置accessToken
	public function setAccessToken(){}
	
	//设置过期时间
	public function setDeadline(){}
	
	//获取过期时间
	public function getDeadline(){}
}