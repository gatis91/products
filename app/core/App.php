<?php

class App{
    protected $controller='';
    protected $action='';
    protected $prams=[];


    public function __construct(){
        $this->prepareURL();
        // check if controller exists
        
        if(file_exists(CONTROLLER.$this->controller.'.php')){
            $this->controller=new $this->controller;
            // check if method exists
            
            if(method_exists($this->controller, $this->action)){                
                call_user_func_array([$this->controller, $this->action], $this->prams);
            }else{
                // if method doesnot exist load index method
                $this->action='index';
                $this->controller=new $this->controller;
                call_user_func_array([$this->controller, $this->action], $this->prams);
            }


        }else{
            // if controller does not exist load h0me page
            $this->controller='ProductController';
            $this->action='index';
            $this->controller=new $this->controller;
            call_user_func_array([$this->controller, $this->action], $this->prams);
        }
        
    }
    protected function prepareURL(){
        $request=trim($_SERVER['REQUEST_URI'], '/');
        
        // if request is empty it will load main hom page
        if(empty($request)){
            $this->controller='ProductController';
            $this->action='index';
        }

        if(!empty($request)){
            // split request into array
            $url=explode('/', $request );
            //  check if controller exists if not default controller is ProductController
            $this->controller=(isset($url[0]) ? $url[0].'Controller' : 'ProductController');
            // check if method exists if not default is index
            $this->action=isset($url[1]) ? $url[1] : 'index';
            // take out from request array first elements to get params
            unset($url[0], $url[1]);
            // check if there is params
            $this->prams=!empty($url) ? array_values($url): [];
        }
        
        
    }
}