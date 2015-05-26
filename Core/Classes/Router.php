<?php
namespace App\Classes;


use App\Controllers\JobController;

class Router
{
    private $is_already_shown = 0;
    //CONTROLLERS NAMESPACE
    private $controllers_namespace = "App\\Controllers";

    public function get($route, $controller, $method)
    {
        if (!$this->is_already_shown) {
            if (isset($_GET['route'])) {
                //FETCHING PARAMETERS FROM THE URL
                $params = explode("/", $_GET['route']);
                //IF PARAMETERS ARE MORE THAN 1
                if (count($params) > 1) {
                    $exploded_route = explode("/", $route);
                    if (count($params) == count($exploded_route)) {
                        $matching = true;
                        //PARAMETERS TO ADD TO THE METHOD
                        $params_to_method = [];
                        for ($i = 0; $i < count($exploded_route); $i++) {
                            if ($exploded_route[$i] != $params[$i]) {
                                $is_paramater = false;
                                //CHECKING IF THERE IS AN DYNAMIC PARAMETER IN THE URL
                                if (substr($exploded_route[$i], 0, 1) == "{" && substr($exploded_route[$i],
                                        strlen($exploded_route[$i]) - 1, 1) == "}"
                                ) {
                                    $param_index = substr($exploded_route[$i], 1, strlen($exploded_route[$i]) - 2);
                                    $is_paramater = true;
                                }
                                if (!$is_paramater) {
                                    $matching = false;
                                } else {
                                    //ADDING PARAMETER VALUE TO THE PARAMETERS
                                    $params_to_method[$param_index] = $params[$i];
                                }
                            }
                        }
                        if ($matching) {
                            //CALLING THE METHOD WITH PARAMETERS
                            echo $this->callMethod($controller, $method, $params_to_method);
                        }
                    }
                } else {
                    //IF ROUTE PARAMETER IS EQUAL TO THE ROUTE
                    if ($route == $_GET['route']) {
                        //CALL CONTROLLER METHOD
                        echo $this->callMethod($controller, $method);
                    }
                }
            } else {
                if ($route == "/") {
                    echo $this->callMethod($controller, $method);
                }
            }
        }
    }

    private function callMethod($controller, $method, $params_to_method = null)
    {
        $this->is_already_shown = 1;
        //FULL NAMESPACE OF THE CLASS
        $controller = $this->controllers_namespace . "\\" . $controller;
        //MAKING A NEW INSTANCE
        $instance = new $controller();

        //CALLING AND RETURINING THE MEHTOD
        return $instance->$method($params_to_method);
    }

}