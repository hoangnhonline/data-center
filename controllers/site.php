<?php 

$urlReturn = "../index.php?mod=site&act=list";

require_once "../models/Backend.php";

$model = new Backend;

$id = (int) $_POST['id'];

$arrInput['name'] = $_POST['name'];
$arrInput['url'] = $_POST['url'];
$arrInput['bg_header_color'] = (trim($_POST['bg_header_color'])!="" ) ? $_POST['bg_header_color'] : "#10151D";
$arrInput['text_header_color'] = (trim($_POST['text_header_color']) != "" ) ? $_POST['text_header_color'] : "#A2A2A2";
$arrInput['bg_footer_color'] = (trim($_POST['bg_footer_color']) != "" ) ? $_POST['bg_footer_color'] : "#2b2b2b";
$arrInput['text_footer_color'] = (trim($_POST['text_footer_color']) != "" ) ? $_POST['text_footer_color'] : "#FFF";
$arrInput['post_per_cate'] = (trim($_POST['post_per_cate']) !="") ? (int) $_POST['post_per_cate'] : 2;

if($id > 0){
	$arrInput['id'] = $id;
	$model->update('sites', $arrInput);
	$model->updateSetting($arrInput['url'], $arrInput);
}else{
	$site_id = $model->insert('sites', $arrInput);
	$model->firstSetting($site_id, $arrInput['url'], $arrInput);
}
header('location:'.$urlReturn);
?>
