<?php for ($io = $offset; $io < ($offset + $rowsperpage); $io++):?>
<?php if($io >= $images_num)break; ?>
<?php
    $wm_path = $directory . '/wm_'. $images[$io]['image'];
    $min_path = $directory.'/min_'.$images[$io]['image'];
?>
    <a href="<?php echo $wm_path ?>">
        <img src="<?php echo $min_path ?>" class="pimg" title="<?php echo $images[$io]['title']?>" alt="<?php echo $images[$io]['title']?>"
        </img>
    </a><br>
    Author: <?php echo $images[$io]['author'] ?><br>
    Title: <?php echo $images[$io]['title'] ?><br>
    <?php if($images[$io]['img_access'] != 'private'): ?>
        <input type="checkbox" name="<?php echo $io ?>" value="<?php echo $images[$io]['id'] ?>" <?php echo $images[$io]['checked'] ?>><br>
    <?php endif; if($images[$io]['img_access'] == 'private'): ?>
    Zdjęcie jest prywatne<br>
    <?php endif;?>
<?php endfor; ?>
