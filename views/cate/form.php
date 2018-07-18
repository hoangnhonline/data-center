<?php 
$arrListSite = $model->getListSite();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$arrDetail = array();
if($id > 0){
  $arrDetail = $model->getDetail("cate_setting", $id);
}
?>
<div class="row">

    <h2><?php echo $id > 0 ? "Update category" : "Add category"; ?></h2>

  <div style="text-align:right">    
    <button class="btn btn-default btn-sm" type="button" onclick="location.href='index.php?mod=cate&act=list'">Back</button>
  </div>
<div class="clearfix"></div>
<div class="bs-example" data-example-id="basic-forms">
  <form action="controllers/cate.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">    
    <div class="form-group">
      <label for="name">Cate name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php if(!empty($arrDetail)) echo $arrDetail['name']; ?>">
    </div>           
    
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <button class="btn btn-default btn-sm" type="button" onclick="location.href='index.php?mod=cate&act=list'">Cancel</button>
  </form>
</div>
</div>