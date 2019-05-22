<?php

class ProductController extends Controller{

    public function index(){
        $this->view('home'.DS.'index');
        $this->view->render();
    }


    public function add(){
        $this->view('product'.DS.'add');
        $this->view->render();
    }

    public function manage(){
        $this->view('product'.DS.'manage');
        $this->view->render();
    }

    public function save(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);    
        $this->model('Products');
        $this->model->addProduct($post);
    }

    public function getProducts(){   
        $this->model('Products');
        $this->model->getProducts();
    }
    public function massDelete(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->model('Products');
        $this->model->massDelete($post);

    }

}