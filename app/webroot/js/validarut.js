function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		//window.document.form1.rut.focus();		
		//window.document.form1.rut.select();		
		return false;	
	}	
	return true;
}

function revisarDigito2( crut )
{	
	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		//window.document.form1.rut.focus();		
		//window.document.form1.rut.select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
		alert("EL rut es incorrecto")		
		//window.document.form1.rut.focus();		
		//window.document.form1.rut.select();		
		return false	
	}

	return true
}
function SoloTexto(texto) {
if(texto!= ''){
	var valid1 = /([A-Z\s\\]+)/i;

		if (!valid1.test(texto)) {
			alert("El nombre no puede contener números")
        	return false;
        }
        else return true;

 }else   alert("Debe ingresar su nombre");       	

}


function Email(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        alert("Email incorrecto")
        return false;	
    }
    else return true;
}

function Genero(genero) {
    
    if ( genero == 1){
        alert("Por favor seleccione su género")
        return false;	
    }
    else return true;
}

function Carrera(carrera) {
    
    if ( carrera == 1){
        alert("Por favor seleccione su carrera")
        return false;	
    }
    else return true;
}



   function SoloNumeros1(numero){

   	if(numero!= ''){
   		
   		if(numero.length != 10){
   			alert("Número de matrícula erroneo") 
  		return false;
   		}
   		else{
		    	if (!/^([0-9])*$/.test(numero)){
		    		alert("El número de matricula no puede contener letras ni espacios") 
		  		return false;
		    	}
		      else{ return true;}
		    }  
  	}else alert("Debe ingresar el numero de matrícula"); 
  }


   function SoloNumeros2(numero){

   	if(numero!= ''){

   		if(numero.length != 4){
   			alert("Año de ingreso erroneo") 
  		return false;
   		}
   		else{
    			if (!/^([0-9])*$/.test(numero)){
    				alert("El año de ingreso no puede contener letras ni espacios"); 
  				return false;
   	 		}
      			else{ return true;}
      	}		

    }else alert("Debe ingresar un año de ingreso");   
  }


function Rut(texto)
{	
	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
	//	window.document.form1.rut.focus();		
	//	window.document.form1.rut.select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
		//	window.document.form1.rut.focus();			
		//	window.document.form1.rut.select();			
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	

	//window.document.form1.rut.value = invertido.toUpperCase()		

	if ( revisarDigito2(texto) )		
		return true;	

	return false;
}
