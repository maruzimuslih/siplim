<?php
	require_once("../tambahan/fpdf.php");
	$db = new PDO('mysql:host=localhost;dbname=siplim','root','');
	

	class myPDF extends FPDF{
		function header(){
	        $this->image('pmi.png',10,6);
	        $this->SetFont('Times','B',20);
	        $this->Cell(276,12,'LAPORAN LIMBAH MEDIS PERTANGGAL',0,0,'C');
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
    	function headerTable1(){
    		$this->SetX(45);
    		$this->SetFont('Times','B',12);
    		$this->Cell(20,10,'Rincian Limbah Masuk TPS',0,1,'C');
    		$this->SetX(29);
	        $this->SetFont('Times','B',12);
	        $this->Cell(15,10,'No',1,0,'C');
	        $this->Cell(45,10,'Jenis Limbah',1,0,'C');
	        $this->Cell(45,10,'Sumber Limbah',1,0,'C');
	        $this->Cell(45,10,'Tanggal Masuk',1,0,'C');
	        $this->Cell(45,10,'Jumlah',1,0,'C');
	        $this->Cell(45,10,'Petugas',1,0,'C');
	        $this->Ln();
	    }
	    function headerTable2(){
	    	$this->Ln();
	    	$this->SetX(45);
    		$this->SetFont('Times','B',12);
    		$this->Cell(20,10,'Rincian Limbah Keluar TPS',0,1,'C');
    		$this->SetX(29);
	        $this->SetFont('Times','B',12);
	        $this->Cell(15,10,'No',1,0,'C');
	        $this->Cell(45,10,'Tanggal Keluar',1,0,'C');
	        $this->Cell(45,10,'Jumlah Limbah',1,0,'C');
	        $this->Cell(45,10,'Tujuan Penyerahan',1,0,'C');
	        $this->Cell(45,10,'Bukti No. Dokumen',1,0,'C');
	        $this->Cell(45,10,'Petugas',1,0,'C');
	        $this->Ln();
	    }
	    function viewTable1($db){
	    	$tgl_awal = $_GET['tgl_awal1'];
			$tgl_akhir = $_GET['tgl_akhir1'];
	        $this->SetFont('Times','',12);
	        $no=0;
	        $stmt = $db->query("SELECT * FROM limbah_masuk JOIN ruangan on limbah_masuk.id_ruangan = ruangan.id_ruangan join jenis_limbah on limbah_masuk.id_jenis = jenis_limbah.id_jenis join petugas on limbah_masuk.id_petugas = petugas.id_petugas WHERE tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_masuk DESC ");
	        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
	        	$no++;
	        	$this->SetX(29);
	            $this->Cell(15,10,$no,1,0,'C');
	            $this->Cell(45,10,$data->jenis,1,0,'L');
	            $this->Cell(45,10,$data->nama_ruangan,1,0,'L');
	            $this->Cell(45,10,date('d-m-Y',strtotime($data->tgl_masuk)),1,0,'L');
	            if($data->jumlah_masuk<1000){
                	$this->Cell(45,10,$data->jumlah_masuk.' Kg',1,0,'L');
                }else{
                    $data->jumlah_masuk=$data->jumlah_masuk/1000;
                    $this->Cell(45,10,$data->jumlah_masuk.' Ton',1,0,'L');
                }
                $this->Cell(45,10,$data->nama_petugas,1,0,'L');
	            $this->Ln();
	        }
	    }
	    function viewTable2($db){
	    	$tgl_awal = $_GET['tgl_awal1'];
			$tgl_akhir = $_GET['tgl_akhir1'];
	        $this->SetFont('Times','',12);
	        $no=0;
	        $stmt = $db->query("SELECT * FROM limbah_keluar JOIN tujuan on limbah_keluar.id_tujuan = tujuan.id_tujuan join petugas on limbah_keluar.id_petugas = petugas.id_petugas WHERE tgl_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_keluar DESC ");
	        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
	        	$no++;
	        	$this->SetX(29);
	            $this->Cell(15,10,$no,1,0,'C');
	            $this->Cell(45,10,date('d-m-Y',strtotime($data->tgl_keluar)),1,0,'L');	            
	            if($data->jumlah_keluar<1000){
                	$this->Cell(45,10,$data->jumlah_keluar.' Kg',1,0,'L');
                }else{
                    $data->jumlah_keluar=$data->jumlah_keluar/1000;
                    $this->Cell(45,10,$data->jumlah_keluar.' Ton',1,0,'L');
                }
                $this->Cell(45,10,$data->nama_tujuan,1,0,'L');
                $this->Cell(45,10,$data->bukti_no_dokumen,1,0,'L');
                $this->Cell(45,10,$data->nama_petugas,1,0,'L');
	            $this->Ln();
	        }
	    }

	}

	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A4',0);
	$pdf->headerTable1();
	$pdf->viewTable1($db);
	$pdf->headerTable2();
	$pdf->viewTable2($db);
	$pdf->Output();


?>