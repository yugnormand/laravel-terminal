<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class TerminalController extends Controller
{
    //
    public function terminal(){
        return view('terminal.terminal');
    }

    public function terminalpost(Request $request){

        $command = $request->input('command');
        Artisan::call($command);
        $html = Artisan::output();
        return response()->json(['success' => true, 'html' => $html]);
    }
}
