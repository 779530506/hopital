<?php
namespace App\Service;



class GenererMatricule{

    public function generer($nbrMedecin,$service){
        $caractere= strtoupper(substr($service,0,2));
        return sprintf("M%s%05d",$caractere,$nbrMedecin);
    }
}