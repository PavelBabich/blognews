<?php

class Router{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }


    //возворащает строку запроса
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
           return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){
        //получить строку запроса
        $uri = $this->getURI();
        
        //проверить наличие такого запроса в routes.php
        foreach($this->routes as $uriPattern => $path){
            
            if(preg_match("~$uriPattern~", $uri)){

                //получить внутренний путь из внешнего 
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                //определить какой контроллер и action использовать
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments).'Controller');

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parametrs = $segments;

                //подключить файл класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                }

                //Создать объект, вызвать метод
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
                if($result != null){
                    break;
                }
            }
        }
    }
}