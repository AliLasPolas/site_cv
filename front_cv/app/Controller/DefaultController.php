<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Db\DbFactory;


class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
	    $this->show('default/accueil');

	}

	/*Page de competences*/

	public function competences()
	{
	    DbFactory::start();
		# Récupération du contenu de la table
	    $competences = \ORM::for_table('competences')->find_result_set();
	    $this->show('default/competences', ['competences' => $competences]);

	}

}