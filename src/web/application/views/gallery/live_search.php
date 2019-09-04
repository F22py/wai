<?php
if ($img_num!=0):
for ($i=0; $i < $img_num; $i++):
    $wm_path = $directory . '/wm_'. $images[$i]['image'];
    $min_path = $directory.'/min_'.$images[$i]['image'];
    ?>
    <a href="<?php echo $wm_path ?>">
        <img src="<?php echo $min_path ?>" class="pimg" title="<?php echo $images[$i]['title']?>" alt="<?php echo $images[$i]['title']?>"
        </img>
    </a><br>
    Author: <?php echo $images[$i]['author'] ?><br>
    Title: <?php echo $images[$i]['title'] ?><br>
<?php
endfor;
endif;?>