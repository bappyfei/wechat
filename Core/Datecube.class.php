<?php

namespace WeChat\Core;

use WeChat\AccessToken\ATFactory;

class Datecube {
	private $accessToken = null;

	public function __construct() {
		$this->accessToken = ATFactory::getManager ()->getToken ();
	}

	private function sendPost($url, $begin_date, $end_date) {
		$data = '{"begin_date": "' . $begin_date . '","end_date": "' . $end_date . '"}';
		return Shuttle::push ( $url, $data );
	}
	
	// 获取消息发送概况数据
	public function getUpStreamMsg($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsg?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取消息发送分布月数据
	public function getUpStreamMsgDistMonth($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsgdistmonth?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取消息分送分时数据
	public function getUpStreamMsgHour($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsghour?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取消息发送周数据
	public function getUpStreamMsgWeek($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsgweek?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取消息发送分布数据
	public function getUpStreamMsgDist($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsgdist?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取消息发送分布月数据
	public function getUpStreamMsgMonth($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsgmonth?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取消息发送分布周数据
	public function getUpStreamMsgDistWeek($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsgdistweek?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	//
	
	// 获取图文群发每日数据
	public function getArticleSummary($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getarticlesummary?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取图文群发总数据
	public function getArticleTotal($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getarticletotal?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取图文统计数据
	public function getUserRead($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getuserread?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取图文统计分时数据
	public function getUserReadHour($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getuserreadhour?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取图文分享转发数据
	public function getUserShare($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getusershare?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取图文分享转发分时数据
	public function getUserShareHour($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getusersharehour?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取用户增减数据
	public function getUserSummary($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getusersummary?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取累计用户数据
	public function getUserCumulate($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getusercumulate?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取接口分析数据
	public function getInterfaceSummary($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getinterfacesummary?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
	
	// 获取接口分析分时数据
	public function getInterfaceSummaryHour($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getinterfacesummaryhour?access_token=' . $this->accessToken;
		return $this->sendPost ( $url, $begin_date, $end_date );
	}
}