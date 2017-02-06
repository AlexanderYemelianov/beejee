<?php

class TasksController extends Controller {

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Task();
    }

    public function index()
    {
        $by = strtolower($this->params[0]);
        $this->data = $this->model->getListBy($by);
    }

    public function add()
    {
        if($_POST){
            $result = $this->model->save($_POST, $_FILES);
            if($result){
                Session::setFlash('Success!');
            }else{
                Session::setFlash('Failed!');
            }
            Router::redirect('/tasks');
        }
    }

    public function admin_index()
    {
        $by = strtolower($this->params[0]);
        $this->data = $this->model->getListBy($by);
    }

    public function admin_edit()
    {
        if($_POST){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if($result){
                Session::setFlash('Success!');
            }else{
                Session::setFlash('Failed!');
            }
            Router::redirect('/admin/tasks');
        }

        if(isset($this->params[0])){
            $this->data = $this->model->getById($this->params[0]);
        }else{
            Session::setFlash('There is no page with id: ' .  $this->params[0]);
            Router::redirect('/admin/tasks');
        }
    }

    public function admin_markAsDone()
    {
        if(isset($this->params[0])){
            $this->data = $this->model->markAsDone($this->params[0]);
        }
        Router::redirect('/admin/tasks');
    }

}