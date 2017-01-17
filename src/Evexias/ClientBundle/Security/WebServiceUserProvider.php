<?php

namespace Evexias\ClientBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\DependencyInjection\Container;
use Evexias\ClientBundle\Security\WebServiceUser;
use Evexias\ClientBundle\Utils\Tools;
use Symfony\Component\HttpFoundation\Request;

class WebServiceUserProvider implements UserProviderInterface {

    private $oContainer;

    /**
     *
     * @param \Symfony\Component\DependencyInjection\Container $oContainer
     */
    public function __construct(Container $oContainer) {
        $this->oContainer = $oContainer;
    }

    private function getUser($psUsername) {

        $aLoginData = array(
            'login' => $psUsername,
        );


        $sLogin = Tools::getOption($aLoginData, 'login');

        if (!$sLogin) {
            throw new \Exception('Login obligatoire');
        }

        $repository = $this
                ->oContainer->get('doctrine')
                ->getManager()
                ->getRepository('EvexiasClientBundle:Client');
        $aUserData = $repository->GetUserByLogin($sLogin);

        if (isset($aUserData)) {
            $aUserData = array('status' => 'OK', 'data' => $aUserData);
        } else {
            $aUserData = array('status' => 'KO');
        }

        return $aUserData;
    }

    public function loadUserByUsername($psUsername) {
        $aUserData = $this->getUser($psUsername);

        if (!count($aUserData) || (isset($aUserData['status']) && 'KO' == $aUserData['status'])) {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $psUsername));
        }
        return new WebServiceUser($aUserData);
    }

    public function refreshUser(UserInterface $user) {
        if (!$user instanceof WebServiceUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return $class === 'Evexias\ClientBundle\Security\WebServiceUser';
    }

}
