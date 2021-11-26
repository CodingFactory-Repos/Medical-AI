<?php

/**
 * @return bool
 * Check si l'utilisateur est connecté via le cookie dee seession
 */
function callApi($URL)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => $URL,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_POSTFIELDS => "",
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		return "cURL Error #:" . $err;
	} else {
		return json_decode($response, true);
	}
}

function discreetCallApi($URL)
{
	return json_decode(file_get_contents($URL), true);
}

function stockApi($name, $URL, $folder = "")
{
	if($folder !== ""){
		$rootURL = $folder . "/" . $name;
	} else {
		$rootURL = $name;
	}

	if(!is_dir('../app/api/' . $rootURL)){
		try {
			$apiContent = file_get_contents($URL);

			if(strpos($rootURL, '/')){
				if(!is_dir('../app/api/' . $folder)){
					mkdir('../app/api/' . $folder);
				}
				mkdir('../app/api/' . $rootURL);
			} else {
				mkdir('../app/api/' . $rootURL);
			}

            file_put_contents('../app/api/' . $rootURL . '/' . $name . '.json', $apiContent);
 
            return json_decode($apiContent, true);
        } catch (Exception $e) {
            return false;
        }
	} else {
		try {
            $file_path = '../app/api/' . $rootURL . '/' . $name . '.json';

            $file_data = file_get_contents($file_path);

            return json_decode($file_data, true);
        } catch (Exception $e) {
            return false;
        }
	}
}