<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acta de idoneidad</title>
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <style>
        *{
            font-size: 15px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .cabecera {
            position: fixed;
            text-align: center;
        }

        .documento {
            position: relative;
            top: 105px;
            padding: 0 20px 0;
        }

        .titulo {
            font-size: 16px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .font-small {
            font-size: 11px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        <img src="{{ asset('img/logo-documento.jpg') }}" alt="Logo Sena" class="text-center">
    </div>
    <div class="documento">
        <div class="titulo">
            ANEXO 6
        </div>
        <br>
        <div class="titulo">
            CERTIFICACIÓN DE IDONEIDAD Y EXPERIENCIA DEL CONTRATISTA
        </div>
        <br>
        <div class="titulo">
            EL SUBDIRECTOR DEL CENTRO DE TELEINFORMATICA Y PRODUCCION INDUSTRIAL, <br>
            DE LA REGIONAL CAUCA DEL SENA
        </div>
        <br>
        <div class="titulo">
            HACE CONSTAR:
        </div>
        <p style="text-align:justify">
            Que revisada la hoja de vida y los documentos que acreditan los estudios, la tarjeta profesional (en caso que se requiera para el
            ejercicio de la profesión), la experiencia y la capacitación del señor (a) <b>{{ mb_convert_case($employee->nombre, MB_CASE_UPPER, "UTF-8") }}</b>,
            identificado (a) con la

            @if($employee->document_type == "C.C.")
                cédula de ciudadanía
            @elseif($employee->document_type == "C.E.")
                cédula de extranjería
            @else
                tarjeta de identidad
            @endif

            No. {{ number_format($employee->document_number) }} de {{ $employee->document_expedition_place }}, así como la oferta de servicios
            que presentó, queda demostrado que tiene la idoneidad y experiencia requerida en el <em>“Estudio previo para determinar y justificar la necesidad
            y oportunidad de la contratación”</em>, y está en capacidad de ejecutar el objeto del contrato, consistente en {{ $contract->object }},
            @if($contract->type == "Periodos fijos mensuales" )
                POR PERIODOS FIJOS MENSUALES.
            @else
                POR HORAS.
            @endif
        </p>
        <p style="text-align:justify">
            Adicionalmente, en los mencionados documentos y en los certificados de antecedentes disciplinarios, fiscales y judiciales, no se evidencia
            causal de inhabilidad o incompatibilidad para contratar.
        </p>
        <p style="text-align:justify">
            Por lo anterior, la mencionada persona natural tiene la capacidad, idoneidad y experiencia para ejecutar el contrato.
        </p>
        <p style="text-align:justify">
            Que en cumplimiento a lo ordenado por el Artículo 2.2.1.2.1.4.9 del Decreto 1082 de 2015, por tratarse de un contrato de
            prestación de servicios, no es necesario obtener previamente varias ofertas.
        </p>
        <p>Se expide en Popayán, el día {{ fecha_letras($contract->legalization_date) }}. </p>
        <br>
        <br>
        <br>
        <br>
        <div class="titulo">
            <span>EDIER ORLANDO BOLAÑOS HOYOS</span>
        </div>
        <br>



        <p class="font-small">Revisó: Marcela Ausecha S. - Apoyo administrativo y jurídico.</p>

        <p class="font-small">Elaboró: Aura Elena Tulande - Apoyo supervisión de contratistas.</p>

    </div>
</body>
</html>

<?php

function fecha_letras($fecha)
{
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 3, 2);
    $anio = substr($fecha, 6, 4);

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

    return  $dia . " de " .  $mes . " de " . $anio;
}
?>
