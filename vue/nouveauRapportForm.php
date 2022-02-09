    <div class="nouveauRapForm">
            <!--FORM CREATION UN NOUVEAU RAPPORT-->
        <p class="textFormNouRap">Creation d'un nouveau rapport</p>
        <form action="./?action=enregistreRapport" method="POST">

            <!--DATE-->
		    <label for="date" class="nouvRapLabel">Date :</label>
		    <input type="date" name="date" class="dateNouvRapport" required oninvalid="this.setCustomValidity('Veuillez remplir ce champ')" oninput="this.setCustomValidity('')"/>

            <!--MEDECIN-->
            <label for="practicien" class="nouvRapLabel">Practicien :</label>
            <input list="practiciens" name="practicien" id="practicien" class="inputPrac" placeholder="Nom du médecin..." required oninvalid="this.setCustomValidity('Veuillez remplir ce champ')" oninput="this.setCustomValidity('')"/>
                <datalist id="practiciens">
                    <?php
                        for ($indexM=0; $indexM<count($listeMedecins); $indexM++){
                            ?>
                            <option value="<?php echo $listeMedecins[$indexM]->getNom()." ".$listeMedecins[$indexM]->getPrenom()?>">
                        <?php
                        }
                        ?>
                </datalist>

            <!--MOTIF-->
            <label for="motif" class="nouvRapLabel">Motif :</label>
		    <input type="text" id="motif" name="motif" class="motifNouvRap" required oninvalid="this.setCustomValidity('Veuillez remplir ce champ')" oninput="this.setCustomValidity('')"/>
            <br>

            <!--BILAN-->
            <br>
            <label for="bilan" class="nouvRapLabel">Bilan :</label>
            <textarea id="bilan" name="bilan" class="bilanNouvRap" required oninvalid="this.setCustomValidity('Veuillez remplir ce champ')" oninput="this.setCustomValidity('')"/></textarea>
            <br>

            <!--MEDICAMENTS-->
            <br>
            <p class="nouvRapLabelMedic">Médicament(s) : </p>

            <div>
                <label class="nouvRapLabel"><input class="radioclass" type="radio" name="sansMedicCheckbox" value="true" required oninvalid="this.setCustomValidity('Veuillez cocher ce champ')" oninput="this.setCustomValidity('')"/>Aucun médicament offert</label><br>
                <label class="nouvRapLabel"><input class="radioclass" type="radio" name="sansMedicCheckbox" value="false"/>Un/plusieurs médicament/s offert/s</label>
            </div>
            <br>
            <div class="true select"></div>
            <div class="false select">
                <div class="input_fields_wrap">
                    <button class="add_field_button">Ajouter un médicament</button>
                    <div>
                        <!--quantité-->
                        <label for="quantite" class="nouvRapLabelQttMedic">Quantité :</label>
                        <input type="number" name="mynumber[]" id="quantite" class="qttNouvRap">
            
                        <!--nom commercial-->
                        <label for="medicament" class="nouvRapLabelQttMedic"> Médicament :</label>
                        <input list="medicaments" name="mytext[]" id="medicament" class="inputPrac" placeholder="Nom du medicament...">
                        <datalist id="medicaments">
                            <?php
                            for ($indexM=0; $indexM<count($listeMedicaments); $indexM++){
                                ?>
                                <option value="<?php echo $listeMedicaments[$indexM]['nomCommercial']?>">
                            <?php
                            }
                            ?>
                        </datalist>
                    </div>    
                </div>
            </div>
            
		    <input type="submit" value="ENREGISTRER" class="submitRap" id="submitId">
		</form>

    </div>  
