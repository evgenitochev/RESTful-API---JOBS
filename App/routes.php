<?php

$router = new \App\Classes\Router();
$router->get('jobs/list', 'JobController', 'showAll');
$router->get('jobs/{id}', 'JobController', 'show');
$router->get('candidates/list', 'CandidateController', 'showAll');
$router->get('candidates/review/{id}', 'CandidateController', 'review');
$router->get('candidates/search/{id}', 'CandidateController', 'search');