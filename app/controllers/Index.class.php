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
			$data = [
                'headTitle' => 'Welcome !',
                'cssFile' => 'index',
				'articles' => callApi("https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=ef43bc7165c94de49c9206dc6f7c4a55")
			];
			
			$this->render('index', $data);
		}
	}
