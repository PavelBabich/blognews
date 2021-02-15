<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }


    //возворащает строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        //получить строку запроса
        $uri = $this->getURI();

        //проверяет, авторизован ли пользователь
        if (!isset($_SESSION['user']) && $uri != 'user/register') {
            $uri = 'user/login';
        }

        //проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                //убирает параметры из uri
                if (isset($_GET['sort'])) {
                    $uriArr = explode('?', $uri);
                    $uri = $uriArr[0];
                }

                //получить внутренний путь из внешнего 
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //определить какой контроллер и action использовать
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments) . 'Controller');

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parametrs = $segments;

                //передача в параметры данные сортировки
                if ($parametrs == null && isset($_GET['sort']) && isset($_GET['type'])) {
                    array_push($parametrs, $_GET['sort'], $_GET['type']);
                }

                //подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                //Создать объект, вызвать метод
                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $controllerObject = new $controllerName;
                    $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);

                    if (method_exists($controllerObject, $actionName)) {
                        //$result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
                    } else {
                        // require_once(ROOT . '/views/site/404.php');
                        // exit;
                    }
                } else {
                    // require_once(ROOT . '/views/site/404.php');
                    // exit;
                }


                if ($result != null) {
                    break;
                }
            }
        }
    }
}
