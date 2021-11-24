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
		public function index($query = null) {
			if($query === null){
				header('Location: '.URL_ROOT);
			} else {
				$diagnosisResults = discreetCallApi(URL_ROOT."/api/searchDiagnosis/".$query);

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
