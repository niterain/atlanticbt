<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class MembersAreaController extends EntityManagerActionController
{
    public function indexAction()
    {
        $response = null;
        $session = new Container('user');
        if ($session->isAuthorized) {
            $list = $this->getEntityManager()->getRepository('Application\\Entity\\Profile')->getInformation();

            $response['list'] = $list;
            return new ViewModel(array('response' => $response));
        }
        return $this->redirect()->toUrl('/');
    }
}
