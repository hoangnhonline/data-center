<?php
$link = "index.php?mod=age&act=list";
$arrList = $model->getListSite();
?>
<h2 class="sub-header">Site List</h2>
<div class="panel-body">
    <button class="btn btn-primary btn-sm" type="button" onclick="location.href='index.php?mod=site&act=form-one'" style="float:right">Add one</button>   
    <button class="btn btn-primary btn-sm" type="button" onclick="location.href='index.php?mod=site&act=form'" style="float:right;margin-right:10px">Add Multi</button>   
</div>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="1%">#</th>
        <th>URL</th>
        <th width="1%">Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $i = 0;

      if(!empty($arrList)){                   

      foreach($arrList as $value){

      $i++;                                                
      ?>
      <tr>
        <td><?php echo $i ; ?></td>        
        <td><?php echo $value['url']; ?></td>
        <td>
          <a href="index.php?mod=site&act=form-one&id=<?php echo $value['id']; ?>" class="btn btn-primary btn-sm">
            Edit
          </a>
        </td>      
      </tr>  
      <?php }
      }else{ ?>                   
      <tr>
        <td colspan="3">No data found!</td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>