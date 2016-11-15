<?php
	$this->load->helper('url');
?>
<div id="contenu">
	<h2>Liste de mes fiches de frais</h2>
	 	
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
				$refusLink = '';
				$valideLink = '';
				$modLink = '';

				if ($uneFiche['id'] == 'CL') {
					$refusLink = anchor('c_comptable/refusFiche/'.$uneFiche['mois'], 'refuser',  'title="Refuser la fiche"');
					$valideLink = anchor('c_comptable/valideFiche/'.$uneFiche['mois'], 'valider',  'title="Valider la fiche"  onclick="return confirm(\'Voulez-vous vraiment valider cette fiche ?\');"');
					$modLink = anchor('c_comptable/modFiche/'.$uneFiche['mois'], 'modifier',  'title="Modifier la fiche"');
				
				

				
				echo 
				'<tr>
					<td class="date">'.anchor('c_comptable/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
					<td class="libelle">'.$uneFiche['nom'].' '.$uneFiche['prenom'].'</td>
					<td class="montant">'.$uneFiche['montantValide'].'</td>
					<td class="date">'.$uneFiche['dateModif'].'</td>
					<td class="action">'.$refusLink.'</td>
					<td class="action">'.$valideLink.'</td>
					<td class="action">'.$modLink.'</td>
							
				</tr>';
			}
			}
		?>	  
		</tbody>
    </table>

</div>
