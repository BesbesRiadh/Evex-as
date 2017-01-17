<?php

namespace Evexias\ClientBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class WebServiceUser implements UserInterface {

    private $aUserData;
    private $sSalt;
    private $aRole;

    public function __construct($paUserData) {
        $this->aUserData = $paUserData['data'];
        $this->aRole = substr($this->aUserData->getRole(), 2, -2);
    }

    public function __toString() {
        return $this->getPrenom() . ' ' . $this->getNom();
    }

    public function getRoles() {
        return array($this->aRole);
    }

    public function getPassword() {
        return $this->aUserData->getPassword();
    }

    public function getSalt() {
        return $this->sSalt;
    }

    public function getUsername() {
        return $this->aUserData->getLogin();
    }

    public function getLogin() {
        return $this->aUserData->getLogin();
    }

    public function getPrenom() {
        return $this->aUserData->getPrenom();
    }

    public function getNom() {
        return $this->aUserData->getNom();
    }

    public function eraseCredentials() {
        
    }

    public function equals(UserInterface $poUser) {
        if (!$poUser instanceof WebServiceUser) {
            return false;
        }

        if ($this->getUsername() !== $poUser->getUsername()) {
            return false;
        }
        if ($this->getPassword() !== $poUser->getPassword()) {
            return false;
        }

        if ($this->getSalt() !== $poUser->getSalt()) {
            return false;
        }

        return true;
    }

}
