<?php
/**
 * Abstract controller
 *
 * @category  Tools
 * @package   Tools\Controller
 * @author    David Dattée <david.dattee@gmail.com>
 * @copyright 2016 David Dattée
 * @license   MIT License (MIT)
 */

namespace Tools\Controller;

use Zend\Mvc\MvcEvent;

abstract class AbstractController extends \General\Controller\AbstractController
{

    public function preDispatch(MvcEvent $e)
    {
        // IP control for non excluded route
        $configTools = $this->getServiceLocator()->get('config')['tools'];
        $path = $this->getRequest()->getUri()->getPath();
        if (!in_array($path, $configTools['exclude_ip_control'])
            && !in_array($_SERVER['REMOTE_ADDR'], $configTools['ips'])
        ) {
            return $this->unauthorized($e);
        }
    }

    protected function unauthorized($e)
    {
        $response = $e->getResponse();
        $response->setStatusCode(403);
        $response->setContent('Vous n\'avez pas les autorisations nécesaire pour accéder à cette page.');
        return $response;
    }

}
