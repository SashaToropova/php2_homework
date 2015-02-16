<?php  

$page = $_GET['page'];  

$total = 100;


$onePage= '<a href= ./page?page=1> 1 </a>';

if ($page != 1) 

$pervpage = '<a href= ./page?page=1>  </a>  
             <a href= ./page?page='. ($page - 1) .'> </a> ';  

if ($page != $total) $nextpage = ' <a href= ./page?page='. ($page + 1) .'>  </a>  
                                   <a href= ./page?page=' .$total. '>  </a>';  


if($page - 2 > 0) $page2left = ' <a href= ./page?page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';  
if($page - 1 > 0) $page1left = '<a href= ./page?page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';  
if($page + 2 <= $total) $page2right = '  <a href= ./page?page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
if($page + 1 <= $total) $page1right = '  <a href= ./page?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

if ($page > 3) 
echo "$onePage";

echo "$pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage";

if ($page < ($total-3)) 
echo "<a href= ./page?page=$total> $total </a>";
?>
