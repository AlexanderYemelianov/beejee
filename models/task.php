<?php

class Task extends model{

    public function getListBy($by)
    {

        $sql = "SELECT * FROM `tasks`";

        switch ($by) {
            case 'name':
                $sql .= " ORDER BY `name`";
                break;
            case 'email':
                $sql .= " ORDER BY `email`";
                break;
            case 'status':
                $sql .= " ORDER BY `done` DESC";
                break;
        }

        return $this->db->query($sql);
    }

    public function save($data, $file, $id = null)
    {
        if(!isset($data['name']) || !isset($data['email']) || !isset($data['task']) || !isset($file['img']['tmp_name']) ){
            return false;
        }else{
            $id = (int)$id;
            $name = $data['name'];
            $email = $data['email'];
            $task = $data['task'];

            //Img checking resizing and saving to specific directory

            $whiteList = Config::getSettings('upload_img_white_list');
            $imgDir = ROOT.DS.Config::getSettings('img_directory').DS;
            $newWidth = Config::getSettings('img_width_for_resize');
            $newHeight = Config::getSettings('img_height_for_resize');

            $fileType = getimagesize($file['img']['tmp_name']);
            $result = in_array(strtolower($fileType['mime']), $whiteList);
            if(!empty($result)){
                return false;
            }

            $tmpName = $file['img']['tmp_name'];
            $imgName = mt_rand() . ' - ' . $file['img']['name'];
            if(!is_uploaded_file($tmpName)){
                return false;
            }else{
                if(move_uploaded_file($tmpName, $imgDir.$imgName)){
                    ImgResizer::imgResize($newWidth, $newHeight, $imgDir.$imgName, $imgDir.$imgName);
                }else{
                    return false;
                }
            }
        }

        if(!$id){
            $sql = "INSERT INTO `tasks` SET 
              `name` = '{$name}', 
              `email` = '{$email}', 
              `task_text` = '{$task}',
              `img` = '{$imgName}'
            ";
        }else{
            $sql = "UPDATE `tasks` SET 
              `name` = '{$name}', 
              `email` = '{$email}', 
              `task_text` = '{$task}',
              `img` = '{$imgName}'
              WHERE `id` = '{$id}'
            ";
        }
        return $this->db->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM `tasks` WHERE `id` = '{$id}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function markAsDone($id)
    {
        $sql = "UPDATE `tasks` SET `done` = 1 WHERE `id` = '{$id}'";
        return $this->db->query($sql);
    }
}