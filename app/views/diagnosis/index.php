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
            <p class="diseaseDesc diseaseText"><?= $data['issuesResults']['Description'] ?></pc>
            <h3 class="categoryName"> Détails : </h3>
            <p class="diseaseLongDesc diseaseText"> <?= $data['issuesResults']['MedicalCondition'] ?></p>
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
            <p class="diseaseTreatment"><?= $data['issuesResults']['TreatmentDescription'] ?></p>
        </div>
    </main>

    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>