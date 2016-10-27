function validar(e, punto) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla < 48 || tecla > 57) {
        if (punto && (tecla == 46 || tecla == 44)) {
            return true;
        }
        return false
    }
}

function calcula() {
    f = document.forms[0];
    plazo = 12;
    /*plazo=(f.plazo[0].checked)?f.plazo[0].value:f.plazo[1].value; */
    interesMensual = parseFloat(f.intereses.value) / parseInt(plazo);
    pagoTotal = parseFloat(f.capital.value) + parseFloat(f.capital.value * f.cuotas.value * interesMensual / 100);
    codigo = "<table border=1>";
    codigo += "<tr>";
    codigo += "<td>Cuota nº</td>";
    codigo += "<td>Cuota</td>";
    codigo += "<td>Amortización</td>";
    codigo += "<td>Interés</td>";
    codigo += "<td>Falta por pagar</td>";
    falta = pagoTotal;
    for (a = 1; a <= f.cuotas.value; a++) {
        cuota = Math.ceil(pagoTotal / f.cuotas.value * 100) / 100;
        amortizacion = parseInt(f.capital.value / f.cuotas.value * 100) / 100;
        interes = parseInt(100 * (cuota - amortizacion)) / 100;
        falta = parseInt(100 * (falta - cuota)) / 100;
        codigo += "<tr>";
        codigo += "<td>" + a + "</td>";
        codigo += "<td>";
        if (a == f.cuotas.value) {
            cuota = parseInt(100 * (cuota + falta)) / 100;
            falta = 0
        }
        codigo += cuota
        codigo += "</td>";
        codigo += "<td>";
        codigo += amortizacion
        codigo += "</td>";
        codigo += "<td>";
        codigo += interes;
        codigo += "</td>";
        codigo += "<td>";
        codigo += falta;
        codigo += "</td>";
        codigo += "</tr>";
    }
    codigo += "</table>";
    credito.innerHTML = codigo;
}

function desenfoque(esto) {
    esto.value = esto.value.split(',').join('.');
    if (isNaN(esto.value) || esto.value < 0) {
        esto.value = ''
    }
}