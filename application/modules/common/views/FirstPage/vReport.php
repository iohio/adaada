<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nakit');
        $pdf->SetTitle('TCPDF TEST');
        $pdf->SetSubject('Data');
        $pdf->SetKeywords('Test');

        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->SetFont('freeserif', '', 10);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->AddPage();

        $title = <<<EOD
        <h2>Report Customer List</h2>
        <br>
        EOD;        
        $pdf->writeHTMLCell(0, 0, '', '', $title,0,1,0,true,'C',true);
        
        $table .= '<table style="border:1px soild #000; padding:6px;">';
        $table .= '<tr>
                    <th style="border:1px soild #000">Name</th>
                    <th style="border:1px soild #000">Email</th>
                    <th style="border:1px soild #000">Address</th>
                    <th style="border:1px soild #000">Depart</th>
                    </tr>';
        $oNo = 1;

        foreach ($aUser as $row){
            $table .= '<tr>
                        <td style="border:1px soild #000">'.$row['FTCusName']. '</td>
                        <td style="border:1px soild #000">'.$row['FTCusEmail']. '</td>
                        <td style="border:1px soild #000">'.$row['FTCusAddress']. '</td>
                        <td style="border:1px soild #000">'.$row['FTDepName']. '</td>
            </tr>'; 
        }
        $table .= '</table>';
        $pdf->writeHTMLCell(0, 0, '', '', $table,0,1,0,true,'C',true);

        $pdf->lastPage();
        
        ob_clean();
        $pdf->Output('example_001.pdf', 'I');