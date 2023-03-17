<?php
require_once 'Utilisateur.php';
class Repas extends Utilisateur
{
    protected $prix;
    protected $name;

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    public function menu()
    {
        // TODO: Implement menu() method.
    }

    public function prix()
    {
        // TODO: Implement prix() method.
    }
    public function Menu()
    {
        return "Voici le plat correspondant";
        return $this->setName()."<br>";
        return $this->setPrix()."<br>";
    }
}

