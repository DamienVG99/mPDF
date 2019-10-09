<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreatePdfController extends Controller
{
function create(){
// Create an instance of the class:



$users = DB::table('pdfs')
->select('id', 'name')
->orderBy('id', 'asc')
->get();
foreach($users as $user){
    $mpdf = new \Mpdf\Mpdf();
    $username = $user->name;
    echo $user->name;
    // $mpdf->AddPage('L');
    $mpdf->WriteHTML('<style>.naam{font-size:10px;font-style:frutiger;@page rotated{
        size: landscape;
    }</style>');
    
    $mpdf->WriteHTML('<p class="naam">'.$user->name.'</p>');
    echo $user->name;
    // $mpdf->WriteHTML('ik sta eronder');
    $mpdf->Output('../assets/pdf/'.$user->name.'.pdf', \Mpdf\Output\Destination::FILE);
    // var_dump($user->name);
    echo $user->name;
    echo $user->id;
    unset($mpdf);
}
// Write some HTML code:


// Output a PDF file directly to the browser


    // return view('welcome');
}
}
