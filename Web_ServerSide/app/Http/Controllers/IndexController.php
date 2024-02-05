<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class IndexController extends Controller
{
    public function index(){
        $infoCesae = $this->cesaeInfo();
        return view('main.home', compact('infoCesae'));
    }

    private function cesaeInfo()
    {
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' =>  'cesae@cesae.pt​'

        ];

        return $cesaeInfo;
    }

}


