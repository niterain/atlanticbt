<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AccessCredentialRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AccessCredentialRepository extends EntityRepository
{
    public function authenticate($username, $password) {
        try {
            $qb = $this->_em->createQueryBuilder();
            $qb->select('c')
                ->from('Application\\Entity\\AccessCredential', 'c')
                ->where('c.username = :username')
                ->andWhere('c.password = :password')
                ->andWhere('c.status = :status')
                ->setParameters(array(
                    'username' => $username,
                    'password' => $password,
                    'status' => 'active'
                ));

            $result = $qb->getQuery()->execute();
            if (!empty($result)) {
                return $result[0];
            }
        } catch (\Exception $e) {
            // TODO: Log Exception
        }
        return null;
    }
}
