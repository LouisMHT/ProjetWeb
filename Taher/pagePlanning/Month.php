<?php



class Month {
    /**
     * constructeur de mois
     * @param int $month : le mois compris entre 1 et 12
     * @param int $year : l'année
     * 
     */
    public function __construct(int $month, int $year)
    {
        if ($month <1 || $month > 12)
            throw new Exception(message "Le mois $month n'est pas valide")

    }


    
}