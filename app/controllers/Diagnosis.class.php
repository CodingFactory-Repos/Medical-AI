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
		public function index() {
			if(!isset($_GET['name']) && !isset($_GET['id'])) {
				header('Location: '.URL_ROOT);
			} else {
				$issuesResults = discreetCallApi(URL_ROOT."/api/searchIssues/".$_GET['id']);

				$issuesResults = [];

				foreach ($issuesResults as $issuesResult) {
					$issuesResults[] = stockApi($issuesResult['Issue']['ID'], "https://healthservice.priaid.ch/issues/".$issuesResult['Issue']['ID']."/info?token=".TOKEN."&format=json&language=en-gb", "issues");
				}

				$data = [
					'headTitle' => 'Welcome !',
					'cssFile' => 'search',
					'scriptFile' => 'search',
					'diagnosisResults' => $issuesResults,
					'issuesResults' => $issuesResults
				];

				$this->render('diagnosis/index', $data);
			}
		}
	}
