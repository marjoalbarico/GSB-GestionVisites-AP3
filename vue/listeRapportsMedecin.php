
<div class="divRapportMedecin">
    <p class="hOneDetMed">
        Tous les anciens rapports de visite de
        <?php echo $medecin['nom'] . ", " . $medecin['prenom'] ?>
    </p> 

    <div>

        <?php
        if (count($listeRapports)<1){
            ?>
                <p class="hOneDetMed">Aucun rapport</p>
            <?php
        }
        else{
            ?>
            <p class="hOneDetMed">Il existe <?php echo count($listeRapports)?> rapport(s)</p>
            <?php
            for ($i = 0; $i < count($listeRapports); $i++) {
                ?>
                <div class="classRapMedCard">
                        <p class="pMedCard">
                            Date : <?= $listeRapports[$i]['date']?><br>
                            Visiteur : 
                            <?php 
                            $visRap= VisiteurDAO::getVisiteurByIdRapport($listeRapports[$i]['id']);
                            echo $visRap['nom'].", ".$visRap['prenom'];
                            ?>
                            <br>
                            Motif : <?= $listeRapports[$i]['motif']?><br>
                            Bilan : <?= $listeRapports[$i]['bilan']?><br> 
                            <?php
                                $lesMedicaments=OffrirDAO::getMedicamentsByIdRapport($listeRapports[$i]['id']);

                                if (count($lesMedicaments)>0){
                                    echo (count($lesMedicaments))
                                    ?>
                                    médicament/s offert/s:<br>
                                    <?php
                                        for( $k = 0 ; $k < count($lesMedicaments) ; $k++){
                                            ?>
                                            <?= $lesMedicaments[$k]['quantite']." ".$lesMedicaments[$k]['nomCommercial']?><br>
                                        <?php
                                        }
                                }
                                else{
                                    ?>
                                    O médicament offert
                                    <?php
                                }
                            if ($visRap['id']==$idVisiteur){
                                echo "<a class='buttonModiRapMed' href='./?action=modifierRapport&id=" .$listeRapports[$i]['id']. "'>Modifier ce rapport</a>";
                            }
                            ?>
                            </p>
                </div>
            <?php
            }   
        }
            ?>
    </div>
</div>