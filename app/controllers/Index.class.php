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
			$symptoms = discreetCallApi("https://sandbox-healthservice.priaid.ch/symptoms?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImQ4ZDFkZWUxLTlmNjYtNDA5Mi05MDNlLWVlYzU1ZDMyNTZlM0Bsb3VsZS5tZSIsInJvbGUiOiJVc2VyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc2lkIjoiOTk0NSIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvdmVyc2lvbiI6IjIwMCIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGltaXQiOiI5OTk5OTk5OTkiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXAiOiJQcmVtaXVtIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9sYW5ndWFnZSI6ImVuLWdiIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9leHBpcmF0aW9uIjoiMjA5OS0xMi0zMSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbWVtYmVyc2hpcHN0YXJ0IjoiMjAyMS0xMS0yMyIsImlzcyI6Imh0dHBzOi8vc2FuZGJveC1hdXRoc2VydmljZS5wcmlhaWQuY2giLCJhdWQiOiJodHRwczovL2hlYWx0aHNlcnZpY2UucHJpYWlkLmNoIiwiZXhwIjoxNjM3NzAzNzU0LCJuYmYiOjE2Mzc2OTY1NTR9.cKP0TEDp7P7xP2dPnbOaA05ZcfNFyyylbfltFJPsGCQ&format=json&language=en-gb");
			$symptomsRandomList = array();


			for($i = 0; $i < 6; $i++) {
				array_push($symptomsRandomList, $symptoms[array_rand($symptoms)]);
			}

			$data = [
                'headTitle' => 'Welcome !',
                'cssFile' => 'index',
				'articles' => callApi("https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=ef43bc7165c94de49c9206dc6f7c4a55"),
				'symptomsRandomList' => $symptomsRandomList
			];
			
			$this->render('index', $data);
		}
	}
