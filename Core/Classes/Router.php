<?php
namespace App\Classes;


use App\Controllers\JobController;

class Router
{
    //CONTROLLERS NAMESPACE
    private $controllers_namespace = "App\\Controllers";

    public function get($route, $controller, $method)
    {
        //FETCHING PARAMETERS FROM THE URL
        $params = explode("/", $_GET['route']);
        //IF PARAMETERS ARE MORE THAN 1
        if (count($params) > 1) {
            $exploded_route = explode("/", $route);
            if (count($params) == count($exploded_route)) {

            }
        } else {
            //IF ROUTE PARAMETER IS EQUAL TO THE ROUTE
            if ($route == $_GET['route']) {
                //CALL CONTROLLER METHOD
                echo $this->callMethod($controller, $method);
            }
        }
    }

    private function callMethod($controller, $method)
    {
        //FULL NAMESPACE OF THE CLASS
        $controller = $this->controllers_namespace . "\\" . $controller;
        //MAKING A NEW INSTANCE
        $instance = new $controller();
        //CALLING AND RETURINING THE MEHTOD
        return $instance->$method();
    }

}