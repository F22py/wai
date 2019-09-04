<?php

namespace application\models;
use application\core\Model;

require_once 'application/lib/Account.php';

class Account extends Model
{
    public $collection = 'users';

    public function new_user()
    {
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            if ($login == '') {
                unset($login);
            }
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
            if ($password == '') {
                unset($password);
            }
        }
        if (isset($_POST['pass_rep'])) {
            $pass_rep = $_POST['pass_rep'];
            if ($pass_rep == '') {
                unset($pass_rep);
            }
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if ($email == '') {
                unset($password);
            }
        }


        if (empty($login) or empty($password) or empty($pass_rep) or empty($email)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        {
            $message = 'You have not filed all fields correctly. Try again';
            return $message;
        }

        $login = str_clr($login);
        $password = str_clr($password);
        $pass_rep = str_clr($pass_rep);
        $email = str_clr($email);


        if ($password == $pass_rep){
            true;
        }else{
            $message = 'Password was entered incorrectly.';
            return $message;
        }


        $query = [
            'login' => $login,
        ];
        $db_data = $this->get_data($this->db, $this->collection, $query);
        foreach ($db_data as $data){
            if($data['login'] != ''){
                $message = 'Login you have entered is already exist. Try again.';
                return $message;
            }
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = [
            'login' => $login,
            'password' => $password,
            'email' => $email,

        ];
        $this->insert_data($this->db, $this->collection, $query);
        $message = 'You have successfully registered.';
        return $message;


    }


    public function login_check()
    {
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            if ($login == '') {
                unset($login);
            }
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
            if ($password == '') {
                unset($password);
            }
        }

        if (empty($login) or empty($password)){
            $message = 'You have not filed all fields correctly. Try again';
            return $message;
        }

        $login = str_clr($login);
        $password = str_clr($password);


        $query = [
            'login' => $login,
        ];

        $db_data = $this->get_data($this->db, $this->collection, $query);


        foreach ($db_data as $dat) {
            if (password_verify($password, $dat['password'])){
                $_SESSION['login']=$dat['login'];
                $_SESSION['id']=$dat['_id'];
                $message = 'You have logged in!';
                return $message;
            }
        }
        $message = 'Incorrect data. Try again to login!';
        return $message;
        }


        public function login_form(){
        if (empty($_SESSION['login']) or empty($_SESSION['id']))
        {
            $msg = 'Jesteś zalogowany jako gość';
            $logged = false;
            $vars = [
                'logged' => $logged,
                'message' => $msg,
            ];
        }
        else
        {
            $msg = 'Jesteś zalogowany jako ' . $_SESSION['login'];
            $logged = true;
            $vars = [
                'logged' => $logged,
                'message' => $msg,
                'login' => $_SESSION['login'],

            ];
        }

        return $vars;
    }

    public function logout(){
        if (!empty($_SESSION['id']) && !empty($_SESSION['login'])){
            unset($_SESSION['id']);
            unset($_SESSION['login']);
            $message = 'You have logged out!';
        }
        else{
            $message = 'You are not logged in, so you cannot logout ;)';

        }
        return $message;
    }

    public function show_chosen_images(){
        if(!empty($_SESSION['chosen_images'])){
            $images_num = 0;
            $db_data = $this->get_data($this->db,'images_info');
            foreach ($db_data as $data){
                if (isset($_SESSION['chosen_images'])){
                    $path = './images/' . $data['file_name'];
                    foreach ($_SESSION['chosen_images'] as $checked_images){
                        if ($checked_images == $data['_id']){
                            if (realpath($path) != false) {
                                $images_info[] = [
                                    'id' => $data['_id'],
                                    'image' => $data['file_name'],
                                    'title' => $data['title'],
                                    'author' => $data['author'],
                                    'checked' => 'checked',
                                    'img_access' => $data['img_access'],
                                ];
                                $images_num += 1;
                            }
                        }
                    }
                }
            }

            include 'application/lib/utils/Gallery/pagination_business.php';

            if (empty($images_info)){
                $message = 'No images to show.';
                return $message;
            }

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
        }else{
            $message = 'No images to show.';
            return $message;
        }


    }

    public function uncheck_images()
    {
        if (isset($_SESSION['chosen_images']) && !empty($_POST)) {
            if (!empty($_SESSION['chosen_images'])) {
                foreach ($_POST as $data) {
                    foreach ($_SESSION['chosen_images'] as $chosen_image) {
                        if ($data == $chosen_image) {
                            $key = array_search($chosen_image, $_SESSION['chosen_images']);
                            unset($_SESSION['chosen_images'][$key]);
                        }
                    }
                }
                $message = "Images were successfully unchecked";
                return $message;
            } else {
                $message = "An error occured!";
                return $message;
            }

        } else {
            $message = "You haven't chosen any picture";
            return $message;
        }
    }

    public function show_private_images(){
        $images_info = [];
        $images_num = 0;


        if (!empty($_SESSION['login'])){
            $login = $_SESSION['login'];
        }else{
            $message = 'You are not logged in!';
            return $message;
        }


        $query = [
                'author' => $login,
                'img_access'=> 'private',

            ];
        $db_data = $this->get_data($this->db, 'images_info', $query);
            foreach ($db_data as $single_data){
                $path = './images/' . $single_data['file_name'];
                if (realpath($path) != false) {
                    $images_num += 1;
                    $images_info[] = [
                        'id' => $single_data['_id'],
                        'image' => $single_data['file_name'],
                        'title' => $single_data['title'],
                        'author' => $single_data['author'],
                        'checked' => '',
                        'img_access' => $single_data['img_access'],
                    ];
                }
            }

        if (empty($images_info)){
            $message = 'No images to show.';
            return $message;
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

        public function live_search(){
        echo 'daa';
        }
}

