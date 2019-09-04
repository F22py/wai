<?php

putenv('GDFONTPATH=' . realpath('./public/fonts/'));

function extension_checker($file_path){
    $imageinfo = getimagesize($file_path);
    return $imageinfo['mime'];
}

function make_watermark($file_path, $uploaddir, $font_size , $x , $y ,$colors, $string){
    $file_ext = extension_checker($file_path);

    if($file_ext == 'image/jpeg'){
        $image = imagecreatefromjpeg($file_path);
    }
    elseif($file_ext == 'image/png'){
        $image = imagecreatefrompng($file_path);
    }
    $color = imagecolorallocate($image, $colors[0], $colors[1], $colors[2]);
    imagettftext($image, $font_size, 0, $x, $y, $color, 'arial', $string);

    $file_path = $uploaddir . 'wm_' . basename($file_path);

    if($file_ext == 'image/jpeg'){
        imagejpeg($image, $file_path);
    }
    elseif($file_ext == 'image/png'){
        imagepng($image, $file_path);

    }
    imagedestroy($image);

}

function make_thumbnail($src, $uploaddir,$desired_width, $desired_height) {
    $file_ext = extension_checker($src);

    if($file_ext == 'image/jpeg'){
        $source_image = imagecreatefromjpeg($src);
    }
    elseif($file_ext == 'image/png'){
        $source_image = imagecreatefrompng($src);
    }

    $width = imagesx($source_image);
    $height = imagesy($source_image);


    $dest = $uploaddir . 'min_' . basename($src);

    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);


    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);


    if($file_ext == 'image/jpeg'){
        imagejpeg($virtual_image, $dest);
    }
    elseif($file_ext == 'image/png'){
        imagepng($virtual_image, $dest);
    }
    imagedestroy($virtual_image);
}


