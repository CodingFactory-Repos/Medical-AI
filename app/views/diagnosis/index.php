<?php
require APP_ROOT . '/views/inc/head.php';
?>

<body>
    <?php
    require APP_ROOT . '/views/inc/header.php';
    ?>
    <!-- <h3 class="articleTitle visible"><?= substr($data['articles']['articles'][$i]['title'], 0, 27) ?>...</h3> -->
    <main>
        <div class="diagnosisList">
            <h2 class="categoryName"><i class="fas fa-search"></i> Results</h2>
            <h2 id="diseaseName" class="diseaseText"><?= $data['issuesResults']['Name']?></h2>
            <h3 class="categoryName">Description : </h3>
            <div class="diseaseContainer">
                <h4 class="diseaseDesc diseaseText visible"><?= substr($data['issuesResults']['Description'], 0, 80) ?>...</h4>
                <h4 class="diseaseDesc diseaseText hidden"><?= $data['issuesResults']['Description'] ?></h4>
            </div>
            <h3 class="categoryName"> Détails : </h3>
            <div class="longDescContainer">
                <p class="diseaseLongDesc diseaseText visible"> <?= substr($data['issuesResults']['MedicalCondition'], 0, 80) ?>...</p>
                <p class="diseaseLongDesc diseaseText hidden"> <?= $data['issuesResults']['MedicalCondition'] ?></p>
            </div>
            <h3 class="categoryName">Symptômes possibles : </h3>
            <table class="diseaseListSymptoms diseaseText">
                <?php $sympromList = 0;
                $Symptoms = explode(",", $data['issuesResults']['PossibleSymptoms']);  ?>        

               
                <?php foreach ($Symptoms as $Symptom) : ?>
                    <?php if ($sympromList < 5) : ?>
                        <tr>
                        <td> <?= $Symptom ?></td>
                    </tr>
                    <?php $sympromList++; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
            <h3 class="categoryName">Nom scientifique : </h3>
            <p class="diseaseProName diseaseText"><?= $data['issuesResults']['ProfName'] ?></p>
            <h3 class="categoryName">Synonymes : </h3>
            <table class="diseaseListSymptoms ">
                <?php $synonymList = 0;
                $Synonyms = explode(",", $data['issuesResults']['Synonyms']);  ?>  

               
                <?php foreach ($Synonyms as $Synonym) :?>
                    <?php if ($synonymList < 3) :?>
                    <tr>
                        <td class="diseaseText"><?= $Synonym ?></td>
                    </tr>
                    <?php $synonymList++;
                endif; ?>
                <?php endforeach; ?>
            </table>
            <h3 class="categoryName">Traitement : </h3>
            <div class="treatmentContainer ">
            <p class="diseaseTreatment diseaseText visible"><?= substr($data['issuesResults']['TreatmentDescription'], 0, 80) ?>...</p>
                <p class="diseaseTreatment diseaseText hidden"><?= $data['issuesResults']['TreatmentDescription'] ?></p>
            <div>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/search/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>