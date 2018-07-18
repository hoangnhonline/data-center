<?php
set_time_limit(0);
require_once "models/Backend.php";
$model = new Backend;

$siteArr = $model->getList('sites');
if(!empty($siteArr['data'])){
	foreach ($siteArr['data'] as $key => $value) {
		$model->importPost($value['id'], $value['url']);
		echo "Import success ".$value['name'];
		echo "<hr />";
	}
}
?>