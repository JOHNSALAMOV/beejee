<?php
if(!defined('SLGH')){
header("HTTP/1.0 404 Not Found");
exit;
}
function pagination($ver,$per_page = 3,$page = 1, $url = '?') {
global $db;
$query = $db->query("SELECT * FROM sl_todo");
$total = $query->num_rows;
$adjacents = "2";
$page = ($page == 0 ? 1 : $page);
$start = ($page - 1) * $per_page;
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($total/$per_page);
$lpm1 = $lastpage - 1;
$pagination = "";
if($lastpage > 1)
{
$pagination .= "<div class='section mt-2 mb-2'><ul class='pagination'>";
if ($lastpage < 7 + ($adjacents * 2))
{
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
else
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$counter'>$counter</a></li>";
}
}
elseif($lastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
else
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$counter'>$counter</a></li>";
}
$pagination.= "<li class='disabled page-item'><a class='page-link'>...</a></li>";
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$lpm1'>$lpm1</a></li>";
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$lastpage'>$lastpage</a></li>";
}
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<li class='page-item'><a class='page-link' href='1'>1</a></li>";
$pagination.= "<li class='page-item'><a class='page-link' href='2'>2</a></li>";
$pagination.= "<li class='disabled page-item'><a class='page-link'>...</a></li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$pagination.= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
else
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$counter'>$counter</a></li>";
}
$pagination.= "<li class='disabled page-item'><a class='page-link'>...</a></li>";
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$lpm1'>$lpm1</a></li>";
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$lastpage'>$lastpage</a></li>";
}
else
{
$pagination.= "<li class='page-item'><a class='page-link' href='1'>1</a></li>";
$pagination.= "<li class='page-item'><a class='page-link' href='2'>2</a></li>";
$pagination.= "<li class='disabled page-item'><a class='page-link'>...</a></li>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<li class='page-item active'><a class='page-link'>$ver/$counter</a></li>";
else
$pagination.= "<li class='page-item'><a class='page-link' href='$ver/$counter'>$counter</a></li>";
}
}
}
$pagination.= "</ul></div>\n";
}
return $pagination;
}
?>