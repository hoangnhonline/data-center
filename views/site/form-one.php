<?php 
$arrListSite = $model->getListSite();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$arrDetail = array();
if($id > 0){
  $arrDetail = $model->getDetail("sites", $id);
}
?>
<div class="row">

    <h2><?php echo $id > 0 ? "Update site" : "Add site"; ?></h2>

  <div style="text-align:right">    
    <button class="btn btn-default btn-sm" type="button" onclick="location.href='index.php?mod=cate&act=list'">Back</button>
  </div>
<div class="clearfix"></div>
<div class="bs-example" data-example-id="basic-forms">
  <div id="divForm">
  <form action="controllers/site.php" method="POST" id="formOne">
    <input type="hidden" name="id" value="<?php echo $id; ?>">    
    <div class="form-group">
      <label for="name">Site URL<span class="error">*</span></label>
      <input type="text" class="form-control" id="url"  name="url" value="<?php if(!empty($arrDetail)) echo $arrDetail['url']; ?>">
    </div>
    <div class="form-group">
      <label for="name">Site name<span class="error">*</span></label>
      <input type="text" class="form-control" id="name" name="name" value="<?php if(!empty($arrDetail)) echo $arrDetail['name']; ?>">
    </div>
    <div class="form-group">
      <label for="name">Background header color</label>
      <input type="text" class="form-control" id="bg_header_color" name="bg_header_color" value="<?php if(!empty($arrDetail)) echo $arrDetail['bg_header_color']; ?>">
    </div>
    <div class="form-group">
      <label for="name">Text header color</label>
      <input type="text" class="form-control" id="text_header_color" name="text_header_color" value="<?php if(!empty($arrDetail)) echo $arrDetail['text_header_color']; ?>">
    </div>
    <div class="form-group">
      <label for="name">Background footer color</label>
      <input type="text" class="form-control" id="bg_footer_color" name="bg_footer_color" value="<?php if(!empty($arrDetail)) echo $arrDetail['bg_footer_color']; ?>">
    </div>
    <div class="form-group">
      <label for="name">Text footer color </label>
      <input type="text" class="form-control" id="text_footer_color" name="text_footer_color" value="<?php if(!empty($arrDetail)) echo $arrDetail['text_footer_color']; ?>">
    </div>
    <div class="form-group">
      <label for="name">Post per cate / day </label>
      <input type="text" class="form-control" id="post_per_cate" name="post_per_cate" value="<?php if(!empty($arrDetail)) echo $arrDetail['post_per_cate']; ?>">
    </div>  
    
    <button type="button" id="btnSave" class="btn btn-primary btn-sm">Save</button>
    <button class="btn btn-default btn-sm" type="button" onclick="location.href='index.php?mod=site&act=list'">Cancel</button>
  </form>
</div>
  <div id="loading" style="padding:10px;display:none;">
      <img src="img/loading.gif">
  </div>
</div>
</div>
<style type="text/css">
label.error, span.error{
  color:red;
  font-style: italic;
}
</style>
<script type="text/javascript">
$(document).ready(function(){  
  $('#btnSave').click(function(){
    if($('#url').val() == ""){
      alert('Please enter Site URL'); return false;
    }else if($('#name').val() == ""){
      alert('Please enter Site Name'); return false;
    }else{
      $.ajax({
        url : $('#formOne').attr('action'),
        data : $('#formOne').serialize(),
        type : "POST", 
        beforeSend :function(){
          $('#divForm').hide();
          $('#loading').show();
        },
        success : function(data){
          location.href="index.php?mod=site&act=list";
        }
      });
    }
  });
});
</script>