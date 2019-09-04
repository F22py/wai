<?php

// if not on page 1, don't show back links
if ($currentpage > 1) {
    echo " <a href='{$route}?currentpage=1'><<</a> ";
    $prevpage = $currentpage - 1;
    echo " <a href='{$route}?currentpage=$prevpage'><</a> ";
}

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
    // if it's a valid page number...
    if (($x > 0) && ($x <= $totalpages)) {
        // if we're on current page...
        if ($x == $currentpage) {
            // make it bold
            echo " [<b>$x</b>] ";
        } else {
            echo " <a href='{$route}?currentpage=$x'>$x</a> ";
        }
    }
}

// if not on last page, show forward and last page links
if ($currentpage != $totalpages) {
    $nextpage = $currentpage + 1;

    echo " <a href='{$route}?currentpage=$nextpage'>></a> ";
    echo " <a href='{$route}?currentpage=$totalpages'>>></a> ";
}
