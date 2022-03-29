<?php
require APP_ROOT . '/views/inc/head.php';
?>

<body>
    <?php
    require APP_ROOT . '/views/inc/header.php';
    ?>
    <main>
        <div class="diagnosisList">
            <h2 class="categoryName"><i class="fas fa-search"></i> Results</h2>
            <h2 class="diseaseName diseaseText"><?= $data['issuesResults']['Name'] ?></h2>
            <h3 class="categoryName">Description : </h3>
            <p class="diseaseDesc diseaseText"><?= substr($data['issuesResults']['Description'], 0, 80) ?>...</pc>
            <h3 class="categoryName"> Détails : </h3>
            <p class="diseaseLongDesc diseaseText"> <?= substr($data['issuesResults']['MedicalCondition'], 0, 80) ?>...</p>
            <h3 class="categoryName">Symptômes possibles : </h3>
            <table class="diseaseListSymptoms ">
                <?php $Symptoms = explode(",", $data['issuesResults']['PossibleSymptoms']);  ?>        

               
                <?php foreach ($Symptoms as $Symptom) : ?>
                    <tr>
                        <td class="diseaseText"><?= $Symptom ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <h3 class="categoryName">Nom scientifique : </h3>
            <p class="diseaseProName diseaseText"><?= $data['issuesResults']['ProfName'] ?></p>
            <h3 class="categoryName">Synonymes : </h3>
            <table class="diseaseListSymptoms ">
                <?php $Synonyms = explode(",", $data['issuesResults']['Synonyms']);  ?>        

               
                <?php foreach ($Synonyms as $Synonym) : ?>
                    <tr>
                        <td class="diseaseText"><?= $Synonym ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <h3 class="categoryName">Traitement : </h3>
            <p class="diseaseTreatment"><?= substr($data['issuesResults']['TreatmentDescription'], 0, 80) ?>...</p>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/search/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>