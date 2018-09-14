<?php

namespace classes;

class controle extends fontes
    {

    public static $array;



    public static function buscaDDDs() {
        return json_encode(self::MeusDdd());
    }



    public static function buscaPlanos() {
         return json_encode(self::MeusPlanos());
    }



    public static function busca($informacao = '') {
        foreach (self::MeusDdd() as $rel):
            if ($rel['from'] == $informacao):
                return $rel['to'];
            endif;
        endforeach;
    }



    public static function localizaDados() {
        $dados  = self::MeusDdd();
        $planos = self::MeusPlanos();
        $ddd    = self::$array['ddd'];
        $ddd_2  = self::$array['ddd2'];
        $i      = -1;
        $info   = $dados[$ddd];
        foreach ($info["to"] as $ddd2):
            $i++;
            if ($ddd2 === $ddd_2) {
                self::$array['valor_minuto'] = $info['valores'][$i];
            }
        endforeach;
        self::calculaValores($planos);
        return new controle();
    }



    public static function calculaValores($plano = "") {
        if (!array_key_exists(self::$array['plano'], $plano)) {
            self::$array = NULL;
            return;
        }
        $excedente             = $plano[self::$array['plano']]['excedente'];
        self::$array['nome']   = $plano[self::$array['plano']]['label']; //custo da ligação por minuto
        self::$array['custo']  = $plano[self::$array['plano']]['custo']; //custo da ligação por minuto
        $tempoParaFalarDeGraca = $plano[self::$array['plano']]['tempo']; //tempo do plano
        $tempo                 = self::$array['tempo']; //tempo que a pessoa vai conversar
        $valor                 = self::$array['valor_minuto']; //valor do minuto
        $total                 = 0; //quanto pagará pela ligação
        if ($tempo > $tempoParaFalarDeGraca) {
            $tempo2                        = $tempo - $tempoParaFalarDeGraca;
            $tempo3                        = $tempo2 + $tempo2 * $excedente / 100;
            $total                         = $tempo3 * $valor;
            $comPlano                      = $total;
            self::$array['valor_no_plano'] = number_format($comPlano, 2, ',', '.');
        } else {
            $comPlano                      = 0;
            self::$array['valor_no_plano'] = 0;
        }
        $total                          = $tempo * $valor;
        $semPlano                       = $total;
        self::$array['valor_sem_plano'] = number_format($semPlano, 2, ',', '.');
        self::$array['valor_minuto']    = number_format($valor, 2, ',', '.'); //formatando o valor do minuto 
    }



    }
