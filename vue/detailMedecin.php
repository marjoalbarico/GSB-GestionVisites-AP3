    <h1 class="hOneDetMed">Informations concernant le medecin : </h1>

    <table id="tableMedecin">
        <tr>
            <td id="nomTableMed" colspan="2"><?php echo $unMedecin['nom']. ", " . $unMedecin['prenom']?></td>
        </tr>
        
        <?php if ($unMedecin['specialitecomplementaire']!=""){
            ?>
            <tr>
                <td>Spécialité complementaire</td>
                <td><?php echo $unMedecin['specialitecomplementaire']?></td>
            </tr>    
        <?php
        }
        ?>

        <tr>
            <td>Adresse</td>
            <td><?= $unMedecin['adresse']?></td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td><?= $unMedecin['tel']?></td>
        </tr>
        <tr>
            <td>Numéro département</td>
            <td><?= $unMedecin['departement']?></td>
        </tr>
    </table>
    <?php echo "<a class='buttonInfoMed' href='./?action=modifierMedecin&id=" . $unMedecin['id'] . "'>Modifier les informations</a>"; ?>

    <?php echo "<a class='buttonInfoMed' href='./?action=rapportsMedecin&id=" . $unMedecin['id'] . "'>Voir tous les anciens rapports de visite concernant ce médecin</a>"; ?>
    <a class="buttonInfoMed" href="./?action=consulterMedecin">Retourner</a>



