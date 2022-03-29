<?php
	/**
	 * Class Diagnosis
	 */
	class Diagnosis extends Controller {
		/**
		 * Diagnosis constructor.
		 */
		public function __construct() {
		    // Import SQL commands

			//$this->userModel = $this->model('Index');
		}
		
		/**
		 * views/index.php
		 */
		public function index($id) {
				$issuesResults = discreetCallApi(URL_ROOT."/api/searchIssues/".$id);
				

			

				$data = [
					'headTitle' => 'Welcome !',
					'cssFile' => 'diagnosis',
					'scriptFile' => 'search',
					'issuesResults' => $issuesResults
				];
				


				$this->render('diagnosis/index', $data);
			}
		}
	
	