<?php
	/**
	 * Class Api
	 */
	class Api extends Controller {
		/**
		 * Api constructor.
		 */
		public function __construct() {
		    // Import SQL commands

			// $this->apiModel = $this->loadModel('apiModel');
		}
		
		/**
		 * views/api/index.php
		 */
		public function index($query, $option = null) {

			$data = [
                'result' => array()
			];

			if($query == "allSymptoms"){
				if($option == null){
					$data['result'] = json_encode(stockApi("allSymptoms", "https://healthservice.priaid.ch/symptoms?token=".TOKEN."&format=json&language=en-gb"));
				} else {
					$apiResult = stockApi("allSymptoms", "https://healthservice.priaid.ch/symptoms?token=".TOKEN."&format=json&language=en-gb");

					for($i = 0; $i < count($apiResult); $i++){
						if(strstr($apiResult[$i]['Name'], lcfirst($option))){
							array_push($data['result'], $apiResult[$i]);
						}

						if(strstr($apiResult[$i]['Name'], ucfirst($option))){
							array_push($data['result'], $apiResult[$i]);
						}
					}
					
					$data['result'] = json_encode($data['result']);
				}
			} else if($query == 'searchDiagnosis'){
				if($option == null){
					header('Location: '.URL_ROOT);
				} else {
					$apiResult = stockApi(str_replace(',', '-', $option), "https://healthservice.priaid.ch/diagnosis?symptoms=[".$option."]&gender=male&year_of_birth=18&token=".TOKEN."&format=json&language=en-gb", "symptoms");
					$data['result'] = json_encode($apiResult);
				}
			} else if($query == 'searchIssues') {
				if($option == null){
					header('Location: '.URL_ROOT);
				} else {
					$apiResult = stockApi($option, "https://healthservice.priaid.ch/issues/".$option."/info?token=".TOKEN."&format=json&language=en-gb", "issues");
					$data['result'] = json_encode($apiResult);
				}
			}
			
			$this->render('api/index', $data);
		}
	}
