<?php

include_once(__DIR__ . '/../config/database.php');
include_once(__DIR__ . '/../models/Lead.php');

class LeadController {
    private $db;
    private $request;

    public function __construct($request) {
      $this->db = new Database();
      $this->request = $request;
    }

    public function store () {
      $data = $this->request->getBody();
      
      $lead = new Lead($this->db);
      if($lead->store($data)){
        ApiResponse::json([
          'message' => 'Lead successfully stored'
        ]);
      }else{
        ApiResponse::json([
          'message' => 'Error on store lead',
          'data' => $data
        ], 400);
      }
      
    }

    
}
?>