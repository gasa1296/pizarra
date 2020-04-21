//variables globales
let equipo1 = document.getElementById("equipo_home")
let equipo2 = document.getElementById("equipo_visitante")
equipo1 = equipo1.options[equipo1.selectedIndex].value;
equipo2 = equipo2.options[equipo2.selectedIndex].value;
let opcion_jugador
let opcion_posicion
let jugadores

select_jugadores(document.getElementById("equipo_home"));
select_jugadores(document.getElementById("equipo_visitante"));

cargar_jugadores();


//ajax de insercion
function insercion(obj) {
	let tipo

	equipo1 = document.getElementById("equipo_home")
	equipo2 = document.getElementById("equipo_visitante")
	equipo1 = equipo1.options[equipo1.selectedIndex].value;
	equipo2 = equipo2.options[equipo2.selectedIndex].value;

	if(obj.getAttribute("id") == "home"){
		tipo = "home"
		opcion_jugador = document.getElementById("jugadores_home");
		opcion_posicion = document.getElementById("posicion_home");
	}
	else{
		tipo = "visitante"
		opcion_jugador = document.getElementById("jugadores_visitante");
		opcion_posicion = document.getElementById("posicion_visitante");
	}

	opcion_jugador = opcion_jugador.options[opcion_jugador.selectedIndex];
	opcion_posicion = opcion_posicion.options[opcion_posicion.selectedIndex];

	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText)
			cargar_jugadores()
		}
	};
	xmlhttp.open("GET", "insert.php"
		+ "?e1=" + equipo1
		+ "&e2=" + equipo2
		+ "&tp=" + tipo
		+ "&ij=" + opcion_jugador.value
		+ "&pos=" + opcion_posicion.value, false);
	xmlhttp.send();    
}

//ajax de carga
function cargar_jugadores() {
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			jugadores = JSON.parse(this.responseText);
			if (jugadores.lineup_h){
				document.getElementById("tabla_home").innerHTML = jugadores.lineup_h
				select_jugadores(document.getElementById("equipo_home"))
			}
			if (jugadores.lineup_v) {
				document.getElementById("tabla_visitante").innerHTML = jugadores.lineup_v
				select_jugadores(document.getElementById("equipo_visitante"))
			}
		}
	};
	xmlhttp.open("GET", "select.php" + "?e1=" + equipo1 + "&e2=" + equipo2, false);
	xmlhttp.send();
}


function select_jugadores(obj){
	let tipo = ""
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			jgs = JSON.parse(this.responseText);
			let select;
			if(obj.getAttribute("id")=="equipo_home"){
				select = document.getElementById("jugadores_home");
				tipo = "home";
			}
			else{
				select = document.getElementById("jugadores_visitante");
				tipo = "visitante"
			}
			select.innerHTML = ""
			for (let i = 0; i < jgs.length; i++) {
				let opcion = document.createElement("option");
				opcion.value = jgs[i].id;
				opcion.innerHTML = jgs[i].nombre + " " +jgs[i].apellido;
				select.appendChild(opcion)
			}

		}
	};

   
	xmlhttp.open("GET", "select_equipo.php" + "?ie=" + obj.options[obj.selectedIndex].value + "&tp=" + tipo, false);
	xmlhttp.send();
}

function cambio_posicion(obj) {
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
		}
	};
	xmlhttp.open("GET", "update.php" + "?ij=" + obj.getAttribute('id') + "&tp=" + obj.getAttribute("class") + "&pos=" + obj.options[obj.selectedIndex].value, true);
	xmlhttp.send();
}

function finalizar() {
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			cargar_jugadores()
		}
	};
	xmlhttp.open("GET", "truncate.php", true);
	xmlhttp.send();
}

function activo_inactivo(obj){
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			cargar_jugadores()
		}
	};
	xmlhttp.open("GET", "activar.php" + "?tbidac=" + obj.getAttribute('id'), true);
	xmlhttp.send();
}