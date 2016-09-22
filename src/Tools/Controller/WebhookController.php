<?php
/**
 * Created by PhpStorm.
 * User: ddattee
 * Date: 29/06/2015
 * Time: 17:29
 */

namespace Tools\Controller;

use General\Utils\Git;
use Vendors\Getext;
use Zend\View\Model\ViewModel;

/**
 * Class GitController
 *
 * @package Tools\Controller
 */
class WebhookController extends AbstractController
{

    /**
     * Update current repository
     *
     * @return ViewModel
     */
    public function updateAction()
    {
        $gitService = new Git();
        $output = '';
        $errors = '';
        $code = $gitService->pull($output, $errors);
        $viewModel = new ViewModel();
        $viewModel
            ->setVariables(
                [
                    'code'   => $code,
                    'output' => $output,
                    'errors' => $errors,
                ]
            )
            ->setTerminal(true);
        return $viewModel;
    }

}