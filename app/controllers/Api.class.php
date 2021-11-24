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
					$data['result'] = json_encode(discreetCallApi("https://healthservice.priaid.ch/symptoms?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImQ4ZDFkZWUxLTlmNjYtNDA5Mi05MDNlLWVlYzU1ZDMyNTZlM0Bsb3VsZS5tZSIsInJvbGUiOiJVc2VyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc2lkIjoiNzMwNyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvdmVyc2lvbiI6IjEwOSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGltaXQiOiIxMDAiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXAiOiJCYXNpYyIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGFuZ3VhZ2UiOiJlbi1nYiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvZXhwaXJhdGlvbiI6IjIwOTktMTItMzEiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXBzdGFydCI6IjIwMjEtMTEtMjMiLCJpc3MiOiJodHRwczovL2F1dGhzZXJ2aWNlLnByaWFpZC5jaCIsImF1ZCI6Imh0dHBzOi8vaGVhbHRoc2VydmljZS5wcmlhaWQuY2giLCJleHAiOjE2Mzc3NTA1NzgsIm5iZiI6MTYzNzc0MzM3OH0.XoRpnzdfLJ9IUP-ErdEIK_1peEQNqElvPxzD7hdFxls&format=json&language=en-gb"));
				} else {
					$apiResult = discreetCallApi("https://healthservice.priaid.ch/symptoms?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImQ4ZDFkZWUxLTlmNjYtNDA5Mi05MDNlLWVlYzU1ZDMyNTZlM0Bsb3VsZS5tZSIsInJvbGUiOiJVc2VyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc2lkIjoiNzMwNyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvdmVyc2lvbiI6IjEwOSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGltaXQiOiIxMDAiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXAiOiJCYXNpYyIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGFuZ3VhZ2UiOiJlbi1nYiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvZXhwaXJhdGlvbiI6IjIwOTktMTItMzEiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXBzdGFydCI6IjIwMjEtMTEtMjMiLCJpc3MiOiJodHRwczovL2F1dGhzZXJ2aWNlLnByaWFpZC5jaCIsImF1ZCI6Imh0dHBzOi8vaGVhbHRoc2VydmljZS5wcmlhaWQuY2giLCJleHAiOjE2Mzc3NTA1NzgsIm5iZiI6MTYzNzc0MzM3OH0.XoRpnzdfLJ9IUP-ErdEIK_1peEQNqElvPxzD7hdFxls&format=json&language=en-gb");

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
					$apiResult = discreetCallApi("https://healthservice.priaid.ch/diagnosis?symptoms=[".$option."]&gender=male&year_of_birth=18&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImQ4ZDFkZWUxLTlmNjYtNDA5Mi05MDNlLWVlYzU1ZDMyNTZlM0Bsb3VsZS5tZSIsInJvbGUiOiJVc2VyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc2lkIjoiNzMwNyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvdmVyc2lvbiI6IjEwOSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGltaXQiOiIxMDAiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXAiOiJCYXNpYyIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGFuZ3VhZ2UiOiJlbi1nYiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvZXhwaXJhdGlvbiI6IjIwOTktMTItMzEiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXBzdGFydCI6IjIwMjEtMTEtMjMiLCJpc3MiOiJodHRwczovL2F1dGhzZXJ2aWNlLnByaWFpZC5jaCIsImF1ZCI6Imh0dHBzOi8vaGVhbHRoc2VydmljZS5wcmlhaWQuY2giLCJleHAiOjE2Mzc3NTI4NDAsIm5iZiI6MTYzNzc0NTY0MH0.GTaSepkmBb4JR4RaBhINSQweJbpihsCRPJHXqIHzUJ0&format=json&language=en-gb");
					$data['result'] = json_encode($apiResult);
				}
			}
			
			$this->render('api/index', $data);
		}
	}
