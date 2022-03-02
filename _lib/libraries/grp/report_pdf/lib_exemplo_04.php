<?php
class MYPDF extends TCPDF {
    var $grid = false;

    function DrawGrid()
    {
        if($this->grid===true){
            $spacing = 5;
        } else {
            $spacing = $this->grid;
        }
        $this->SetDrawColor(204,255,255);
        $this->SetLineWidth(0.35);
        for($i=0;$i<$this->w;$i+=$spacing){
            $this->Line($i,0,$i,$this->h);
        }
        for($i=0;$i<$this->h;$i+=$spacing){
            $this->Line(0,$i,$this->w,$i);
        }
        $this->SetDrawColor(0,0,0);

        $x = $this->GetX();
        $y = $this->GetY();
        $this->SetTextColor(204,204,204);
        for($i=20;$i<$this->h;$i+=20){
            $this->SetXY(1,$i-3);
            $this->Write(4,$i);
        }
        for($i=20;$i<(($this->w)-($this->rMargin)-10);$i+=20){
            $this->SetXY($i-1,1);
            $this->Write(4,$i);
        }
        $this->SetXY($x,$y);
    }

    function Header()
    {
	
        if($this->grid)
            $this->DrawGrid();

		// Logo do Relatório
		$this->Image('../_lib/img/logo_avant.jpg', 5, 5, 30, 30);

		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 20);

		// Titulo
		$this->SetY(20);
		$this->Cell(0, 15, 'LISTA DE CLIENTE - ORDEM ALFABETICA',0, false, 'C', 0, '', 0, false, 'M', 'M');
		$this->Ln(5);

		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 14);

		// Sub-Titulo
		$this->SetXY(11,40);
		$this->Cell(0, 10, 'Nome do Cliente',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(60,40);
		$this->Cell(0, 10, 'Contato do Cliente',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(110,40);
		$this->Cell(0, 10, 'Cargo do Contato',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(162,40);
		$this->Cell(0, 10, 'Tipo',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(175,40);
		$this->Cell(0, 10, 'CNPJ/CPF',0, false, 'L', 0, '', 0, false, 'M', 'M');
		
		$this->Ln(5);
		
    }
	
    //Rodape
    public function Footer()
    {
        // Posicionado a 15mm do final da p&#65533;gina
        $this->SetY(-15);
        // Tipo de fonte
        $this->SetFont('helvetica', 'I', 8);
        // Numero da Pagina
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
	
	
}	
?>