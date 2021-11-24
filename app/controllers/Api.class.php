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

			//$this->userModel = $this->model('Api');
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
					$data['result'] = json_encode(discreetCallApi("https://healthservice.priaid.ch/symptoms?token=".TOKEN."&format=json&language=en-gb"));
				} else {
					$apiResult = discreetCallApi("https://healthservice.priaid.ch/symptoms?token=".TOKEN."&format=json&language=en-gb");

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
					$apiResult = discreetCallApi("https://healthservice.priaid.ch/diagnosis?symptoms=[".$option."]&gender=male&year_of_birth=18&token=".TOKEN."&format=json&language=en-gb");
					$data['result'] = json_encode($apiResult);
				}
			}
			
			$this->render('api/index', $data);
		}
	}
