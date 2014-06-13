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

class IndexController extends EntityManagerActionController
{
    public function indexAction()
    {
        $response = array();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost('data');
            $username = $data['username'];
            $password = $data['password'];

            if (!empty($username) && !empty($password)) {
                // We can now authenticate

                // TODO: Should be an AuthService
                $user = $this->getEntityManager()->getRepository('Entity\\AccessCredential')->authenticate($username, $password);

                if ($user) {
                    // We found a valid user, now we can send it off to it's destination
                    $session = new Container('user');
                    $session->authorized = true;
                    $session->userId = $user->getId();
                    $session->username = $user->getUsername();

                    // Getting destination if supplied
                    $destination = $data['destination'];

                    if (!empty($destination)) {
                        return $this->redirect()->toUrl($destination);
                    }
                    return $this->redirect()->toUrl('/members-area');
                }
            }
            $response = array(
                'status' => 'error',
                'message' => 'Username or password was invalid.'
            );
        }
        return new ViewModel($response);
    }
}
