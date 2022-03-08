<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generateReport(Request $request)
    {
        $user = $request->get('selected');
        $dateFrom=$request->get('from');
        $dateTo=$request->get('to');
        $from = date('Y-m-d', strtotime($dateFrom));
        $to = date('Y-m-d', strtotime($dateTo));
        $owner=$request->get('owner');

        if($owner=='Consultor'){
            $result = DB::table('cao_fatura')
                ->join('cao_os','cao_os.co_os','=','cao_fatura.co_os')
                ->join('cao_usuario','cao_usuario.co_usuario','=','cao_os.co_usuario')
                ->join('cao_salario','cao_salario.co_usuario','=','cao_usuario.co_usuario')
                ->whereIn('no_usuario',$user)
                ->whereBetween('data_emissao',[$from,$to])
                ->get(['valor','no_usuario','total_imp_inc','comissao_cn','data_emissao','brut_salario']);
             $owner="consultor";

        }else{
            $result = DB::table('cao_fatura')
                ->join('cao_cliente','cao_cliente.co_cliente','=','cao_fatura.co_cliente')
                ->whereIn('no_razao',$user)
                ->whereBetween('data_emissao',[$from,$to])
                ->get(['valor','no_razao','total_imp_inc','data_emissao']);
                $owner="cliente";
            
        }
            
        return response()->json(['receitas'=>$result,'owner'=>$owner]);
    }

    
}
