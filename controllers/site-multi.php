<?php 

$urlReturn = "../index.php?mod=site&act=list";

require_once "../models/Backend.php";

$model = new Backend;

$site_url = trim($_POST['site_url']);
if($site_url != ''){
	$tmp = explode(';', $site_url);
	if(!empty($tmp)){
		foreach ($tmp as $url) {
			$url = trim($url);
			$name = str_replace("http://", "", $url);
			$arrInput['name'] = $name;
			$arrInput['url'] = $url;
			$arrInput['bg_header_color'] = "#10151D";
			$arrInput['text_header_color'] = "#A2A2A2";
			$arrInput['bg_footer_color'] = "#2b2b2b";
			$arrInput['text_footer_color'] = "#FFF";
			$arrInput['post_per_cate'] = 2;
			$site_id = $model->insert('sites', $arrInput);
			$model->firstSetting($site_id, $url, $arrInput);
		}
	}

}
header('location:'.$urlReturn);
?>
