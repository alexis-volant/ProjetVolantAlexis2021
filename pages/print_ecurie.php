<?php
include('./admin/lib/php/pg_connect.php');

include('./admin/lib/php/classes/Ecurie.class.php');
include('./admin/lib/php/classes/EcurieBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);

$liste_ecurie = array();
$ecu = new EcurieBD($cnx);
$liste = $ecu->getEcurieByid($_GET['idecurie']);
$nbr =count($liste);

$liste_pilote = array();
$pil = new PiloteBD($cnx);
$liste_pil= $pil->getPiloteByEcu($_GET['idecurie']);
$nbr2 =count($liste_pil);

include('./admin/lib/php/TCPDF/tcpdf.php');
$pdf = new TCPDF('P','mm','A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


$pdf->AddPage();

$pdf->SetFont('helvetica','B',18,);

$pdf->SetTextColor(255,0,0);

$pdf->Cell(190,10,'Ecuries',1,1,'C');

$pdf->SetFont('helvetica','B',12);
$pdf->SetTextColor(0,0,0);

$x=80;
$y=35;
$u=30;


for($i=0 ; $i<$nbr ; $i++){

    $pdf->WriteHTMLCell('190','55',10,$u,"",'1',1,'0','1','L');
    $pdf->SetFont('helvetica','B',14);
    $pdf->WriteHTMLCell('120','10',30,$y,"Nom:",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y,$liste[$i]->nomecurie,0,0,'0','1','L');

    $pdf->SetFont('helvetica','',12);
    $pdf->WriteHTMLCell('120','10',30,$y+10,"Pays :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste[$i]->pays,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"titreconstructeur:",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste[$i]->titreconstructeur,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Grand Prix disputé :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste[$i]->gpdispute,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Nombre Victoire :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste[$i]->victoire,0,0,'0','1','L');

    $u+=60;
}

$y+=10;

for($i=0 ; $i<$nbr2 ; $i++){

    $pdf->WriteHTMLCell('190','90',10,$u,"",'1',1,'0','1','L');

    $pdf->SetFont('helvetica','',12);

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Nom Pilote:",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->nompilote,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Prenom:",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->prenom,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Nationalite:",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->nationalite,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Numero de course :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->idpilote,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Participation Grand Prix:",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->participationgp,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Victoire :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->victoire,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"Nbr PolePosition :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->poleposition,0,0,'0','1','L');

    $pdf->WriteHTMLCell('120','10',30,$y+10,"titre Champion du monde :",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',$x,$y+=10,$liste_pil[$i]->titrechampion,0,0,'0','1','L');


    $y+=18;
    $u+=95;
}


ob_end_clean();
$pdf->Output('ecurie_f1.pdf','D');
