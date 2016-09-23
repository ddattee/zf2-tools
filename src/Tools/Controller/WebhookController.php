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
use Zend\Http\Headers;
use Zend\Http\Request;
use Zend\View\Model\ViewModel;

/**
 * Class GitController
 *
 * @package Tools\Controller
 */
class WebhookController extends AbstractController
{
    const GITLAB_HEADER_TOKEN = 'X-Gitlab-Token';

    /**
     * Index action
     *
     * @return array
     */
    public function indexAction()
    {
        return array();
    }

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

        if (!$this->isValidGitlabToken()) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

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

    /**
     * Control Gitlab webhook token
     *
     * @return bool
     */
    protected function isValidGitlabToken()
    {
        /** @var Request $request */
        $request = $this->getRequest();
        $configToken = (string) $this->getServiceLocator()->get('config')['webhook']['token'];
        return (bool) (!$this->getRequest()->getHeaders()->has(self::GITLAB_HEADER_TOKEN)
            || $request->getHeader(self::GITLAB_HEADER_TOKEN) === $configToken);
    }

}