<?php
	// This file is part of BBJ.PHP by khuxkm fbexl
	// Licensed under MIT.
	// The actual BBJ interaction class.
	class BBJ {
		public function __construct($host,$port) {
			$this->base_url = "http://{$host}:${port}/api/";
		}
		public function request($api_method,$params) {
			$ctx = stream_context_create(array("http"=>array("method"=>"POST","header"=>"Content-Type: text/json","content"=>json_encode($params))));
			return json_decode(file_get_contents($this->base_url.$api_method,FALSE,$ctx),true);
		}
		public function thread_index($include_op=FALSE) {
			return $this->request("thread_index",array("include_op"=>$include_op));
		}
		public function thread_load($thread_id,$format=null,$op_only=FALSE) {
			return $this->request("thread_load",array("thread_id"=>$thread_id,"format"=>$format,"op_only"=>$op_only));
		}
	}
?>
