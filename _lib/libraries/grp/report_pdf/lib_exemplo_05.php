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
		$this->Image('../_lib/img/sys__NM__img__NM__logo_avant.png',90,20,30,30);

		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 10);

        $vetor_x = array(3, 50, 10, 10, 100);
        $vetor_y = array(3, 27, 57, 75, 75);
        $largura = array(172, 30, 160, 70, 70);
        $altura = array(90, 10, 10, 10, 10);
		$raio = array(5, 2, 2, 2, 2);
		$resolucao = array(10, 2, 2, 2, 2);
		
        for ($i = 0; $i != count($vetor_x); $i++){
		
			// Desenha a Borda Geral
			$this->VetorX = $vetor_x[$i];
			$this->VetorY = $vetor_y[$i];
			$this->Largura = $largura[$i];
			$this->Altura = $altura[$i];
			$this->Raio = $raio[$i];
			$this->Resolucao = $resolucao[$i];
			$this->DrawBorder();
			
		
		}	

		// Campo Matrícula
		$this->SetXY(50,20);
		$this->Cell(0, 5, 'Matrícula', 0, 0, 'L');		

		// Campo Nome Colaborador
		$this->SetXY(13,53);		
		$this->Cell(0, 10, 'Nome do Colaborador',0, false, 'L', 0, '', 0, false, 'M', 'M');

		// Campo Nome Cargo
		$this->SetXY(10,71);		
		$this->Cell(0, 10, 'Cargo',0, false, 'L', 0, '', 0, false, 'M', 'M');
		
		// Campo Nome Cargo
		$this->SetXY(100,71);		
		$this->Cell(0, 10, 'Validade',0, false, 'L', 0, '', 0, false, 'M', 'M');
		
		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 24);

		// Titulo
		$this->SetXY(55,10);		
		$this->Cell(0, 10, 'AVANT SOLUÇÕES',0, false, 'L', 0, '', 0, false, 'M', 'M');
		$this->Ln(5);

		
    }
	
	function DrawBorder()
    {

			/*
			*             ### DESENHA RETANGULOS COM CANTOS ARREDONDADOS ###
			*/

			$this->SetDrawColor(255,0,0);
			$this->SetLineWidth(0.5);

			$x = $this->VetorX;
			$y = $this->VetorY;
			$w = $this->Largura;
			$h = $this->Altura;	
			$raio = $this->Raio;
			$r = $this->Resolucao;

			$cantoID = 0;
			$cantoIE = 90;
			$cantoSE = 180;
			$cantoSD = 270;

			$x+=$raio;
			$y+=$raio;

			# Linha superior
			$this->Line($x,$y-$raio,$x+$w-($raio*2),$y-$raio);
			# Linha inferior
			$this->Line($x,$y-$raio+$h,$x+$w-($raio*2),$y-$raio+$h);
			# Linha esquerda
			$this->Line($x-$raio,$y,$x-$raio,$y-($raio*2)+$h);
			# Linha direita
			$this->Line($x-$raio+$w,$y,$x-$raio+$w,$y-($raio*2)+$h);

			# Canto Superior Esquerda
			for($cantoSE=180; $cantoSE<270; $cantoSE+=$r)
			{
			   $Xse =((cos($cantoSE*pi()/180))*$raio)+$x;
			   $Yse =((sin($cantoSE*pi()/180))*$raio)+$y;
			   $X1se =((cos(($cantoSE+$r)*pi()/180))*$raio)+$x;
			   $Y1se =((sin(($cantoSE+$r)*pi()/180))*$raio)+$y;
			   $this->Line($Xse,$Yse,$X1se,$Y1se);
			}

			#  Canto Superior Direito
			$x+=$w-$raio-$raio;
			for($cantoSD=270; $cantoSD<360; $cantoSD+=$r)
			{
			   $Xsd =((cos($cantoSD*pi()/180))*$raio)+$x;
			   $Ysd =((sin($cantoSD*pi()/180))*$raio)+$y;
			   $X1sd =((cos(($cantoSD+$r)*pi()/180))*$raio)+$x;
			   $Y1sd =((sin(($cantoSD+$r)*pi()/180))*$raio)+$y;
			   $this->Line($Xsd,$Ysd,$X1sd,$Y1sd);
			}

			# Canto Inferior Direito
			$y+=$h-$raio-$raio;
			for($cantoID=0; $cantoID<90; $cantoID+=$r)
			{
			   $Xid =((cos($cantoID*pi()/180))*$raio)+$x;
			   $Yid =((sin($cantoID*pi()/180))*$raio)+$y;
			   $X1id =((cos(($cantoID+$r)*pi()/180))*$raio)+$x;
			   $Y1id =((sin(($cantoID+$r)*pi()/180))*$raio)+$y;
			   $this->Line($Xid,$Yid,$X1id,$Y1id);
			}

			# Canto Inferior Esquerdo
			$x-=$w-$raio-$raio;
			for($cantoIE=90; $cantoIE<180; $cantoIE+=$r)
			{
			   $Xie =((cos($cantoIE*pi()/180))*$raio)+$x;
			   $Yie =((sin($cantoIE*pi()/180))*$raio)+$y;
			   $X1ie =((cos(($cantoIE+$r)*pi()/180))*$raio)+$x;
			   $Y1ie =((sin(($cantoIE+$r)*pi()/180))*$raio)+$y;
			   $this->Line($Xie,$Yie,$X1ie,$Y1ie);
			}

	}
}	
?>