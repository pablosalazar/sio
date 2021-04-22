<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acta de inicio</title>
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <style>

        *{
            font-size: 13px;
        }

        table {
            width: 100%;
        }

        table td {
            border: 1px solid #000;
        }

        .text-center {
            text-align: center;
        }

        .cabecera {
            position: fixed;
            text-align: center;
        }

        .documento {
            position: relative;
            top: 105px;
            padding: 0 20px 50px;
        }

        .col-6 {
            width: 49%;
            float: left;
        }

        .titulo {
            padding-left: 8px;
            display: block;
            letter-spacing: 8px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            width: 340px;
            margin: 0 auto;
            border-bottom: 3px solid #000;
            margin-bottom: 35px;
        }

        html {
            font-family: sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        body {
            margin: 0;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        td,
        th {
            padding: 2px 5px;
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333333;
            background-color: #ffffff;
        }

        table  table {
            border: 0;
        }

        .objeto_contrato {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="cabecera">
        <img src="{{ asset('img/logo-documento.jpg') }}" alt="Logo Sena" class="text-center">
    </div>
    <div class="documento">
        <div class="titulo">
            ACTA DE INICIO
        </div>

        <table border="1">
            <tr>
                <th colspan="2">D A T O S &nbsp;&nbsp; P R E L I M I N A R E S</th>
            </tr>
            <tr>
                <td class="col-1">TIPO DE CONTRATO Ó ACEPTACIÓN DE OFERTA Y NUMERO</td>
                <td class="col-2">CONTRATO DE PRESTACIÓN DE SERVICIOS NÚMERO <b>{{ $contract->number }}</b> DEL {{  mb_convert_case(fecha_letras($contract->legalization_date), MB_CASE_UPPER, "UTF-8") }}</td>
            </tr>
            <tr>
                <td class="col-1">CONTRATISTA E IDENTIFICACIÓN</td>
                <td class="col-2">
                    <strong>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}</strong>,
                        identificado(a) con la
                        @if($employee->document_type == "C.C.")
                            C. de C.
                        @elseif($employee->document_type == "C.E.")
                            C. de E.
                        @else
                            T. de I.
                        @endif
                         No. <strong>{{  number_format($employee->document_number)}} de {{ $employee->document_expedition_place }}</strong>
                </td>
            </tr>
            <tr>
                <td class="col-1">OBJETO</td>
                <td class="col-2" style="text-align: justify" >
                    {{ $contract->object }}
                </td>
            </tr>
            <tr>
                <td class="col-1">VALOR TOTAL ($)</td>
                <td class="col-2">
                    <strong>{{ numtoletras($contract->value) }} (${{ number_format($contract->value) }})</strong>
                </td>
            </tr>
            <tr>
                <td class="col-1">PLAZO</td>
                <td class="col-2">
                    {{ mb_convert_case($contract->duration, MB_CASE_UPPER, "UTF-8") }}
                </td>
            </tr>
            <tr>
                <td class="col-1">SUPERVISOR</td>
                <td class="col-2">
                    {{ mb_convert_case($supervisor->name, MB_CASE_UPPER, "UTF-8") }} cargo {{ mb_convert_case(trim($supervisor->position), MB_CASE_UPPER, "UTF-8") }} identificado con cédula número {{ number_format($supervisor->document_number) }} de
                    {{ $supervisor->document_expedition_place }}
                </td>
            </tr>
        </table>
        <br>
        <p style="text-align: justify">
            En las instalaciones del Servicio Nacional de Aprendizaje – SENA – Regional Cauca, entre los suscritos, por una
            parte, <b>{{ mb_convert_case($supervisor->name, MB_CASE_UPPER, "UTF-8") }}</b>, mayor de edad, domiciliado y residente en Popayán, identificado con la
            cédula de ciudadanía número {{ number_format($supervisor->document_number) }} expedida en {{ $supervisor->document_expedition_place }}, actuando en nombre y representación del Servicio Nacional
            de Aprendizaje SENA Regional Cauca; en mi condición de <b>SUPERVISOR</b> del <b>Contrato No. {{ $contract->number }} de fecha
            {{fecha_letras($contract->legalization_date) }}</b>, debidamente acreditado al ostentar el cargo de {{ mb_convert_case(trim($supervisor->position), MB_CASE_UPPER, "UTF-8") }}, amparado en las facultades
            que confieren las normas del Estatuto General de Contratación Pública, acorde con el procedimiento y lineamientos
            establecidos en la Ley 80 de 1993, Ley 1150 de 2007, Decreto 1882 de 2015 y demás normas complementarias,
            modificatorias y reglamentarias, en la resolución 00965 de 2012 (Manual de supervisión e interventoría de la
            entidad) y en las atribuciones previstas en las cláusulas del contrato arriba referenciado, quien para los
            efectos de la presente se denominará LA ENTIDAD CONTRATANTE, y por la otra parte, <b> {{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}</b>,
            mayor, vecino(a) de {{ $employee->residence_place }}, identificado(a) con la cédula de ciudadanía número
            <b>{{ number_format($employee->document_number) }}, </b> expedida en {{ $employee->document_expedition_place }},
            actuando en este instrumento en nombre propio,
            debidamente acreditado, quien para los efectos de la presente Acta obra como CONTRATISTA; quienes de conformidad con lo
            preceptuado en Estatuto General de Contratación Pública, acorde con el procedimiento y lineamientos establecidos
            en la Ley 80 de 1993, Ley 1150 de 2007, Decreto 1882 de 2015 y demás normas complementarias, modificatorias y
            reglamentarias, así como en la resolución 00965 de 2012 (Manual de supervisión e interventoría de la entidad);
            proceden a suscribir la presente <b>ACTA DE INICIO</b> del Contrato de prestación de servicios No. {{ $contract->number }} del {{fecha_letras($contract->legalization_date)}},
            quienes de común acuerdo establecen como fecha para tal fin el día <b>{{ fecha_letras($contract->start_date, 1) }}</b>,
            teniendo en cuenta que: 1) Que las partes suscribieron Contrato de prestación de servicios No. {{ $contract->number }} del {{fecha_letras($contract->legalization_date)}},
            cuyo objeto es: <em class="objeto_contrato">“{{ $contract->object }}"</em>, todo acorde a la propuesta u oferta presentada
            por el contratista; contrato que se encuentra a la fecha debidamente suscrito por las partes intervinientes y/o perfeccionado; 2) Que el valor total
            del contrato fue pactado en la suma de <b>{{ numtoletras($contract->value) }} ({{number_format($contract->value )}});</b> <b>Esta suma será pagada por el SENA al contratista de 
            acuerdo al número de horas mensuales reportadas y aprobadas en el informe de supervisión </b> 
            4) Que el termino de duración del contrato es de <b>{{mb_convert_case($contract->duration, MB_CASE_UPPER, "UTF-8")}}</b>, contados a partir del acta de inicio, previo registro
            presupuestal y aprobación de garantía si fue exigible; 5) Que acorde a lo establecido en el contrato aludido, se
            requiere para su ejecución de registro presupuestal correspondiente, aprobación de la garantía única número {{$contract->number_policy}}
            de fecha {{ fecha_letras($contract->policy_expedition_date) }} de la aseguradora {{ mb_convert_case($contract->insurance, MB_CASE_UPPER, "UTF-8") }}
            y acreditación de pago de aportes a seguridad social del mes de {{ fecha_mes_anio($contract->last_month_payment_contribution) }}. 6) Que el contratista realizó afiliación a ARL el 
            {{ fecha_letras($contract->arl_expedition_date) }}.
        </p>
        <p style="text-align: justify">
            La suscripción de la presente acta por parte del <b>CONTRATISTA</b>, implica la aceptación de condiciones, disposición
            y conocimientos suficientes para la cabal ejecución del objeto contractual. Las partes declaran que se ha satisfecho
            con antelación los requisitos de ley y los exigidos por el SENA para el perfeccionamiento del contrato y el supervisor
            deja constancia expresa del cabal cumplimiento de dichas exigencias.
        </p>
        <p style="text-align: justify">
            Sin otro particular, se suscribe la presente Acta de inicio, mediante la cual el supervisor del contrato autoriza el
            inicio de la ejecución del contrato {{ $contract->number }} del {{ fecha_letras($contract->legalization_date) }}, en atención a
            que ha realizado la verificación de las condiciones solicitadas por la entidad para dar inicio al contrato.
        </p>
        <p style="text-align: justify">
            Para constancia se firma por las partes intervinientes, en la ciudad de Popayán, departamento del Cauca, a
            los {{ fecha_letras($contract->start_date, 2)}}.
            <br>
            <br>
            <br>
        </p>

        <div class="col-6">
            POR LA PARTE CONTRATANTE: <br>
            <br>
            <br>
            <br>
            <br>
            <b>{{ mb_convert_case($supervisor->name, MB_CASE_UPPER, "UTF-8") }}</b><br>
            SUPERVISOR DE CONTRATO

        </div>
        <div class="col-6">
            POR EL CONTRATISTA: <br>
            <br>
            <br>
            <br>
            <br>
            <b>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }} </b><br>
            CONTRATISTA

        </div>
    </div>
