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
        $config = $caches = $this->getServiceLocator()->get('config')['tools']['webhook']['git'];
        $output = '';
        $errors = '';

        if (!$this->isValidGitlabToken()) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $git = new Git();
        $code = $git->pull($config['remote']['name'], $config['remote']['branch'], $config['local']['branch'], $output, $errors);
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
     * Control Gitlab webhook token if header is sent
     *
     * @return bool
     */
    protected function isValidGitlabToken()
    {
        /** @var Request $request */
        $request = $this->getRequest();
        $configToken = (string) $this->getServiceLocator()->get('config')['tools']['webhook']['token'];
        return (bool) (!$request->getHeaders()->has(self::GITLAB_HEADER_TOKEN)
            || $request->getHeader(self::GITLAB_HEADER_TOKEN)->getFieldValue() === $configToken);
    }

}