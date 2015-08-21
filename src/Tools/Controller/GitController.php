<?php
/**
 * Created by PhpStorm.
 * User: ddattee
 * Date: 29/06/2015
 * Time: 17:29
 */

namespace SubvitamineTools\Controller;


use General\Utils\Cli;
use General\Utils\Git;
use Vendors\Getext;
use Zend\View\Model\ViewModel;

class GitController extends AbstractController
{

	public function indexAction()
	{

	}

	public function updateAction()
	{
		$code = Git::pull($output, $errors);
		$viewModel = new ViewModel();
		$viewModel
			->setVariables(array(
				'code' => $code,
				'output' => $output,
				'errors' => $errors,
			))
			->setTerminal(true);
		return $viewModel;
	}

}