<?php

// $request = $_SERVER['REQUEST_METHOD'];
// $path = $_SERVER['PATH_INFO'];

require_once('controllers/LeadController.php');
include_once('infra/ApiResponse.php');
include_once('infra/Request.php');
include_once('infra/Router.php');

$router = new Router(new Request);


$router->get('/', function() {
  ApiResponse::json([
    'message' => 'SPUN BACKEND'
  ]);
});

$router->post('/leads', function($request) {
  $leadController = new LeadController($request);
  $leadController->store();
});

?>