<?php

namespace App\Http\Controllers\Backoffice;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        // $fromDate = $request->from_date;
        // $toDate = $request->to_date;

        // return view('backoffice.report.index', compact('fromDate', 'toDate'));
        return view('backoffice.report.index');
    }

    public function filter(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $reports = Transaction::with('details', 'user')
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->get();

        return view('backoffice.report.index', compact('fromDate', 'toDate', 'reports'));
    }
    
    public function reportbm()
    {
            $reports = Product::with('category')->get();
        return view('backoffice.report.rptbm', compact('reports'));
    }

    public function pdf($fromDate, $toDate)
    {
        $reports = Transaction::with('details', 'user')
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->get();

        $grandQuantity = TransactionDetail::with('products')
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->sum('qty');

        // $pdf = PDF::loadView('backoffice.report.report', compact('fromDate', 'toDate', 'reports', 'grandQuantity'))->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan - '.Carbon::parse($fromDate)->format('d M Y').' - '.Carbon::parse($toDate)->format('d M Y').'.pdf');
    // Set up Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Create a new Dompdf instance
        $dompdf = new Dompdf($options);

        // Load the HTML content
        $html = view('backoffice.report.report', compact('fromDate', 'toDate', 'reports', 'grandQuantity'))->render();
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Stream the PDF to the browser
        return $dompdf->stream('Laporan - '.Carbon::parse($fromDate)->format('d M Y').' - '.Carbon::parse($toDate)->format('d M Y').'.pdf');
    }
}
