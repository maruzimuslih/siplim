<?php
	require_once("../tambahan/fpdf.php");
	$db = new PDO('mysql:host=localhost;dbname=siplim','root','');

	class myPDF extends FPDF{
		function header(){
	        $this->image('pmi.png',10,6);
	        $this->SetFont('Times','B',20);
	        $this->Cell(276,12,'LAPORAN LIMBAH MEDIS PER JENIS',0,0,'C');
	        $this->Ln();
	        $this->SetFont('Times','B',18);
	        $this->Cell(276,5,'UDD Palang Merah Indonesia Kabupaten Banyumas',0,0,'C');
	        $this->Ln(20);
    	}
    	function footer(){
	        $this->SetY(-15);
	        $this->SetFont('Times','',8);
	        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    	}
    	function headerTable(){
    		$this->SetX(29);
	        $this->SetFont('Times','B',12);
	        $this->Cell(30,10,'No',1,0,'C');
	        $this->Cell(70,10,'Jenis Limbah',1,0,'C');
	        $this->Cell(70,10,'Jumlah',1,0,'C');
	        $this->Cell(70,10,'Petugas',1,0,'C');
	        $this->Ln();
	    }
	    function viewTable($db){
	        $this->SetFont('Times','',12);
	        $no=0;
	        $stmt = $db->query('SELECT jenis, nama_petugas, SUM(jumlah_masuk) AS jumlah FROM limbah_masuk join jenis_limbah on limbah_masuk.id_jenis = jenis_limbah.id_jenis join petugas on limbah_masuk.id_petugas = petugas.id_petugas GROUP BY jenis, nama_petugas');
	        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
	        	$no++;
	        	$this->SetX(29);
	            $this->Cell(30,10,$no,1,0,'C');
	            $this->Cell(70,10,$data->jenis,1,0,'L');
	            if($data->jumlah<1000){
                	$this->Cell(70,10,$data->jumlah.' Kg',1,0,'L');
                }else{
                    $data->jumlah=$data->jumlah/1000;
                    $this->Cell(70,10,$data->jumlah.' Ton',1,0,'L');
                }
                $this->Cell(70,10,$data->nama_petugas,1,0,'L');
	            $this->Ln();
	        }
	    }
	}

	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A4',0);
	$pdf->headerTable();
	$pdf->viewTable($db);
	$pdf->Output();


?>