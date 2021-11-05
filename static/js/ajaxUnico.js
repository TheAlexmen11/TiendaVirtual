var READY_STATE_UNINITIALIZED=0;	//No se a inicializado
var READY_STATE_LOADING=1;			//Cargando
var READY_STATE_LOADED=2;			//Cargado
var READY_STATE_INTERACTIVE=3;		//Interactivo
var READY_STATE_COMPLETE=4;			//Completo

var objXHR;
///////////////////////////////////////////////////////////////////
////////////////// La función crea un objeto //////////////////////
///////////////////////////////////////////////////////////////////
function inicializa_xhr() {
	try {
		objXHR = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			objXHR = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			objXHR = false;
		}
	}

	if (!objXHR && typeof XMLHttpRequest!='undefined') {
		objXHR = new XMLHttpRequest();
	}
				
	return objXHR
}

///////////////////////////////////////////////////////////////////////
///////// La función, forma una cadena con "VARIABLE=VALOR" ///////////
///////////////////////////////////////////////////////////////////////
function crearCadena(xVariables) {
	var cadena='';
	if(xVariables=='') {		//Para reportes SIN ENVIO de variables
		cadena = "nocache="+Math.random();
	}else {						//Para reportes CON ENVIO de variables

		var xArray = xVariables.split('-');	//Convierte a array por "-"
		for(i=0; i<xArray.length; i++)	{	//Forma cadena por bucle
			xVar  = xArray[i]; 				//NOMBRE de variable. Ej. "txtNombre"
											//VALOR de variable. Ej. "Juan"
			valor = document.getElementById(xArray[i]).value;
			dato = xVar+"="+valor+"&";		//Forma cadena
			cadena = cadena + dato;			//Concatena con anterior
		}
		cadena=cadena+"nocache="+Math.random();		//Cadena final
	}
	//alert(cadena);
	return cadena;				//Devuelve la cadena
}

////////////////////////////////////////////////////////////////////////////
// La función, ENVIA DATOS y RECIBE RESULTADO en el id de un elemento HTML
////////////////////////////////////////////////////////////////////////////
//variables: variables que posiblemente requiera el procesador
//etiqueta: etiqueta en la que recibira la respuesta
//id: id de la etiqueta donde recibira la respuesta
//procesador: archivo a dar lectura (txt, php, css, etc.)
function ver(variables,etiqueta,id,procesador){
	///////////////////////////////////////////////////////////////////////
	////// La condición, CREA e ENVIA DATOS al URL a través de objeto /////
	///////////////////////////////////////////////////////////////////////		
	//alert("Hola"+etiqueta+"/"+id+"/"+variables+"/"+carpeta+"/"+procesador);
	objXHR = inicializa_xhr();
	if(objXHR){
		//var host = document.getElementById('txtHost').value;
		//var directorio = document.getElementById('txtDirectorio').value;

		host="localhost";
		directorio="CYHSTORE";
		url="http://"+host+"/"+directorio+"/"+procesador;

		var losDatos = crearCadena(variables);			
		objXHR.onreadystatechange=procesaRespuesta;
		objXHR.open('POST',url,true);
		objXHR.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		objXHR.send(losDatos);				
	}
	
	///////////////////////////////////////////////////////////////////////
	///// La función, RECIBE RESULTADO si logra pasar ciertos estados /////
	///////////////////////////////////////////////////////////////////////		
	function procesaRespuesta(){
		if(objXHR.readyState==READY_STATE_COMPLETE){	//Estado de carga
			if(objXHR.status==200){						//Estado (Código)
				switch(etiqueta){
					case '': alert("No esta bien definido CONTROL e ID"); break;
					case 'input': document.getElementById(id).value = objXHR.responseText; break;
					default: document.getElementById(id).innerHTML = objXHR.responseText; break;
				}
			}
		}
	}	
}