<?php

namespace App\Http\Controllers;
use PDF;

class PDFController extends Controller{

    public function gerarPDF()
    {
        // Dados que serão enviados para a view
        $data = ['title' => 'Meu PDF Gerado no Laravel'];

        // Gera o PDF a partir de uma view
        $pdf = PDF::loadView('meu_pdf_view', $data);

        // Retorna o PDF para download
        return $pdf->download('meu_arquivo.pdf');
    }

}