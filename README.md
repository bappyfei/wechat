# wechat
微信公众号开发

====================================================================

Demo

// 获取用户微信基本信息
$json = WeChat::user ()->info ( $openid );	

// 在线客服列表
$json = WeChat::customService()->getOnlinekfList();

//获取AccessToken
WeChat::AccessToken()