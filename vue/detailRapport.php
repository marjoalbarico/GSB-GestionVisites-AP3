<h1 class="hOneDetMed">Informations concernant le rapport : </h1>
<table id="tableMedecin">
        <tr>
            <td id="nomTableMed" colspan="2"><?php echo "Le ".$unRapport['date']."<br>"?></td>
        </tr>

        <tr>
            <td>Médecin</td>
            <td><?php echo $unRapport['nom'].", ".$unRapport['prenom']?></td>
        </tr>

        <tr>
            <td>Motif</td>
            <td><?= $unRapport['motif']?></td>
        </tr>

        <tr>
            <td>Bilan</td>
            <td><?= $unRapport['bilan']?></td>
        </tr>
        <tr>
        <?php
            
            if (count($lesMedicamentsOfferts)>0){
                echo "<td>".(count($lesMedicamentsOfferts))
                ?>
                    médicament/s offert/s:</td>
                    <td>
                <?php
                for( $k = 0 ; $k < count($lesMedicamentsOfferts) ; $k++){
                ?>
                    <?= $lesMedicamentsOfferts[$k]['quantite']." ".$lesMedicamentsOfferts[$k]['nomCommercial']?><br>
                    <?php
                }
                ?>
                </td>
                <?php
            }else{
            ?>
                <td>O médicament offert</td>
                <td></td>
                <?php
            }
        ?>
        </tr>
        

</table>

<?php echo "<a class='buttonInfoMed' href='./?action=modifierRapport&id=" .$id. "'>Modifier les informations</a>"; ?>

<?php echo "<a class='buttonInfoMed' href='./?action=supprimerRapport&id=" .$id. "'>Supprimer ce rapport</a>"; ?>

<a class="buttonInfoMed" href="./?action=consulterRapport">Retourner</a>



