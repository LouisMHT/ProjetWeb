<?php
class Date {

var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
var $months= array('Janvier', 'Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');


    function getAll($year){
        $r = array();
        /* //création d'un calendrier de manière rustique

        $date = strtotime($year.'-01-01');
        while(date('Y',$date) <= $year) {
            $y = date('Y', $date);
            $m = date('n', $date); //'n' à la place de 'm' pour avoir les mois sans les zéros initiaux (01 -> 1)
            $d = date('j', $date); //'j' à la place de 'd' pour avoir les jours sans les zéros initiaux (01 -> 1)
            $w = str_replace('0','7', date('w', $date));

            $r[$y][$m][$d] = $w;
            $date = strtotime(date('Y-m-d',$date).'+1 DAY'); 
        }
        
        */

            //création d'un calendrier avec les DateTime (cf php.net)

        $date = new DateTime($year.'-01-01');

        while($date->format('Y') <= $year) {
            $y = $date->format('Y');
            $m = $date->format('n'); //'n' à la place de 'm' pour avoir les mois sans les zéros initiaux (01 -> 1)
            $d = $date->format('j'); //'j' à la place de 'd' pour avoir les jours sans les zéros initiaux (01 -> 1)
            $w = str_replace('0','7', $date->format('w'));

            $r[$y][$m][$d] = $w;
            $date->add(new DateInterval('P1D'));
        }

        return $r;
    }

}