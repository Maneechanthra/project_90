<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class S1Controller extends Controller
{
    public function printHello( $noloop, $noline ) {
        $result = "";
        for( $i=0;$i<$noline;$i++ ){
            for( $j=0;$j<$noloop;$j++ ){
                $result .= "Hello, ";
            }
            $result .= "<br>";
        }

        return $result;
    }
}
