<?php

use Orhanerday\OpenAi\OpenAi;

/**
 * Class Api
 */
class Api extends Controller
{
    /**
     * Api constructor.
     */
    public function __construct()
    {
        // Import SQL commands

        $this->aiModel = $this->loadModel('aiModel');
    }

    /**
     * views/api/index.php
     */
    public function index($query, $option = null)
    {

        $data = [
            'result' => array()
        ];

        if ($query == "allSymptoms") {
            if ($option == null) {
                $data['result'] = json_encode(stockApi("allSymptoms", "https://healthservice.priaid.ch/symptoms?token=" . TOKEN . "&format=json&language=en-gb"));
            } else {
                $apiResult = stockApi("allSymptoms", "https://healthservice.priaid.ch/symptoms?token=" . TOKEN . "&format=json&language=en-gb");

                for ($i = 0; $i < count($apiResult); $i++) {
                    if (strstr($apiResult[$i]['Name'], lcfirst($option))) {
                        array_push($data['result'], $apiResult[$i]);
                    }

                    if (strstr($apiResult[$i]['Name'], ucfirst($option))) {
                        array_push($data['result'], $apiResult[$i]);
                    }
                }

                $data['result'] = json_encode($data['result']);
            }
        } else if ($query == 'searchDiagnosis') {
            if ($option == null) {
                header('Location: ' . URL_ROOT);
            } else {
                $apiResult = stockApi(str_replace(',', '-', $option), "https://healthservice.priaid.ch/diagnosis?symptoms=[" . $option . "]&gender=male&year_of_birth=18&token=" . TOKEN . "&format=json&language=en-gb", "symptoms");
                $data['result'] = json_encode($apiResult);
            }
        } else if ($query == 'searchIssues') {
            if ($option == null) {
                header('Location: ' . URL_ROOT);
            } else {
                $apiResult = stockApi($option, "https://healthservice.priaid.ch/issues/" . $option . "/info?token=" . TOKEN . "&format=json&language=en-gb", "issues");
                $data['result'] = json_encode($apiResult);
            }
        } else if ($query == 'ai') {
            // Load your key from an environment variable
            $open_ai = new OpenAi(getenv('OPEN_AI_KEY'));

            if ($this->aiModel->addHistory("Client: " . $_GET['query'], 1)) {
                $history = $this->aiModel->getHistory();
                $prompt = "";
                for ($i = 0; $i < count($history); $i++) {
                    $prompt = $history[$i]['a_text_history'] . $prompt . "\n";
                }

                $complete = json_decode($open_ai->complete([
                    'engine' => 'davinci',
                    'prompt' => $prompt,
                    'temperature' => 0.7,
                    "max_tokens" => 100,
                    "top_p" => 1,
                    "frequency_penalty" => 0,
                    "presence_penalty" => 0,
                    "stop" => ["Client:"]
                ]), true);

                $results = [];

                for ($i = 0; $i < count($complete['choices']); $i++) {
                    // If $complete['choices'][$i]['text'] have a ":" in it, it's a symptom
                    if (strstr($complete['choices'][$i]['text'], "Client:")) {
                        $results[$i] = explode("Client:", $complete['choices'][$i]['text'])[0];
                    } else {
                        $results[$i] = $complete['choices'][$i]['text'];
                    }

                    // If $complete['choices'][$i]['text'] doesn't have a ":" in it, it's an issue
//                    if (strstr($complete['choices'][$i]['text'], "\n")) {
//                        $results[$i] = explode("\n", $results[$i])[0];
//                    }
                }


                if (!empty($results[0])) {
                    if ($this->aiModel->addHistory($results[0], 0)) {
                        $data['result'] = json_encode($this->aiModel->getHistory());
                    } else {
                        $data['result'] = json_encode(array("error" => "Error while bot saving history"));
                    }
                } else {
                    if ($this->aiModel->addHistory("Chatbot: Sorry I did not understand could you repeat ?", 0)) {
                        $data['result'] = json_encode($this->aiModel->getHistory());
                    } else {
                        $data['result'] = json_encode(array("error" => "Error while bot saving history"));
                    }
                }
            } else {
                $data['result'] = json_encode(array("error" => "Error while bot saving history"));
            }
        }

        $this->render('api/index', $data);
    }
}
