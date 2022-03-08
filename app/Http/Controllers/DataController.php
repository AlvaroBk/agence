<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{   
    public function getData($id)
    {   if($id==1)
        {
            $result = DB::table('cao_usuario')
            ->join('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
            ->where('permissao_sistema.co_sistema','=',1)
            ->where('permissao_sistema.in_ativo','=','S')
            ->whereIn('permissao_sistema.co_tipo_usuario',[0,1,2])
            ->get('no_usuario as user');

            $owner="Consultor";
            
         }

         else{
            $result = DB::table('cao_cliente')->where('tp_cliente','=','A')->get('no_razao as user');
            $owner="Cliente";
         }

         return response()->json(['data'=>$result,'owner'=>$owner]);
       
    }

    

        

}
    
