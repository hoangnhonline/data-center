<?php 

$urlReturn = "../index.php?mod=cate&act=list";

require_once "../models/Backend.php";

$model = new Backend;

$id = (int) $_POST['id'];

$arrInput['name'] = $name = $_POST['name'];
$arrInput['slug'] = $model->changeTitle($name);

if($id > 0){
	$arrInput['id'] = $id;
	$model->update('cate_setting', $arrInput);
}else{
	$model->insert('cate_setting', $arrInput);
}
header('location:'.$urlReturn)

?>
