<div class="nouveauMedForm">
    <form action="./?action=chercherMedecin" method="POST" id="centerDivMedecin">
            <label for="practicien" class="textFormMed">Rechercher un médecin :</label>
            <input type="text" name="nom" class="labelRMed" placeholder="Nom du médecin..." value="<?php $nom ?>" />
            <input type="submit" value="RECHERCHER" class="submitRap2">

    </form>
</div>

<h1 class="headlisteMed">Liste des médecins</h1>
    <div class="listeMedecinsDiv"> 

   <?php
    for ($i = 0; $i < count($listeMedecins); $i++) {
        ?>


        <div class="cardMed">
                <img src="./img/iconDoc.png" class="imgIconDoc">
                <div class="nomMedCard"><?php echo $listeMedecins[$i]['nom'] . " <br>" . $listeMedecins[$i]['prenom'] ."<br>" ; ?>
                </div>
                <?php echo "<a class='buttonVoirPlus' href='./?action=detailUnMedecin&id=" . $listeMedecins[$i]['id'] . "'>Voir plus →</a>"; ?>

        </div>
        <?php
    }
    ?>
</div>