<?php

namespace Evexias\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Evexias\ClientBundle\Repository\ClientRepository")
 */
class Client {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Cin", type="string", length=8, unique=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="Age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephone1", type="string", length=15)
     */
    private $telephone1;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephone2", type="string", length=15)
     */
    private $telephone2;

    /**
     * @var string
     *
     * @ORM\Column(name="Parrain", type="string", length=255)
     */
    private $parrain;

    /**
     * @var string
     *
     * @ORM\Column(name="Precedent", type="string", length=255)
     */
    private $precedent;

    /**
     * @var bool
     *
     * @ORM\Column(name="Position", type="boolean")
     */
    private $position;

    /**
     * @var int
     *
     * @ORM\Column(name="Etat", type="integer")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="Niveau", type="string", length=255)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="Role", type="string", length=255)
     */
    private $role;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set cin
     *
     * @param string $cin
     *
     * @return Client
     */
    public function setCin($cin) {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin() {
        return $this->cin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Client
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Client
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Client
     */
    public function setLogin($login) {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Client
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Client
     */
    public function setAge($age) {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Client
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Set telephone1
     *
     * @param string $telephone1
     *
     * @return Client
     */
    public function setTelephone1($telephone1) {
        $this->telephone1 = $telephone1;

        return $this;
    }

    /**
     * Get telephone1
     *
     * @return string
     */
    public function getTelephone1() {
        return $this->telephone1;
    }

    /**
     * Set telephone2
     *
     * @param string $telephone2
     *
     * @return Client
     */
    public function setTelephone2($telephone2) {
        $this->telephone2 = $telephone2;

        return $this;
    }

    /**
     * Get telephone2
     *
     * @return string
     */
    public function getTelephone2() {
        return $this->telephone2;
    }

    /**
     * Set parrain
     *
     * @param string $parrain
     *
     * @return Client
     */
    public function setParrain($parrain) {
        $this->parrain = $parrain;

        return $this;
    }

    /**
     * Get parrain
     *
     * @return string
     */
    public function getParrain() {
        return $this->parrain;
    }

    /**
     * Set precedent
     *
     * @param string $precedent
     *
     * @return Client
     */
    public function setPrecedent($precedent) {
        $this->precedent = $precedent;

        return $this;
    }

    /**
     * Get precedent
     *
     * @return string
     */
    public function getPrecedent() {
        return $this->precedent;
    }

    /**
     * Set position
     *
     * @param boolean $position
     *
     * @return Client
     */
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return bool
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Client
     */
    public function setEtat($etat) {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Client
     */
    public function setNiveau($niveau) {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau() {
        return $this->niveau;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role) {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole() {
        return $this->role;
    }

}
