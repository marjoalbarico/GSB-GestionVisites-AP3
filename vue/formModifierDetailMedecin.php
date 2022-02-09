<div class="modifDivForm2">
    <h1 class="hOneDetMed">Modification des informations</h1>
    <?php echo "<form action='./?action=modifierMedecin&id=" . $unMedecin['id'] . "' method='POST'>"; ?>
        <label for="nom" class="rapportModifLabel">Nom :</label>
		<input type="text" class="medecinModifInput" id="nom" name="nom" placeholder="<?= $unMedecin['nom']?>">
        <label for="prenom" class="rapportModifLabel">Prenom :</label>
		<input type="text" class="medecinModifInput" id="prenom" name="prenom" placeholder="<?= $unMedecin['prenom']?>">
        <label for="tel" class="rapportModifLabel">Téléphone :</label>
		<input type="tel" class="medecinModifInput" id="tel" name="tel" pattern="[0-9]{10}" placeholder="<?= $unMedecin['tel']?>">
        <br>
        <label for="adresse" class="rapportModifLabel">Adresse :</label>
		<input type="text" class="medecinModifInput2" id="adresse" name="adresse" placeholder="<?= $unMedecin['adresse']?>">

        <br>
        <label for="spec" class="rapportModifLabel">Spécialité complémentaire :</label>
		<input type="text" class="medecinModifInput" id="specialiteComplementaire" name="specialiteComplementaire" placeholder="<?= $unMedecin['specialiteComplementaire']?>">
        <label for="dept" class="rapportModifLabel">Département :</label>
        <input type="number" class="medecinModifInput" id="departement" name="departement" min="1" placeholder="<?= $unMedecin['departement']?>">
        <br>
        <input type="submit" value="ENREGISTRER" class="buttonRapportInput">
    </form>
</div>