<?php
namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;

class Groups{
	const CREATE = 'https://api.weixin.qq.com/cgi-bin/groups/create?access_token=';
	
	const GET = 'https://api.weixin.qq.com/cgi-bin/groups/get?access_token=';
	
	const GET_ID = 'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token=';
	
	const UPDATE = 'https://api.weixin.qq.com/cgi-bin/groups/update?access_token=';
	
	const DELETE = 'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token=';
	
	const MEMBERS_BATCH_UPDATE = 'https://api.weixin.qq.com/cgi-bin/groups/members/batchupdate?access_token=';
	
	const MEMBERS_UPDATE = 'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=';
	
	public function __construct() {
		$this->accessToken = ATFactory::getATManager()->getToken();
	}
	
	public function create(){
		
	}
	
	public function get(){
		
	}
	
	public function getId(){
		
	}
	
	public function update(){
		
	}
	
	public function delete(){
		
	}
	
	public function membersUpdate(){
		
	}
	
	public function MembersBatchUpdate(){
		
	}
	
}