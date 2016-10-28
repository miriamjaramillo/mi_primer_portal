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
    interesMensual = (parseFloat(f.intereses.value) / parseInt(plazo))/100;
    cuotaFija = (parseFloat(interesMensual) * parseFloat(f.capital.value))/ (1-(Math.pow(1+parseFloat(interesMensual),-(f.cuotas.value))));
    saldoCapital = parseFloat(f.capital.value);
    pagoTotal = parseFloat(f.capital.value) + parseFloat(f.capital.value * f.cuotas.value * interesMensual / 100);
    otros = 0;
    codigo = "<table id ='tabla-credito' border=1>";
    codigo += "<thead>";
    codigo += "<tr>";
    codigo += "<td>Div.</td>";
    codigo += "<td>Saldo Cap.</td>";
    codigo += "<td>Monto Cap.</td>";
    codigo += "<td>Interés</td>";
    codigo += "<td>Otros</td>";
    codigo += "<td>Seg. Desg.</td>";
    codigo += "<td>Cuota fija</td>";
    codigo += "<td>Cuota final</td>";
    codigo += "</tr>";
    codigo += "</thead>";
    codigo += "<tfoot>";
    codigo += "<tr>";
    codigo += "<td>Div.</td>";
    codigo += "<td>Saldo Cap.</td>";
    codigo += "<td>Monto Cap.</td>";
    codigo += "<td>Interés</td>";
    codigo += "<td>Otros</td>";
    codigo += "<td>Seg. Desg.</td>";
    codigo += "<td>Cuota fija</td>";
    codigo += "<td>Cuota final</td>";
    codigo += "</tr>";
    codigo += "</tfoot>";
    codigo += "<tbody>";
    falta = pagoTotal;
    for (a = 1; a <= f.cuotas.value; a++) {
        seguroDesgrav = saldoCapital*(0.6/1000);
        interes = parseFloat(saldoCapital*interesMensual);
        cuotaFinal = seguroDesgrav+cuotaFija;
        montoCapital = cuotaFija-interes;
        codigo += "<tr>";
        codigo += "<td>" + a + "</td>";
        codigo += "<td>" + Math.round(saldoCapital*100)/100 + "</td>";
        codigo += "<td>";
        codigo += Math.round((montoCapital)*100)/100;
        codigo += "</td>";
        codigo += "<td>";
        codigo += Math.round(interes*100)/100;
        codigo += "</td>";
        codigo += "<td>";
        codigo += otros;
        codigo += "</td>";
        codigo += "<td>";
        codigo += Math.round(seguroDesgrav*100)/100;
        codigo += "</td>";
        codigo += "<td>" + Math.round(cuotaFija*100)/100 + "</td>";
        codigo += "<td>" + Math.round((cuotaFinal)*100)/100 + "</td>";
        codigo += "</tr>";
        saldoCapital = saldoCapital - montoCapital;
    }
    codigo += "</tbody></table>";
    credito.innerHTML = codigo;
    $('#tabla-credito').DataTable();
}

function desenfoque(esto) {
    esto.value = esto.value.split(',').join('.');
    if (isNaN(esto.value) || esto.value < 0) {
        esto.value = ''
    }
}