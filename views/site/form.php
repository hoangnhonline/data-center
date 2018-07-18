<?php 
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$arrDetail = array();
if($id > 0){
  $arrDetail = $model->getDetail("sites", $id);
}
?>
<div class="row">

    <h2>Add multiple sites</h2>

  <div style="text-align:right">    
    <button class="btn btn-default btn-sm" type="button" onclick="location.href='index.php?mod=site&act=list'">Back</button>
  </div>
<div class="clearfix"></div>
<div class="bs-example" data-example-id="basic-forms">
  <div id="divForm">
    <form action="controllers/site-multi.php" method="POST" id="formMulti">
      <input type="hidden" name="id" value="<?php echo $id; ?>">    
      <div class="form-group">
        <label for="name">Site list (Ex : http://site-1.com; http://site-2.com)</label>
        <textarea name="site_url" id="site_url" rows="10" class="form-control"></textarea>      
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
    if($('#site_url').val() == ""){
      alert('Please enter Site list'); return false;
    }else{
      $.ajax({
        url : $('#formMulti').attr('action'),
        data : $('#formMulti').serialize(),
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