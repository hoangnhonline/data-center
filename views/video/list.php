<?php
require_once "models/Backend.php";

$model = new Backend;

$link = "index.php?mod=video&act=list";
$link_form='';

if (isset($_GET['status']) && $_GET['status'] > -1) {
    $status = (int) $_GET['status'];
    $link.="&status=$status";
    $link_form.="&status=$status";    
} else {
    $status = -1;
}

if(isset($_GET['created_at'])){
    $created_at = ($_GET['created_at']);
    $link.='&created_at='.$created_at;
    $link_form.='&created_at='.$created_at;
}else{
    $created_at='';
}

$limit = 50;

$arrTotal = $model->getListVideo( $status, -1, -1);

$total_page = ceil($arrTotal['total'] / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$link_form.='&page='.$page;
$offset = $limit * ($page - 1);
$arrList = $model->getListVideo($status, $offset, $limit);

?>
<h2 class="sub-header">Video List</h2>

<div class="table-responsive">
  <div class="total row">
    <div class="col-md-12">
      <h4>Record found: <?php echo number_format($arrTotal['total']); ?></h4>
    <div>
  </div>
  <div class="clearfix"></div>
      <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>
      <div class="clearfix"></div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th width="1%">#</th>
        <th width="100px">Thumnail</th>        
        <th width="70%">Title</th> 
        <th>Status</th>
        <th width="1%">Created at</th>        
      </tr>
    </thead>
    <tbody>
      <?php

      $i = ($page-1)*$limit;

      if(!empty($arrList['data'])){                   

      foreach($arrList['data'] as $value){

      $i++;                                                
      ?>
      <tr>
        <td><?php echo $i ; ?></td>
        <td><img class="lazy" data-original="<?php echo $value['thumbnailUrl']; ?>" width="80px" /></td>
       
        <td><?php echo $value['title']; ?></td>
        <td><?php echo $value['status'] == 0 ? "Pusblished" : "Unlisted"; ?></td>
        <td style="white-space:nowrap">
          <?php echo date('d-m-Y', strtotime($value['created_at'])); ?>
        </td>        
      </tr>  
      <?php }
      ?>
      
    
      <?php
      } ?>            
    </tbody>
  </table>
  <div class="clearfix"></div>
      <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>
</div>