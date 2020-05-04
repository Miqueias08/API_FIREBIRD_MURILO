<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDO;
use DB;

class ConsultasController extends Controller
{
    public function ContasPagas($cpf){
    	try {
	    	$dados = DB::select(DB::Raw("SELECT MAN111.LANCTO, EMD101.CGC_CPF, EMD101.NOME, MAN111.VENCTO, MAN111.DATA_PAGTO, MAN111.VALOR FROM EMD101 INNER JOIN MAN111 ON EMD101.CGC_CPF = MAN111.CNPJ_CPF WHERE (((EMD101.CGC_CPF)='".$cpf."') AND ((MAN111.DATA_PAGTO) Is Not Null));"));
	    	return json_encode($dados);
    	} catch (\Exception $e) {
    		return json_encode(["status"=>"erro"]);
    	}
    }
    public function ContasAbertas($cpf){
    	try {
    		$dados = DB::select(DB::Raw("SELECT MAN111.LANCTO, EMD101.CGC_CPF, EMD101.NOME, MAN111.VENCTO, MAN111.DATA_PAGTO, MAN111.VALOR FROM EMD101 INNER JOIN MAN111 ON EMD101.CGC_CPF = MAN111.CNPJ_CPF WHERE (((EMD101.CGC_CPF)='".$cpf."') AND ((MAN111.DATA_PAGTO) Is Null));"));
    		return json_encode($dados);
    	} catch (\Exception $e) {
    		return json_encode(["status"=>"erro"]);
    	}
    }

}
