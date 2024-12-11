<?php


namespace App\classes;
use App\classes\Database;
use App\classes\Session;

class Site
{
    public  static  function display(){
        $sql = "SELECT * FROM `site`";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function updateSite($data){
        $footer = $data['footer-txt'];
        $title  = $data['title'];
        $post = $data['post'];

        if($_FILES['logo']['name'] == NULL){
            $sql = "UPDATE `site` SET `footer`='$footer',`title`='$title',`postdisplay`='$post' WHERE `id` = 1";
            $res = mysqli_query(Database::db(),$sql);
            if($res){
                Session::set('updatesite',"Update Successfully!");
                return;
            }
        }else{
            $image = $_FILES['logo']['name'];
            $img_ext = pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION);
            $image = 'logo'. '.' .$img_ext;
            $ext =  $this->imageChecker($img_ext);
            if($ext == false){
                Session::set('extNotmatch',"Logo should be png format !");
                return;
            }else{
                $sql = "UPDATE `site` SET `logo`= '$image',`footer`='$footer',`title`='$title',`postdisplay`='$post' WHERE `id` = 1";
                $res = mysqli_query(Database::db(),$sql);
                if($res){
                    $upload = '../uploads/' . $image;
                    move_uploaded_file($_FILES['logo']['tmp_name'],$upload);
                    Session::set('updatesite',"Update Successfully!");
                    return;
                }
            }
        }


    }
    public  static  function imageChecker($ext){
        if($ext == 'png' || $ext == 'PNG'){
            return true;
        }else{
            return false;
        }
    }
}