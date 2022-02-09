<br>
<div class="modifDivForm">
    <h1 class="hOneDetMed">Modification des informations</h1>
    <?php echo "<form action='./?action=modifierRapport&id=" . $id . "' method='POST'>"; ?>
        <label for="date" class="rapportModifLabelNew">Date (JJ-MM-AAAA) :</label>
		<input type="date" name="date" class="dateNouvRapport">

        <label for="practicien" class="rapportModifLabelNew">Practicien :</label>
            <input list="practiciens" name="practicien" id="practicien" class="inputPrac" placeholder="<?php echo $unMedecin['nom']." ".$unMedecin['prenom']?>"/>
                <datalist id="practiciens">
                    <?php
                        for ($indexM=0; $indexM<count($listeMedecins); $indexM++){
                            ?>
                            <option value="<?php echo $listeMedecins[$indexM]->getNom()." ".$listeMedecins[$indexM]->getPrenom()?>">
                        <?php
                        }
                        ?>
                </datalist>

        <label for="motif" class="rapportModifLabelNew">Motif :</label>
		<input type="text" class="rapportModifInputMotifNew" id="motif" name="motif" placeholder="<?= $unRapport['motif']?>">
        <br>

        <label for="bilan" class="rapportModifLabelNew">Bilan :</label>
		<input type="text" class="rapportModifInputBilanNew" id="bilan" name="bilan" placeholder="<?= $unRapport['bilan']?>">
        <br>

        <label for="medic" class="rapportModifLabelNew">Médicament(s) offert(s):</label>
        <?php
            

            if (count($lesMedicamentsOfferts)>0){
                for( $k = 0 ; $k < count($lesMedicamentsOfferts) ; $k++){
                    echo "<p class='supMedicRap'>".$lesMedicamentsOfferts[$k]['quantite']." ".$lesMedicamentsOfferts[$k]['nomCommercial']."<a  href='./?action=modifierRapport&id=".$id."&idMedSup=".$lesMedicamentsOfferts[$k]['nomCommercial']."'> : Supprimer</a></p>";
                }
            } else {
                echo "<p class='supMedicRap'> Aucun médicament </p>";
            }
            ?>
        
        
        <input type="submit" value="ENREGISTRER" class="buttonRapportInput">
    </form>
</div>