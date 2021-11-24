<?php
	/**
	 * Class Search
	 */
	class Search extends Controller {
		/**
		 * Search constructor.
		 */
		public function __construct() {
		    // Import SQL commands

			//$this->userModel = $this->model('Index');
		}
		
		/**
		 * views/index.php
		 */
		public function index() {
			if(!isset($_GET['name']) && !isset($_GET['id'])) {
				header('Location: '.URL_ROOT);
			} else {
				$diagnosisResults = discreetCallApi(URL_ROOT."/api/searchDiagnosis/".$_GET['id']);

				$data = [
					'headTitle' => 'Welcome !',
					'cssFile' => 'search',
					'scriptFile' => 'search',
					'diagnosisResults' => $diagnosisResults
				];

				$this->render('search/index', $data);
			}
		}
	}
