<?php
 
  $url = "/task1.php";
  $url_page = "/task1.php?page=";
$count_pages = 20;
$active = 3;
$count_show_pages =5;


  if ($count_pages > 1) { 
    
    $left = $active - 1;
    $right = $count_pages - $active;
    if ($left < floor($count_show_pages / 2)) $start = 1;
    else $start = $active - floor($count_show_pages / 2);
    $end = $start + $count_show_pages - 1;
    if ($end > $count_pages) {
      $start -= ($end - $count_pages);
      $end = $count_pages;
      if ($start < 1) $start = 1;
    }
?>
  
  <div id="pagination">
    
    <?php if ($active != 1) { ?>
      <a href="<?=$url?>" title="First">&lt;&lt;&lt;</a>
      <a href="<?php if ($active == 2) { ?><?=$url?><?php } else { ?><?=$url_page.($active - 1)?><?php } ?>" title="Previous">&lt;</a>
    <?php } ?>
    <?php for ($i = $start; $i <= $end; $i++) { ?>
      <?php if ($i == $active) { ?><span><?=$i?></span><?php } else { ?><a href="<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$url_page.$i?><?php } ?>"><?=$i?></a><?php } ?>
    <?php } ?>
    <?php if ($active != $count_pages) { ?>
      <a href="<?=$url_page.($active + 1)?>" title="Next">&gt;</a>
      <a href="<?=$url_page.$count_pages?>" title="Last">&gt;&gt;&gt;</a>
    <?php } ?>
  </div>
<?php }

 ?>
