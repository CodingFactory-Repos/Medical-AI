<?php
	/**
	 * Class Index
	 */
	class Godmode extends Controller {
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

			for($i = 0; $i < count($symptoms); $i++) {
				$diagnosisResults = discreetCallApi(URL_ROOT."/api/searchDiagnosis/".$symptoms[$i]['ID']);

				if($diagnosisResults === NULL){
					echo "No Diagnosis null " . $symptoms[$i]['ID'] . "<br>";
					// Delete folder commands
					// unlink("../app/api/symptoms/".$symptoms[$i]['ID']);
				} else {
					for($j = 0; $j < count($diagnosisResults); $j++) {
						$issuesResults[] = stockApi($diagnosisResults[$j]['Issue']['ID'], "https://healthservice.priaid.ch/issues/".$diagnosisResults[$j]['Issue']['ID']."/info?token=".TOKEN."&format=json&language=en-gb", "issues");
					}
				}

				
			}
		}
	}
