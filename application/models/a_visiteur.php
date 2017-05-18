<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_visiteur extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

		// chargement du modÃ¨le d'accÃ¨s aux données qui est utile Ã  toutes les méthodes
		$this->load->model('dataAccess');
    }

	/**
	 * Accueil du visiteur
	 * La fonction intÃ¨gre un mécanisme de contrÃ´le d'existence des 
	 * fiches de frais sur les 6 derniers mois. 
	 * Si l'une d'elle est absente, elle est créée
	*/
	public function accueil()
	{	// TODO : ContrÃ´ler que toutes les valeurs de $unMois sont valides (chaine de caractÃ¨re dans la BdD)
	
		// chargement du modÃ¨le contenant les fonctions génériques
		$this->load->model('functionsLib');

		// obtention de la liste des 6 derniers mois (y compris celui ci)
		$lesMois = $this->functionsLib->getSixDerniersMois();
		
		// obtention de l'id de l'utilisateur mémorisé en session
		$idVisiteur = $this->session->userdata('idUser');
		
		// contrÃ´le de l'existence des 6 derniÃ¨res fiches et création si nécessaire
		foreach ($lesMois as $unMois){
			if(!$this->dataAccess->ExisteFiche($idVisiteur, $unMois)) $this->dataAccess->creeFiche($idVisiteur, $unMois);
		}
		// envoie de la vue accueil du visiteur
		$this->templates->load('t_visiteur', 'v_visAccueil');
	}
	
	/**
	 * Liste les fiches existantes du visiteur connecté et 
	 * donne accÃ¨s aux fonctionnalités associées
	 *
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $message : message facultatif destiné Ã  notifier l'utilisateur du résultat d'une action précédemment exécutée
	*/
	public function mesFiches ($idVisiteur, $message=null)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session
	
		$idVisiteur = $this->session->userdata('idUser');

		$data['notify'] = $message;
		$data['mesFiches'] = $this->dataAccess->getFiches($idVisiteur);		
		$this->templates->load('t_visiteur', 'v_visMesFiches', $data);	
	}	

	/**
	 * Présente le détail de la fiche sélectionnée 
	 * 
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $mois : le mois de la fiche Ã  modifier 
	*/
	public function voirFiche($idVisiteur, $mois)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session

		$data['numAnnee'] = substr( $mois,0,4);
		$data['numMois'] = substr( $mois,4,2);
		$data['lesFraisHorsForfait'] = $this->dataAccess->getLesLignesHorsForfait($idVisiteur,$mois);
		$data['lesFraisForfait'] = $this->dataAccess->getLesLignesForfait($idVisiteur,$mois);		

		$this->templates->load('t_visiteur', 'v_visVoirListeFrais', $data);
	}

	/**
	 * Présente le détail de la fiche sélectionnée et donne 
	 * accés Ã  la modification du contenu de cette fiche.
	 * 
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $mois : le mois de la fiche Ã  modifier 
	 * @param $message : message facultatif destiné Ã  notifier l'utilisateur du résultat d'une action précédemment exécutée
	*/
	public function modFiche($idVisiteur, $mois, $message=null)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session

		$data['notify'] = $message;
		$data['numAnnee'] = substr( $mois,0,4);
		$data['numMois'] = substr( $mois,4,2);
		$data['lesFraisHorsForfait'] = $this->dataAccess->getLesLignesHorsForfait($idVisiteur,$mois);
		$data['lesFraisForfait'] = $this->dataAccess->getLesLignesForfait($idVisiteur,$mois);		

		$this->templates->load('t_visiteur', 'v_visModListeFrais', $data);
	}

	/**
	 * Signe une fiche de frais en changeant son état
	 * 
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $mois : le mois de la fiche Ã  signer
	*/
	public function signeFiche($idVisiteur, $mois)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session
		// TODO : intégrer une fonctionnalité d'impression PDF de la fiche

	    $this->dataAccess->signeFiche($idVisiteur, $mois);
	}

	/**
	 * Modifie les quantités associées aux frais forfaitisés dans une fiche donnée
	 * 
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $mois : le mois de la fiche concernée
	 * @param $lesFrais : les quantités liées Ã  chaque type de frais, sous la forme d'un tableau
	*/
	public function majForfait($idVisiteur, $mois, $lesFrais)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session
		// TODO : valider les données contenues dans $lesFrais ...
		
		$this->dataAccess->majLignesForfait($idVisiteur,$mois,$lesFrais);
		$this->dataAccess->recalculeMontantFiche($idVisiteur,$mois);
	}

	/**
	 * Ajoute une ligne de frais hors forfait dans une fiche donnée
	 * 
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $mois : le mois de la fiche concernée
	 * @param $lesFrais : les quantités liées Ã  chaque type de frais, sous la forme d'un tableau
	*/
	public function ajouteFrais($idVisiteur, $mois, $uneLigne)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session
		// TODO : valider la donnée contenues dans $uneLigne ...

		$dateFrais = $uneLigne['dateFrais'];
		$libelle = $uneLigne['libelle'];
		$montant = $uneLigne['montant'];

		$this->dataAccess->creeLigneHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
	}

	/**
	 * Supprime une ligne de frais hors forfait dans une fiche donnée
	 * 
	 * @param $idVisiteur : l'id du visiteur 
	 * @param $mois : le mois de la fiche concernée
	 * @param $idLigneFrais : l'id de la ligne Ã  supprimer
	*/
	public function supprLigneFrais($idVisiteur, $mois, $idLigneFrais)
	{	// TODO : s'assurer que les paramÃ¨tres reÃ§us sont cohérents avec ceux mémorisés en session et cohérents entre eux

	    $this->dataAccess->supprimerLigneHorsForfait($idLigneFrais);
	}
}