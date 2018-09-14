<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes;

/**
 * Description of fontes
 *
 * @author horacio
 */
class fontes
    {
    /*     * *metodo que vai me entregar os dados dos ddds 
      eu considerei a possibilidade de deixar um json aberto, e colocar como funte unica, porém, em tese, qualquer um pode acessar esses dados
      com verificação eu consigo determinar quem e quando acessa...
     A menos, é claro, que os dados pudessem ser compartilhados, porém, isso não foi informado no projeto
     *      */



    static protected function MeusDdd() {
        $relacoes     = array();
        $relacoes[11] = array("from" => 11, "to" => array('16', '17', '18'), "valores" => array("1.90", "1.70", "0.90"));
        $relacoes[16] = array("from" => 16, "to" => array('11'), "valores" => array("2.90"));
        $relacoes[17] = array("from" => 17, "to" => array('11'), "valores" => array("2.70"));
        $relacoes[18] = array("from" => 18, "to" => array('11'), "valores" => array("1.90"));
        return $relacoes;
    }



    /*     * *metodo que vai me entregar os dados dos planos */



    static protected function MeusPlanos() {
        $planos        = array();
        $planos['30']  = array("label" => "falemais 30", "tempo" => 30, "excedente" => 10, "custo" => "38.00");
        $planos['60']  = array("label" => "falemais 60", "tempo" => 60, "excedente" => 10, "custo" => "136.00");
        $planos['120'] = array("label" => "falemais 120", "tempo" => 120, "excedente" => 10, "custo" => "380.00");
        return $planos;
    }



    }
