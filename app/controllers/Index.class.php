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
			$symptoms = stockApi("allSymptoms", "https://healthservice.priaid.ch/symptoms?token=".TOKEN."&format=json&language=en-gb");
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
