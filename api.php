<?php
//如何用php判断用户通过电脑端还是手机端访问网站
function isMobile(){
$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ”;
$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:”;
function CheckSubstrs($substrs,$text){
foreach($substrs as $substr)
if(false!==strpos($text,$substr)){
return true;
}
return false;
}
$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');
$found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||
CheckSubstrs($mobile_token_list,$useragent);
if ($found_mobile){
return true;
}else{
return false;
}
}
$pc = 'pc.php';
$pe = 'pe.php';
if (isMobile()){
header("Location:".$pe);
}else{
header("Location:".$pc);
}
?>