function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                        || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                        || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                            NovoValorCampo += Mascara.charAt(i); 
                            TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
    }
	//Script para a formatação da data
	function SomenteNumero(e){
		var tecla=(window.event)?event.keyCode:e.which;   
		if((tecla>47 && tecla<58 || tecla==46)) return true;
			else{//alert("entrou no else"+tecla);
		if (tecla==8 || tecla==0) return true;
		else  return false;
		}
	}
	   	//Script para a formatação da data
	function dataContaup(c){
	if(event.keyCode==8){}else
		if(c.value.length ==2){
		c.value += '/';
		}
		if(event.keyCode==8){}else
		if(c.value.length ==5){
		c.value += '/';
			}
	}

	function dataContadown(c){

		if(c.value.length ==2 && event.keyCode!=8){
		c.value += '/';
		}
		if(c.value.length ==5 && event.keyCode!=8){
		c.value += '/';
		}
	}
	//Script para a formatação da altura

	function Pesoup(c){
		if(c.value.length>=5){
			return c=formataCampo(c,'000.000',event);
		}else
		if(c.value.length>=3){
			return c=formataCampo(c,'00.000',event);
		}
	}
	//Script para a formatação da altura
	function Alturaup(c){
		if(c.value.length>=4){

			return c=formataCampo(c,'000.00',event);
		}
	}	