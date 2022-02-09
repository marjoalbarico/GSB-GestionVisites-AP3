<div class="nouveauMedForm">
    <form action="./?action=consulterRapport" method="POST" id="centerDivMedecin">
            <label for="date" class="textFormMed">Rechercher un rapport (JJ-MM-AAAA) :</label>
            <input type="date" name="date" class="labelRMed">
            <input type="submit" value="RECHERCHER" class="submitRap2">

    </form>
</div>

<div class="divRapportMedecin">
    <p class="hOneDetMed">
        Tous vos rapports

    <div>

        <?php
        if (count($listeRapports)<1){
            ?>
                <p class="hOneDetMed">Aucun rapport</p>
            <?php
        }
        else{
            if ($date!=""){
                ?>
                <p class="hOneDetMed">Vous avez effectué <?php echo count($listeRapports)?> rapport(s) le <?php echo $date ?></p>
            <?php
            }
            else{
                ?>
                <p class="hOneDetMed">Vous avez effectué <?php echo count($listeRapports)?> rapport(s)</p>
            <?php
            }
            ?>
            
            <?php
            for ($i = 0; $i < count($listeRapports); $i++) {
                ?>
                <div class="classRapMedCard2">
                        <p>
                            Date (AAAA-MM-JJ) : <?= $listeRapports[$i]['date']?><br>
                            Médecin : 
                            <?php 
                            $medRap= MedecinDAO::getMedecinByIdRapport($listeRapports[$i]['id']);
                            echo $medRap['nom'].", ".$medRap['prenom'];
                            
                            echo "<a class='buttonModi' href='./?action=detailRapport&id=" . $listeRapports[$i]['id'] . "'>Voir plus →</a>"; ?>
                </div>
            <?php
            }   
        }
            ?>
    </div>
</div>