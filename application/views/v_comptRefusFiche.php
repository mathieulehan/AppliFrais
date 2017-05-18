<?php
    $this->load->helper('url');
    $path = base_url();
?>

<div id="contenu">

<form method="POST" action="<?php echo $path.'c_comptable/refusFiche';?>">
    <h2>Veuiller inscrire un commentaire justifiant le refus de la fiche <?php echo $mois ?></h2>
    <input type="text" name="idVisiteur" value="<?php echo $idVisiteur?> "><br>
        <input type="text" name="mois" value="<?php echo $mois?> "><br>

  <textarea name='comment' style="height:200px; width:600px" id='comment'></textarea><br />
                    <input type="submit" value="Valider" name="valider"/>

    <?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';


    ?>
        </tbody>
    </table>
</form>
</div>