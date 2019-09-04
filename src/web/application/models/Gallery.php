<?php
namespace application\models;
use application\core\Model;

class Gallery extends Model {
    public $collection = 'images_info';

    public function uploadPicture()
    {
        require 'application/lib/Gallery.php';

        if (!empty($_POST)){
            $image_title = $_POST['title'];
            $image_author = $_POST['author'];
        }else{
            $message = 'You haven\'t field all the fields correctly or internal error occurred';
            return $message;
        }


        $query = [
            'login' => $image_author,
        ];

        if (empty($_SESSION['id']) || empty($_SESSION['login'])){
            $db_data = $this->get_data($this->db, 'users', $query);
            foreach ($db_data as $data){
                if (isset($data['login'])){
                    $message = 'This author name is registered! Log in or chose another author name';
                    return $message;
                }
            }
        }

        if (isset($_POST['img_access'])){
            $img_access = $_POST['img_access'];
        }else{
            $img_access = 'public';
        }

        $watermark_text = $_POST['watermark'];
        $tmp_file_path = $_FILES['userfile']['tmp_name'];

        $size_acc = true;
        $message = '';

        if ($_FILES['userfile']['error'] != 0){
            $message = 'We can\'t upload your file due to internal error or restrictions. Contact with administrator';
            return $message;
        }

        if($_FILES['userfile']['size'] == 0){
            $message = 'An error occurred. File size problem.';
            return $message;

        } elseif ($_FILES['userfile']['size'] > 1048576){
            $size_acc = false;
        }

        if(extension_checker($tmp_file_path) == 'image/jpeg') {
            $file_ext = '.jpg';
        }elseif(extension_checker($tmp_file_path) == 'image/png'){
            $file_ext = '.png';
        }else{
            if ($size_acc){
                $message =  'Sorry, we only accept JPEG and PNG images';
                return $message;
            }
            else{
                $message =  'Sorry, we only accept JPEG and PNG images. File also is too big to upload!';
                return $message;
                }
        }

        if (!$size_acc){
            $message = 'File is too big';
            return $message;
        }



        $file_name = uniqid() . $file_ext;

        $blacklist = array(".php", ".phtml", ".php3", ".php4");

        foreach ($blacklist as $item) {
            if(preg_match("/$item\$/i", $file_name)) {
                if ($size_acc){
                    $message = 'You tried to upload PHP file. You\'re caught ;)';
                    return $message;
                }
                else{
                    $message =  'You tried to upload PHP file. You\'re caught ;). Also, File is too big to upload!';
                    return $message;
                }

            }
        }


        $uploaddir = './images/';
        if(!is_dir($uploaddir)){
            //Directory does not exist, so lets create it.
            mkdir($uploaddir, 0755);
        }
        $uploadfile = $uploaddir . basename($file_name);

        if (!empty($_SESSION['login'])){
            if (isset($_POST['author'])){
                if ($_SESSION['login'] != $_POST['author']){
                    $message = 'You\'re trying to upload picture for another person!';
                    return $message;
                }
            }
        }

        $data = [
            'title' => $image_title,
            'author' => $image_author,
            'file_name' => $file_name,
            'img_access' => $img_access,
        ];


        if (move_uploaded_file($tmp_file_path, $uploadfile)) {
            $message = 'File was successfully uploaded.';
            make_watermark($uploadfile, $uploaddir,30, 7, 50, array(0, 0, 0), $watermark_text);
            make_thumbnail($uploadfile, $uploaddir,200, 125);

            $this->insert_data($this->db, $this->collection, $data);
            return $message;

        } else {
            $message = 'Internal error.';
            return $message;
        }

    }

    public function showPictures(){

        $directory = './images'; //folder name

        $allowed_types = array(
            'jpg',
            'png'
        ); //allowed types of images

        $file_parts = array();
        $ext = '';
        $title = '';
        $images = array();

        //trying to open the folder

        $dir_handle = @opendir($directory) or die ("Directory fail to open the directory");
        while ($file = readdir($dir_handle)) //files search
        {
            if ($file == '.' || $file == '..')
                continue; //skip links to other folders
            $file_parts = explode('.', $file); //separate then title of the file
            $ext = strtolower($file_parts[1]); //last element is an extension
            if (in_array($ext, $allowed_types)) {
                if ((strpos($file, 'min_') === false) && (strpos($file, 'wm_') === false)) {
                    $images[] = $file; //ending list of images to array
                }
            }
        }

        closedir($dir_handle);

        $images_info = [];
        $images_num = 0;
        $checked = '';


        foreach ($images as $img){
            $query = [
                'file_name'=> $img,
            ];
            $db_data = $this->get_data($this->db, $this->collection, $query);
            foreach ($db_data as $single_data){
                if ($single_data['file_name'] == $img && $single_data['img_access'] == 'public') {
                    $images_num += 1;
                    if (isset($_SESSION['chosen_images'])){
                        foreach ($_SESSION['chosen_images'] as $checked_images) {
                            if ($single_data['_id'] == $checked_images){
                                $checked = 'checked';
                                break;
                            }else{
                                $checked = '';
                            }
                        }
                    }
                    $images_info[] = [
                        'id' => $single_data['_id'],
                        'image' => $img,
                        'title' => $single_data['title'],
                        'author' => $single_data['author'],
                        'checked' => $checked,
                        'img_access' => $single_data['img_access'],
                    ];
                }
            }

        }


        include 'application/lib/utils/Gallery/pagination_business.php';

        $vars = [
            'offset' => $offset,
            'rowsperpage' => $rowsperpage,
            'directory' => $directory,
            'images_num' => $images_num,
            'images' => $images_info,
            'currentpage' => $currentpage,
            'range' => $range,
            'totalpages'=>$totalpages,

        ];


        return $vars;
    }

    public function chosen_images(){
        if (!empty($_POST)){
            foreach ($_POST as $data){
                $_SESSION['chosen_images'][] = $data;
            }
            $message = 'Images were chosen';
            return $message;
        }else{
            $message = 'An error occurred';
            return $message;
        }
    }

    public function access_control(){
        if (!empty($_SESSION['id']) && !empty($_SESSION['login'])){
            $login = $_SESSION['login'];
            $readonly = 'readonly';
            $logged = true;
        }else{
            $login = '';
            $readonly ='';
            $logged = false;
        }
        $vars =[
            'login' => $login,
            'readonly' => $readonly,
            'logged' => $logged,
        ];
        return $vars;
    }

    public function live_search(){
        if (isset($_POST['referal'])){
            $find_query = $_POST['referal'];
        }else{
            $find_query = '';
        }
        $query = [
            'title' =>
                ['$regex' => $find_query, '$options' => 'i'
                ],
            'img_access' => 'public',
        ];
        $images_info =[];
        $db_data = $this->get_data($this->db, $this->collection, $query);
        foreach ($db_data as $data){
            $path = './images/' . $data['file_name'];
            if (realpath($path) != false) {
                $images_info[] = [
                    'id' => $data['_id'],
                    'image' => $data['file_name'],
                    'title' => $data['title'],
                    'author' => $data['author'],
                    'checked' => '',
                    'img_access' => $data['img_access'],
                ];
            }
        }
        $img_num = count($images_info);

        if ($find_query == ''){
            unset($images_info);
            $img_num = 0;
            $images_info = [];
        }
        $vars = [
            'images'=> $images_info,
            'img_num'=>$img_num,
            'directory' => './images/',
        ];
        return $vars;
    }


}