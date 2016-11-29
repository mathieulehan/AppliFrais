<?php
$this->load->helper('url');
?>
<div id="contenu">
	<h2>Suivi de paiement</h2>
	 	
	<?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
	 
	<table class="listeLegere">
		<thead>
			<tr>
				<th >Mois</th>
				<th >Visiteurs</th>  
				<th >Montant</th>  
				<th >Date modif.</th>  
				<th  colspan="4">Actions</th>              
			</tr>
		</thead>
		<tbody>
          
		<?php    
			foreach( $mesFiches as $uneFiche) 
			{

				$paiementLink = '';
				$rembourseLink = '';

				if ($uneFiche['id'] == 'VA') {
					$paiementLink = anchor('c_comptable/paiementFiche/'.$uneFiche['mois'].'/'. $uneFiche['idVisiteur'], 'paiement' , 'title="Mise en paiement de la fiche"');

				echo 
				'<tr>
					<td class="date">'.anchor('c_comptable/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
					<td class="libelle">'.$uneFiche['nom'].' '.$uneFiche['prenom'].'</td>
					<td class="montant">'.$uneFiche['montantValide'].'</td>
					<td class="date">'.$uneFiche['dateModif'].'</td>
					<td class="action">'.$paiementLink.'</td>

							
				</tr>';
			}
			
			elseif ($uneFiche['id'] == 'MP') {
				$rembourseLink = anchor('c_comptable/rembourseFiche/'.$uneFiche['mois'].'/'. $uneFiche['idVisiteur'], 'rembourser',  'title="Rembourser la fiche"');

				echo
				'		
					<tr>
					<td class="date">'.anchor('c_comptable/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
					<td class="libelle">'.$uneFiche['nom'].' '.$uneFiche['prenom'].'</td>
					<td class="montant">'.$uneFiche['montantValide'].'</td>
					<td class="date">'.$uneFiche['dateModif'].'</td>
					<td class="action">'.$rembourseLink.'</td>

				
				</tr>';
			}
			}
		?>	  
		</tbody>
    </table>

</div>
