<?php

namespace Evexias\ClientBundle\Repository;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends \Doctrine\ORM\EntityRepository
{
    public function GetUserByLogin($login) {
        $repository = $this
                ->getEntityManager()
                ->getRepository('EvexiasClientBundle:Client');
        
        return $repository->findOneBy(array('login' => $login));
    }
}
