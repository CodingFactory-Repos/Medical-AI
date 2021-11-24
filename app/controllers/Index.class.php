<?php
	/**
	 * Class Index
	 */
	class Index extends Controller {
		/**
		 * Index constructor.
		 */
		public function __construct() {
		    // Import SQL commands

			//$this->userModel = $this->model('Index');
		}
		
		/**
		 * views/index.php
		 */
		public function index() {
			$symptoms = discreetCallApi("https://healthservice.priaid.ch/symptoms?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImQ4ZDFkZWUxLTlmNjYtNDA5Mi05MDNlLWVlYzU1ZDMyNTZlM0Bsb3VsZS5tZSIsInJvbGUiOiJVc2VyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc2lkIjoiNzMwNyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvdmVyc2lvbiI6IjEwOSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGltaXQiOiIxMDAiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXAiOiJCYXNpYyIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGFuZ3VhZ2UiOiJlbi1nYiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvZXhwaXJhdGlvbiI6IjIwOTktMTItMzEiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXBzdGFydCI6IjIwMjEtMTEtMjMiLCJpc3MiOiJodHRwczovL2F1dGhzZXJ2aWNlLnByaWFpZC5jaCIsImF1ZCI6Imh0dHBzOi8vaGVhbHRoc2VydmljZS5wcmlhaWQuY2giLCJleHAiOjE2Mzc3NTA1NzgsIm5iZiI6MTYzNzc0MzM3OH0.XoRpnzdfLJ9IUP-ErdEIK_1peEQNqElvPxzD7hdFxls&format=json&language=en-gb");
			$symptomsRandomList = array();

			for($i = 0; $i < 6; $i++) {
				array_push($symptomsRandomList, $symptoms[array_rand($symptoms)]);
			}

			$data = [
                'headTitle' => 'Welcome !',
                'cssFile' => 'index',
				'scriptFile' => 'index',
				'articles' => callApi("https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=ef43bc7165c94de49c9206dc6f7c4a55"),
				'symptomsRandomList' => $symptomsRandomList
			];
			
			$this->render('index/index', $data);
		}
	}
