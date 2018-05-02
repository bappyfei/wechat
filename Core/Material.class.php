<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;

class Material {
	
	const TYPE = array ('image', 'voice', 'video', 'thumb');
	// access_token
	private $accessToken = null;
	
	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}
	
	//上传临时素材
	public function mediaUpload($filepath, $type){
		$type = strtolower($type);
		if(!in_array($type, Material::TYPE)){
			return null;
		}
		$url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=' . $this->accessToken . '&type=' . $type;	
		if (class_exists ( '\CURLFile' )) {
			$json = array ( 'media' => new \CURLFile ( realpath ( $filepath ) ) );
		} else {
			$json = array ( 'media' => '@' . realpath ( $filepath ) );
		}
		
		return Shuttle::push($url, $json);
	}

	// 获取临时素材
	public function mediaGet($media_id){
		$url = 'https://api.weixin.qq.com/cgi-bin/media/get?access_token=' . $this->accessToken . '&media_id=' . $media_id;
		return Shuttle::send($url);
	}
	
	// 上传图文素材
	public function addNews($artiles){
		$url  = 'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=' . $this->accessToken;
		$json = '{"articles": ' . json_encode($artiles). '}';
		return Shuttle::push($url, $json);
	}
	
	// 上传永久素材
	public function addMaterial($filepath, $type, $title = '', $introduction = ''){
		echo 'there<br>';
		$type = strtolower($type);
		if(!in_array($type, Material::TYPE)){
			return null;
		}
		$url  = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=' . $this->accessToken;
		$json = array();
		$json['type']  = $type;
		$json['media'] = new \CURLFile(realpath('D:/www/qrcode.png'));
		
		return Shuttle::push($url, $json);
	}
	
	public function delMaterial($media_id){
		$url  = 'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=' . $this->accessToken;
		$json = '{"media_id":"' . $media_id . '"}';
		return Shuttle::push($url, $json);
	}
	
	//
	public function updateNews($media_id, $index, $title, $thumb_media_id, $author, $digest, $show_cover_pic, $content, $centent_source_url){
		$url  = 'https://api.weixin.qq.com/cgi-bin/material/update_news?access_token=' . $this->accessToken;
		$json = '{
				  "media_id":' . $media_id . ',
				  "index":' . $index . ',
				  "articles": {
				       "title": ' . $title . ',
				       "thumb_media_id": ' . $thumb_media_id . ',
				       "author": ' . $author . ',
				       "digest": ' . $digest . ',
				       "show_cover_pic": ' . $show_cover_pic . ',
				       "content": ' . $centent_source_url . ',
				       "content_source_url": ' . $centent_source_url . '
				    }
				}';
		return Shuttle::push($url, $json);
	}
	
	// 获取永久素材的统计总数
	public function getMaterialCount(){
		$url = 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=' . $this->accessToken;
		return Shuttle::send($url);
	}
	
	// 获取永久素材的列表
	public function batchGetMaterial($type, $offset, $count){
		$type = strtolower($type);
		if(!in_array($type, Material::TYPE)){
			return null;
		}
		$url = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=' . $this->accessToken;
		$data = array('type'=>$type, 'offset'=>$offset, 'count'=>$count);
		return Shuttle::push($url, json_encode($data));
	}
}