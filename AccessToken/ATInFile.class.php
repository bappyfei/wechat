<?php

namespace WeChat\AccessToken;

use WeChat\Conf;

class ATInFile extends AccessToken {
	private $filename     = null;
	private $expires_in   = null;
	private $access_token = null;

	public function __construct() {
		$this->expires_in = Conf::EXPIRES_IN;
		if($this->expires_in >=7200){
			$this->expires_in = 7200 * 0.9;
		}
		$this->filename = __DIR__ . DIRECTORY_SEPARATOR . Conf::FILE;
		$this->checket();
	}
	
	//
	public function checket(){		
		if (! file_exists ( $this->filename )) {
			$this->getInfo(fopen ( $this->filename, 'wb' ));
		}elseif (filemtime ( $this->filename ) + $this->expires_in <= time ()) {
			$this->getInfo();
		}elseif($this->access_token == null){
			$this->access_token = file_get_contents($this->filename);
		}
	}
	
	// 获取access_token
	private function getInfo($handle = null){
		$url  = sprintf ( 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s', Conf::APPID, Conf::APPSECRET );
		while (true){
			$data = json_decode ( file_get_contents ( $url ), true );
			if(isset($data['errcode'])){
				usleep(1000);
			}else{
				break;
			}
		}
		if($handle){
			fclose(fwrite($handle, $data['access_token']));
		}else{
			file_put_contents($this->filename, $data['access_token']);
		}		
		$this->access_token = $data['access_token'];
	}

	//
	public function getToken(){
		if($this->access_token == null){
			$this->checket();
		}
		return $this->access_token;
	}
}