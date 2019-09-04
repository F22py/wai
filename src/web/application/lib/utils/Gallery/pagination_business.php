<?php

$directory = '../images';

$numrows = $images_num;

// number of rows to show per page
$rowsperpage = 2;

$totalpages = ceil($numrows / $rowsperpage);


// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
$currentpage = (int)$_GET['currentpage'];
} else {
$currentpage = 1;
}


if ($currentpage > $totalpages) {
$currentpage = $totalpages;
}

if ($currentpage < 1) {
$currentpage = 1;
}

$offset = ($currentpage - 1) * $rowsperpage;

// range of num links to show
$range = 3;