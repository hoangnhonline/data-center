<?php
$link = "index.php?mod=age&act=list";
$site_id = isset($_GET['site_id']) ? (int) $_GET['site_id'] : -1;
$arrList = $model->getList('cate_setting', -1, -1);
$arrListSite = $model->getListSite();
?>

    <h2 class="sub-header">Category List</h2>
 
  
<div class="clearfix"></div>
<div class="panel-body">  
         
        <button class="btn btn-primary btn-sm" type="button" onclick="location.href='index.php?mod=cate&act=form'" style="float:right">Add new</button>      
           
   
  </div>
  <div class="total row">
    <div class="col-md-12">
      <h4>Record found: <?php echo number_format(count($arrList['data'])); ?></h4>
    </div>
  </div>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="1%">#</th>        
        <th>Cate</th>       
        <th width="1%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $i = 0;

      if(!empty($arrList['data'])){                   

      foreach($arrList['data'] as $value){

      $i++;                                                
      ?>
      <tr>
        <td><?php echo $i ; ?></td>
        <td><?php 
        echo $value['name'];
        ?></td>        
        <td style="vertical-align:middle">
          <a href="index.php?mod=cate&act=form&id=<?php echo $value['id']; ?>" title="edit"> 
            <span class="glyphicon glyphicon-pencil"></span>
          </a>  
          &nbsp;&nbsp
          <a href="controllers/delete.php?mod=cate&id=<?php echo $value['id']; ?>" title="delete" onclick="return confirm('Are you sure?'); "> 
            <span class="glyphicon glyphicon-trash"></span>
          </a>        
        </td>
      </tr>  
      <?php }
      } ?>                   
    </tbody>
  </table>
</div>
<script type="text/javascript">
$(function(){
  $('#site_id').change(function(){
    location.href="index.php?mod=cate&act=list&site_id=" + $(this).val();
  })
});
</script>