</body>
</html>
<?php

    function fecha_letras($fecha, $formato = 0)
    {
        $dia = substr($fecha, 0, 2);
        $mes = substr($fecha, 3, 2);
        $anio = substr($fecha, 6, 4);

        $UNIDADES = array(
        '','UN','DOS','TRES','CUATRO','CINCO','SEIS','SIETE','OCHO',
        'NUEVE','DIEZ','ONCE','DOCE','TRECE','CATORCE','QUINCE',
        'DIECISEIS','DIECISIETE','DIECIOCHO','DIECINUEVE','VEINTE'
        );
        $UNIDADES2 = array(
                '','UNO','DOS','TRES','CUATRO','CINCO','SEIS','SIETE','OCHO',
                'NUEVE','DIEZ','ONCE','DOCE','TRECE','CATORCE','QUINCE',
                'DIECISEIS','DIECISIETE','DIECIOCHO','DIECINUEVE','VEINTE'
        );
        $DECENAS = array(
                'VEINT','TREINTA','CUARENTA',
                'CINCUENTA','SESENTA','SETENTA','OCHENTA','NOVENTA','CIEN '
        );

        switch($mes) {
            case "01":
                $mes = "Enero";
                break;
            case "02":
                $mes = "Febrero";
                break;
            case "03":
                $mes = "Marzo";
                break;
            case "04":
                $mes = "Abril";
                break;
            case "05":
                $mes = "Mayo";
                break;
            case "06":
                $mes = "Junio";
                break;
            case "07":
                $mes = "Julio";
                break;
            case "08":
                $mes = "Agosto";
                break;
            case "09":
                $mes = "Septiembre";
                break;
            case "10":
                $mes = "Octubre";
                break;
            case "11":
                $mes = "Noviembre";
                break;
            case "12":
                $mes = "Diciembre";
                break;
        }

        switch ($formato) {
            case 1: 
                if (intval($dia) < 21)
                    return sprintf('%s', ucwords(strtolower($UNIDADES2[intval($dia)]))) . " (".$dia.") de " . strtolower($mes) . " de " . $anio;
                else 
                    return sprintf('%si%s', ucwords(strtolower($DECENAS[intval($dia[0])-2])), strtolower($UNIDADES2[intval($dia[1])])) . " (".$dia.") de " . strtolower($mes) . " de " . $anio;
                break;
            case 2:                  
                if (intval($dia) < 21)
                    return sprintf('%s', ucwords(strtolower($UNIDADES[intval($dia)]))) ." (".$dia.") dias del mes de " . strtolower($mes) . " de " . $anio;
                else 
                    return sprintf('%si%s', ucwords(strtolower($DECENAS[intval($dia[0])-2])), strtolower($UNIDADES[intval($dia[1])])) . " (".$dia.") dias del mes de " . strtolower($mes) . " de " . $anio;
                break;
        }

        return  $dia . " de " .  $mes . " de " . $anio;
    }

    function fecha_mes_anio($fecha) {        
        $fecha = explode("/", strtolower($fecha));
        return count($fecha) > 1 ? $fecha[0] ." de ".$fecha[1] : $fecha[0];
    }

    function numtoletras($xcifra)
    {
        $xarray = array(0 => "Cero",
                1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
                "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
                "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
                100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
        );

        $xcifra = trim($xcifra);
        $xlength = strlen($xcifra);
        $xpos_punto = strpos($xcifra, ".");
        $xaux_int = $xcifra;
        $xdecimales = "00";
        if (!($xpos_punto === false)) {
            if ($xpos_punto == 0) {
                $xcifra = "0" . $xcifra;
                $xpos_punto = strpos($xcifra, ".");
            }
            $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
            $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
        }

        $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
        $xcadena = "";
        for ($xz = 0; $xz < 3; $xz++) {
            $xaux = substr($XAUX, $xz * 6, 6);
            $xi = 0;
            $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
            $xexit = true; // bandera para controlar el ciclo del While
            while ($xexit) {
                if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                    break; // termina el ciclo
                }

                $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
                $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
                for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                    switch ($xy) {
                        case 1: // checa las centenas
                            if (substr($xaux, 0, 3) < 100) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                            } else {
                                $key = (int) substr($xaux, 0, 3);
                                if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
                                    $xseek = $xarray[$key];
                                    $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                    if (substr($xaux, 0, 3) == 100)
                                        $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                    else
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                                }
                                else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                    $key = (int) substr($xaux, 0, 1) * 100;
                                    $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 0, 3) < 100)
                            break;
                        case 2: // checa las decenas (con la misma lógica que las centenas)
                            if (substr($xaux, 1, 2) < 10) {

                            } else {
                                $key = (int) substr($xaux, 1, 2);
                                if (TRUE === array_key_exists($key, $xarray)) {
                                    $xseek = $xarray[$key];
                                    $xsub = subfijo($xaux);
                                    if (substr($xaux, 1, 2) == 20)
                                        $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                    else
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    $xy = 3;
                                }
                                else {
                                    $key = (int) substr($xaux, 1, 1) * 10;
                                    $xseek = $xarray[$key];
                                    if (20 == substr($xaux, 1, 1) * 10)
                                        $xcadena = " " . $xcadena . " " . $xseek;
                                    else
                                        $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 1, 2) < 10)
                            break;
                        case 3: // checa las unidades
                            if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

                            } else {
                                $key = (int) substr($xaux, 2, 1);
                                $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                                $xsub = subfijo($xaux);
                                $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                            } // ENDIF (substr($xaux, 2, 1) < 1)
                            break;
                    } // END SWITCH
                } // END FOR
                $xi = $xi + 3;
            } // ENDDO

            if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
                $xcadena.= " DE";

            if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
                $xcadena.= " DE";

            // ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
            if (trim($xaux) != "") {
                switch ($xz) {
                    case 0:
                        if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                            $xcadena.= "UN BILLON ";
                        else
                            $xcadena.= " BILLONES ";
                        break;
                    case 1:
                        if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                            $xcadena.= "UN MILLON ";
                        else
                            $xcadena.= " MILLONES ";
                        break;
                    case 2:
                        if ($xcifra < 1) {
                            $xcadena = "CERO PESOS M/C";
                        }
                        if ($xcifra >= 1 && $xcifra < 2) {
                            $xcadena = "UN PESO M/C";
                        }
                        if ($xcifra >= 2) {
                            $xcadena.= " PESOS M/C"; //
                        }
                        break;
                } // endswitch ($xz)
            } // ENDIF (trim($xaux) != "")
            // ------------------      en este caso, para México se usa esta leyenda     ----------------
            $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
            $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
            $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
            $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
            $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
            $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
            $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
        } // ENDFOR ($xz)
        return trim($xcadena);
    }

    function subfijo($xx)
    { // esta función regresa un subfijo para la cifra
        $xx = trim($xx);
        $xstrlen = strlen($xx);
        if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
            $xsub = "";
        //
        if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
            $xsub = "MIL";
        //
        return $xsub;
    }


?>
