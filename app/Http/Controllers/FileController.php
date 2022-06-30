<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use InitRed\Tabula\Tabula;
use Ramzan\CustomTabula\CustomTabula;
use Smalot\PdfParser\Parser;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class FileController extends Controller
{
    public function index() {
        return view('file');
    }
    public function store(Request $request) {

        $file = $request->file;

        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);

        // Example parse PDF using smalot/pdfparser
        // use of pdf parser to read content from pdf

//        $fileName = $file->getClientOriginalName();
//        $pdfParser = new Parser();
//        $pdf = $pdfParser->parseFile($file->path());
//        $content = $pdf->getText();
//        $upload_file = new File;
//        $upload_file->orig_filename = $fileName;
//        $upload_file->mime_type = $file->getMimeType();
//        $upload_file->filesize = $file->getSize();
//        $upload_file->content = $content;
//        $upload_file->save();

//        return redirect()->back()->with('success', 'File  submitted');

        /* example using Tabula */
//        $tabula = new Tabula('/usr/bin/');
//        $tabula->setPdf($file)
//            ->setOptions([
//                'format' => 'csv',
//                'pages' => 'all',
//                'lattice' => true,
//                'stream' => true,
//                'outfile' => storage_path("app/public/csv/test.csv"),
//            ])
//            ->convert();

            $tabula = new CustomTabula();
            $rawData = $tabula->setPdf($file)
                ->setOptions([
                    'format' => 'csv',
                    'pages' => 'all',
                    'lattice' => false,
                    'stream' => false
                ])
                ->result();
            dd($rawData);
    }
}
