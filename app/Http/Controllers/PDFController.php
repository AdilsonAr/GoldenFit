<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use PDF;
use App\Models\Check;
use App\Models\Document;
use Jenssegers\Date\Date;
use Luecano\NumeroALetras\NumeroALetras;

class PDFController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateCheck($id)
    {
        Date::setLocale('es');

        $check = Check::select('*', 'checks.id as id')
        ->join('documents as do', 'checks.type_fund_id', '=', 'do.id')
        ->join('banks as ba', 'do.bank_id', '=', 'ba.id')
        ->join('suppliers as su', 'checks.supplier_id', '=', 'su.id')
        ->where('checks.id', $id)
        ->first();

        $formatter = new NumeroALetras();

        $day = ucfirst(strtolower($formatter->toWords(intval(date('d', strtotime($check->date))))));
        $newDate = new Date($check->date);
        $month = $newDate->format('F');
        $year = mb_strtolower($formatter->toWords(intval($newDate->format('Y'))), 'UTF-8');
        $check->dateLetters = "$day de $month del $year";

        $day = ucfirst($newDate->format('l'));
        $numberDay = date('d', strtotime($check->date));
        $month = $newDate->format('F');
        $year = $newDate->format('Y');
        $check->dateNumberLetters = ucfirst("$day $numberDay de $month de $year");

        $pdf = PDF::loadView('PDF.report', compact('check'));

        return $pdf->stream('report-'.now().'.pdf');
    }

    public function generateSummary($id)
    {
        $bank = Document::where(['id'=>$id])
        ->first();

        $debe = Check::select('*', 'checks.id as id')
        ->join('documents as do', 'checks.type_fund_id', '=', 'do.id')
        ->join('banks as ba', 'do.bank_id', '=', 'ba.id')
        ->join('suppliers as su', 'checks.supplier_id', '=', 'su.id')
        ->where(['checks.movement'=>"Cargar", 'do.id'=>$id])
        ->get();

        $haber = Check::select('*', 'checks.id as id')
        ->join('documents as do', 'checks.type_fund_id', '=', 'do.id')
        ->join('banks as ba', 'do.bank_id', '=', 'ba.id')
        ->join('suppliers as su', 'checks.supplier_id', '=', 'su.id')
        ->where(['checks.movement'=> "Abonar", 'do.id'=>$id])
        ->get();

        $totalDebe = $bank->initial_amount;
        foreach ($debe as $key => $value) {
            $totalDebe += $value->net_total;
        }

        $totalHaber = 0;
        foreach ($haber as $key => $value) {
            $totalHaber += $value->net_total;
        }

        $pdf = PDF::loadView('PDF.summary', compact('bank', 'debe', 'haber', 'totalDebe', 'totalHaber'));

        return $pdf->stream('report-'.now().'.pdf');
    }
}
