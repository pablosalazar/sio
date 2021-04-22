<?php
define("DOMPDF_ENABLE_PHP", true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minuta del contrato</title>
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <style>
        *{
            font-size: 14px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        body {
            position: relative;
            border: 1px solid #000;
            border-style: double;
            border-width:6px;
        }

        .cabecera {
            position: fixed;
            padding: 20px  20px 0 20px;
            color: #92908E;
            font-weight: bold;
            height: 120px;
        }

        .cabecera img {
            float: left;
            vertical-align: middle;
        }

        .cabecera .texto {
            text-align: center;
            line-height: 25px;
        }

        .cabecera .espacio {
            color: #FFF;
        }

        .documento {
            position: relative;
            top: 140px;
            text-align: justify;
            padding: 0 10px;
            font-size: 13px;
            padding-bottom: 60px;
        }

        .documento .italica {
            font-style: italic;
            font-size: 13px;
        }

        .documento .subraya {
            text-decoration: underline;
            font-size: 13px;
        }

        .documento b {
            font-size: 13px;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -10px;
            right: 0px;
            height: 65px;
            color: #92908E;
            padding: 0 15px;
            font-size: 12px !important;
        }
        #footer .formato, #footer .page {
            display:inline;
        }

        #footer .formato {
            text-align: right;
        }

        /*#footer .pagenum:before { content: counter(page) " de " counter(pages); }*/
        #footer .pagenum:before { content: counter(page)  }

        .col-6 {
            display: inline-block;
            width: 49%;
            /*float: left;*/
        }


    </style>
</head>
<body>
    <div class="cabecera">
        <img src="{{ asset('img/logo-minuta.jpg') }}" alt="Logo Sena" class="text-center">
        <p class="texto">
            CONTRATO DE PRESTACIÓN DE SERVICIOS No. <span class="espacio">XXXXXX</span> DE 2017, SUSCRITO ENTRE EL SERVICIO NACIONAL DE
            APRENDIZAJE – SENA Y {{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}
        </p>
    </div>
    <div id="footer">
        <p class="page">Página <span class="pagenum"></span></p>
        <p class="formato">GTH-F-077 V.06</p>

    </div>
    <div class="documento">
        Entre los suscritos, <b>EDIER ORLANDO BOLAÑOS HOYOS</b>, domiciliado en la ciudad de Popayán-Cauca, identificado con la
        C. de C. 10.541.127, actuando en nombre y representación del SENA en su calidad de SUBDIRECTOR DEL CENTRO DE
        TELEINFORMÁTICA Y PRODUCCIÓN INDUSTRIAL  y representante legal del mismo ostentando la ordenación del gasto,
        debidamente acreditado y autorizado, cargo en el que fue nombrado mediante Resolución 470 del 2016, y del cual
        tomo posesión con el Acta 038 de 2016, actuando en nombre y representación del <b>SERVICIO NACIONAL DE APRENDIZAJE -
            SENA</b>, Establecimiento Público del orden nacional adscrito al Ministerio del Trabajo, en virtud de la delegación de
        funciones otorgada en la Resolución 2331 de 2013 o la que la modifique, que en adelante se denomina <b>EL SENA</b>, y
        de otra parte <b>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}</b>, identificado(a) con la
        @if($employee->document_type == "C.C.")
            C. de C.
        @elseif($employee->document_type == "C.E.")
            C. de E.
        @else
            T. de I.
        @endif
        No. {{ number_format($employee->document_number, 0, ',', '.') }}, persona natural que en adelante se denomina
        el (la) <b>CONTRATISTA</b>, hemos convenido celebrar el presente Contrato de Prestación de Servicios Personales que se
        regirá por la Ley 80 de 1993, la Ley 1150 de 2007 y el Decreto 1082 de 2015 en su parte pertinente, previas las
        siguientes <b>CONSIDERACIONES: 1.</b> Que el numeral 3 del artículo 32 de la Ley 80 de 1993, señala que el contrato de
        prestación de servicios personales no genera relación laboral ni prestaciones sociales, no tiene subordinación y
        se celebrará por el término estrictamente indispensable; por su parte, el literal h) del numeral 4 del artículo 2°
        de la Ley 1150 de 2007, dispone que los contratos para la prestación de servicios profesionales y de apoyo a la
        gestión, se tramitan por la modalidad de contratación directa, en tanto que el artículo 2.2.1.2.1.4.9 del Decreto
        1082 de 2015, establece que <span class="italica">“Las entidades estatales pueden contratar bajo la modalidad de contratación directa
        la prestación de servicios profesionales y de apoyo a la gestión con la persona natural o jurídica que esté en
        capacidad de ejecutar el objeto del contrato, siempre y cuando la entidad estatal verifique la idoneidad o
        experiencia requerida y relacionada con el área de que se trate. En este caso, no es necesario que la entidad
        estatal haya obtenido previamente varias ofertas, de lo cual el ordenador del gasto debe dejar constancia escrita.
        // Los servicios profesionales y de apoyo a la gestión corresponden a aquellos de naturaleza intelectual diferentes
        a los de consultoría que se derivan del cumplimiento de las funciones de la entidad estatal, así como los
        relacionados con actividades operativas, logísticas, o asistenciales. //La entidad estatal, para la contratación
        de trabajos artísticos que solamente puedan encomendarse a determinadas personas naturales, debe justificar
        esta situación en los estudios y documentos previos”</span>. <b>2.</b> Que la subdirección del Centro Teleinformática
        y Producción Industrial del SENA adelantó los trámites normativos legales y reglamentarios, y elaboró los
        documentos y estudios previos exigidos normativamente. <b>3.</b> Que se encuentra certificada la inexistencia
        de personal en la planta. <b>4.</b> Que se encuentra autorizada la presente contratación por tratarse de
        objetos iguales. <b>5.</b> Que se suscribió el estudio previo para determinar y justificar la necesidad y
        oportunidad del presente contrato, quedando sustentada y evidenciada la necesidad de contratar los
        servicios personales señalados en el objeto. <b>6.</b> Que la subdirección de centro, como ordenador del gasto,
        deja constancia que la persona natural contratada cuenta con la  capacidad, idoneidad y/o experiencia
        requerida y relacionada con el área de qué trata el contrato, sin que sea necesario haber obtenido
        previamente varias ofertas. <b>7.</b> Que de conformidad con lo anterior, las partes acuerdan las siguientes
        <b>CLÁUSULAS: CLÁUSULA PRIMERA.- Objeto:</b> {{ $contract->object }}. <b>CLÁUSULA SEGUNDA.-Plazo:</b> hasta el
        31 de Diciembre de 2017 sin exceder la presente vigencia presupuestal y empezara a contarse a partir del
        cumplimientos de los requisitos de perfeccionamiento y ejecución indicados en este contrato, <b>CLÁUSULA  TERCERA.
        - <span class="subraya">Valor y Forma de Pago:</span></b> El valor total del presente contrato es de
        {{ numtoletras($contract->value) }} (${{ number_format($contract->value, 0, ',', '.') }}) incluido IVA
        (de conformidad con el régimen tributario a que pertenezca el contratista). Esta suma será pagada por el
        SENA al contratista de la siguiente manera: {{ $contract->payment_method }} Los honorarios serán pagados por
        el SENA al contratista, conforme a la disponibilidad de recursos y de acuerdo al cronograma definido
        por la Dirección Administrativa y Financiera de la Dirección General, en la cuenta ahorros No. {{ $contract->account_number }}
        del Banco {{ $contract->bank }}, cuyo titular es el (la) Contratista; <b>PARAGRAFO PRIMERO:</b> El cambio de cuenta
        por parte del contratista deberá ser informada al supervisor del contrato con el fin de surtir los trámites
        pertinentes.  <b>PARAGRAFO SEGUNDO:</b> Para   que   el   SENA   pueda   adelantar   los trámites administrativos
        para el pago, el (la) Contratista debe acreditar previamente el cumplimiento de los requisitos de pago, tales
        como la certificación expedida por el supervisor del contrato, en la que acredite el cumplimiento a entera
        satisfacción del objeto y obligaciones del contrato en el respectivo periodo y la certificación de aportes
        al sistema general de Salud, Pensión y Riesgos Profesionales, así como los  demás documentos necesarios
        para el pago <b>CLÁUSULA CUARTA.- <span class="subraya">Obligaciones de las partes:</span> A) OBLIGACIONES DEL Ó DE LA CONTRATISTA:</b> El
        (la) CONTRATISTA, además de las obligaciones que por su índole y la naturaleza del contrato de prestación de
        servicios le son propias, se obliga para con EL SENA: <b>OBLIGACIONES ESPECÍFICAS:</b> XXXXXXXXXXX.
        <b>OBLIGACIONES GENERALES. 1.</b> En cumplimiento de lo dispuesto en el parágrafo 1° del artículo 23 de la ley
        1150 de 2007 y del artículo 6 de la ley 1562 de 2012, el (la) CONTRATISTA deberá acreditar que se encuentra
        al día en el pago mensual de los aportes al sistema de seguridad social integral (salud, pensión y riesgos
        laborales) y para la realización de cada pago derivado del mismo; estos pagos se acreditan únicamente por
        el sistema PILA o de Planilla Asistida o el que determine el Ministerio de Trabajo. Cuando corresponda,
        el (la) contratista también debe acreditar el pago oportuno de los aportes al SENA, ICBF y cajas de
        Compensación Familiar (cuando corresponda) <b>2.</b> El contratista debe cumplir con las normas del Sistema
        General de Riesgos Laborales, en especial, las siguientes: a. Procurar el cuidado integral de su salud. b.
        El contratista informará al SENA la ARL a la cual desea afiliarse, para lo cual cada Centro de Formación,
        Dirección Regional y Dirección General (según corresponda) establecerán los procedimientos para afiliación
        a la ARL seleccionada por el contratista e informará por escrito la fecha a partir de la cual quedó afiliado
        al sistema de riesgos laborales. (Art. 4 Decreto 723 de 2013). c. El pago de los aportes al sistema de
        riesgos laborales se realizará de acuerdo a la clase de actividad establecida en el objeto y obligaciones
        del contratista en los términos establecidos en el Decreto 1607 de 2002. (Ley 1562 de 2012 y Decreto 1530
        de 1996). d. Los Elementos de Protección Personal que requiera el contratista para la ejecución del objeto
        del mismo correrán por su cuenta y antes de iniciar la ejecución el Supervisor le informará por escrito
        la clase y cantidad de elementos que se requieren y verificará sus condiciones de acuerdo con el tipo de
        riesgo a que esté expuesto. (Decreto 723 de 2013, art. 16 numeral 2). e. Exámenes médicos preocupacionales.
        El contratista deberá hacer entrega del examen médico preocupacional al Grupo de Seguridad y Salud en el
        Trabajo de la Dirección General y/o sus homólogos en los Centros de Formación y Direcciones Regionales de
        acuerdo con el profesiograma y el objeto a desarrollar y dentro de los plazos establecidos legalmente.
        (Decreto 723 de 2013 art. 18) f. El contratista se compromete a cumplir  a cabalidad con las normas,
        reglamentos y  la política de seguridad y salud en el trabajo establecida por la entidad al igual
        que suministrar información clara, veraz y completa sobre su estado de salud e informar  oportunamente
        al SENA acerca de los peligros y riesgos latentes en la ejecución contractual. (Decreto 1443 de 2014 arts.
        5 y 10). g. Informar a los contratantes la ocurrencia de incidentes, accidentes de trabajo y enfermedades
        laborales. h. Participar en las actividades de Prevención y Promoción organizadas por los contratantes,
        los Comités Paritarios de Seguridad y Salud en el Trabajo o Vigías Ocupacionales o la Administradora
        de Riesgos Laborales. i. Informar oportunamente a los contratantes toda novedad derivada del contrato.
        <b>3.</b> vigilar y salvaguardar los bienes que hagan parte del patrimonio del SENA o de  otras entidades
        o  de particulares puestos al servicio de la entidad, y que le hayan sido entregados para el desarrollo
        del objeto del contrato, por lo que son sujetos de control y vigilancia. En consecuencia deberán dar cuenta
        sobre la entrega de los bienes al supervisor y/o interventor del contrato respectivo y a los órganos de
        control fiscal y disciplinario, de ser procedente. <b>4.</b> El contratista deberá ejecutar su contrato
        conforme al Sistema Integrado de Gestión y Autocontrol “SIGA” del SENA el cual se encuentra documentado en la
        plataforma Compromiso. <b>5.</b> Las demás necesarias para el cabal cumplimiento del objeto contractual.
        <b>PARAGRAFO PRIMERO:</b> Con la suscripción de este contrato, el SENA queda autorizado expresamente por el
        (la) Contratista para verificar sus antecedentes judiciales y la información que considere necesaria
        en los Sistemas de Información correspondientes, con el uso y las condiciones señaladas en las normas
        vigentes. <b>PARAGRAFO SEGUNDO:</b> Los derechos patrimoniales de autor de todos los documentos y desarrollos
        que produzca o realice el (la) CONTRATISTA en virtud de la ejecución del presente contrato, serán de
        propiedad del SENA; Si hay lugar a publicaciones se dará el respectivo reconocimiento de los derechos
        morales de autor. <b>PARAGRAFO TERCERO:</b> En caso de requerirse el desplazamiento del contratista para
        desarrollar actividades directamente relacionadas con objeto del contrato, este será informado por parte
        del supervisor a fin que se adelanten las gestiones necesarias para facilitar su desplazamiento, bien
        sea dentro del territorio nacional o fuera de este, de conformidad con lo establecido en la resolución
        que para el efecto se encuentre vigente. <b>B) OBLIGACIONES DEL SENA:</b> Además de las obligaciones y
        estipulaciones señaladas en las Leyes 80 de 1993 y 1150 de 2007, así como las que se deriven del Decreto
        1082 de 2015, el SENA se obliga a: 1. Verificar previo a la suscripción del presente contrato los
        documentos requeridos para la contratación. 2. Pagar al (la) CONTRATISTA los honorarios, en la forma
        estipulada en este contrato. 3. Prestar la mayor colaboración necesaria al (la) CONTRATISTA para la
        correcta ejecución del objeto contratado. 4. Poner a disposición del (la) CONTRATISTA la información
        y/o documentación que requiera para la cabal ejecución del contrato. <b>CLÁUSULA QUINTA.-
            <span class="subraya">Garantía Única.</span></b>  El (La) CONTRATISTA se obliga a constituir a favor
        del SENA una garantía en una de las modalidades señaladas por el Decreto 1082 de 2015, para amparar
        el contrato, en las condiciones que establecen esas normas o las que las modifiquen, así:
        <b>Cumplimiento de las obligaciones surgidas del contrato estatal:</b> por un valor equivalente al 10%
        del valor total del mismo y con una vigencia igual a su plazo de ejecución y cuatro (4) meses más contados
        a partir de la expedición de la misma. Esta garantía ampara entre otros, los riesgos de que trata el
        artículo 2.2.1.2.3.1.7 del Decreto 1082 de 2015. <b>PARAGRAFO.</b> Cuando se presente uno de los eventos de
        incumplimiento cubierto por la garantía, la entidad procederá a hacerla efectiva en los términos y con
        el procedimiento señalados por las normas vigentes. (Si del análisis de riesgos se evidencia la necesidad
        de amparar el contrato con otra garantía estas se deberán establecer en los estudios previos) <b>CLÁUSULA SEXTA.-
        <span class="subraya">Imputación Presupuestal:</span></b> El valor de los honorarios del presente Contrato
        se hará con cargo al Certificado de Disponibilidad Presupuestal No. {{ $contract->CDP }} de 2017, expedido
        por el Grupo de Administrativo y Financiero Intercentros de la Regional Cauca del SENA. <b>CLÁUSULA SEPTIMA.-
        <span class="subraya">Supervisión:</span></b> El control y vigilancia del cabal cumplimiento y la completa y adecuada ejecución de este
        contrato y de cada una de sus obligaciones, así como de la calidad de los servicios prestados, estará a
        cargo del (la) {{ mb_convert_case($supervisor->cargo, MB_CASE_LOWER, "UTF-8") }} del Centro de Teleinformática
        y Producción Industrial de la Regional Cauca del SENA o de quien designe por escrito el subdirector
        del Centro de Formación del Servicio Nacional de Aprendizaje SENA, el Supervisor del Contrato además
        de velar por el cumplimiento de lo establecido en el artículo 4º de la Ley 80 de 1993, la Ley 1150 de 2007,
        los artículos 44, 83, 84, 86 y 118 de la Ley 1474 de 2011 (anticorrupción), debe cumplir las funciones
        señaladas en la Resolución No. 202 de 2014 ( manual de interventoría y supervisión)  o la que la modifique
        o remplace, así como las demás que surjan  por la naturaleza de este contrato, cuando se requiera cambio
        de supervisor deberá realizar el procedimiento señalado en el manual. <b>CLÁUSULA OCTAVA.-
            <span class="subraya">Multas y cláusula penal pecuniaria:</span></b> El incumplimiento de las
        obligaciones del contrato serán sancionados pecuniariamente de conformidad con las siguientes estipulaciones:
        1) En caso de que haya lugar a la declaratoria de incumplimiento o caducidad del contrato, el SENA podrá
        exigirle al (la) CONTRATISTA a título de tasación anticipada de perjuicios, una suma equivalente al diez
        por ciento (10%) del valor total del Contrato, lo cual no lo exime del pago de los perjuicios causados en
        exceso de dicha tasación. 2) Si el incumplimiento es parcial por parte de él (la) CONTRATISTA, sin
        que dé lugar a la declaratoria del siniestro de incumplimiento o la de caducidad, éste reconocerá y pagará
        al SENA, una multa equivalente al 0,5% del valor del Contrato por cada día de retardo en el cumplimiento
        de la respectiva obligación, sin superar el diez (10%) del valor del contrato.  <b>PARAGRAFO  PRIMERO:</b>
        En la aplicación de la cláusula penal y de las multas se tendrá en cuenta el principio de proporcionalidad
        y se dará previamente cumplimiento al debido proceso, de conformidad con los artículos 17 de la ley 1150 de
        2007 y 86 de la Ley 1474 de 2011 (anticorrupción) y a lo previsto en el artículo 2.2.1.2.3.1.19  de
        Decreto 1082 de 2015. <b>PARAGRAFO SEGUNDO:</b> En caso de que el (la) CONTRATISTA no pague el valor de la
        cláusula penal o de la multa dentro del término indicado en el acto administrativo correspondiente, el SENA
        hará efectivo su pago a través de la póliza de cumplimiento del contrato o la deducirá de cualquier
        cantidad que adeude al (la) CONTRATISTA, quien autoriza esta deducción expresamente con la firma de este
        contrato.  <b>CLÁUSULA NOVENA. -<span class="subraya">Caducidad:</span></b> Se adoptará esta medida de
        conformidad con lo previsto en el artículo 18 de la Ley 80 de 1993 y por las causales señaladas en esa
        Ley y en las demás normas vigentes. <b>CLÁUSULA DECIMA.- <span class="subraya">Interpretación, Modificación
                y terminación:</span></b> Son aplicables al presente contrato la terminación, modificación e
        interpretación unilateral, en los términos establecidos en la ley 80 de 1993 y demás normas vigentes.
        <b>CLÁUSULA DECIMA PRIMERA.- <span class="subraya">Terminación anticipada del contrato por mutuo acuerdo:</span></b>
        En cualquier momento, durante la vigencia del presente contrato, las partes podrán darlo por terminado
        anticipadamente de mutuo acuerdo, que constará por escrito en un acta suscrita por las partes, en la cual se
        indicará expresamente la fecha a partir de la cual acuerdan dar por terminado el contrato.
        <b>CLÁUSULA DECIMA SEGUNDA.- <span class="subraya">Cesión del Contrato:</span></b> El (la) CONTRATISTA
        no podrá ceder total ni parcialmente el presente contrato a otra persona natural o jurídica, salvo autorización
        previa y expresa del SENA. <b> CLÁUSULA DECIMA TERCERA.- <span class="subraya">Perfeccionamiento, Ejecución:</span></b>
        El presente contrato se entiende perfeccionado con la firma de las partes contratantes. Para su ejecución, el
        Registro Presupuestal correspondiente por parte del SENA, la constitución de la Garantía Única por parte del
        (la) CONTRATISTA y la aprobación de la misma por parte del SENA.  <b>CLÁUSULA DECIMA CUARTA.-
            <span class="subraya">Inhabilidades e Incompatibilidades, Conflicto de Intereses e Impedimentos:</span></b>
        El(la) CONTRATISTA declara bajo la gravedad del juramento que se entiende surtido con la firma de este contrato,
        que no se halla incurso(a) en ninguna de las causales de inhabilidad o incompatibilidad, conflicto de
        intereses o impedimento, señaladas en la Constitución, la Ley o la normatividad vigente; declara igualmente
        que se encuentra a paz y salvo con el Tesoro Nacional y con el SENA, o que adeudándole no han vencido los
        términos para su pago y que no es deudor del Estado, o que si es deudor ha suscrito acuerdo de pago vigente.
        <b>CLÁUSULA DÉCIMA QUINTA.- <span class="subraya">Suspensión:</span></b> El plazo de ejecución del presente
        contrato podrá ser suspendido excepcionalmente de manera temporal, en las siguientes circunstancias: 1.
        Por el mutuo acuerdo de las partes. 2. Fuerza mayor o caso fortuito, por causas debidamente justificadas,
        previa solicitud del (la) CONTRATISTA. La suspensión se hará mediante acta suscrita por las partes en la
        cual se expresará su causa, el término de la suspensión y la fecha en que se reanuda la ejecución del contrato.
        <b>PARAGRAFO:</b> En caso de suspensión el (la) CONTRATISTA se obliga a informar tal evento al Asegurador y a
        ampliar las garantías, proporcionalmente al término que dure la misma. <b>CLAÚSULA DECIMA SEXTA: -
            <span class="subraya">Ausencia de relación laboral:</span></b> Las partes dejan constancia expresa
        que el presente contrato se suscribe en el marco del artículo 32 – numeral 3 de la Ley 80 de 1993 y demás
        normas concordantes y complementarias, por lo cual declaran que no conlleva relación laboral ni prestaciones
        sociales; su ejecución se hará sin subordinación alguna, gozando el contratista de independencia en la
        preparación y ejecución del contrato. <b>CLÁUSULA DECIMA SEPTIMA- <span class="subraya">Liquidación del
                contrato:</span></b> De conformidad con el artículo 217 del Decreto Ley 19 de 2012, que modificó
        el artículo 60 de la Ley 80 de 1993, no será liquidado el presente contrato cuando el Supervisor del mismo
        certifique a su finalización que el objeto y todas las obligaciones del contrato fueron cumplidas a satisfacción
        por el Contratista y que a éste se le canceló el valor total de los honorarios pactados. En caso contrario, o
        cuando el contratista presente reclamación que impida considerar que las partes han terminado el contrato
        a paz y salvo, el presente contrato será liquidado de mutuo acuerdo entre las partes, dentro de los
        cuatro (4) meses siguientes a la fecha de su terminación por cualquier causa; en el evento de que las partes
        no lleguen a un acuerdo, el SENA procederá a liquidarlo unilateralmente en las condiciones y términos
        establecidos en los artículos 60 de la Ley 80 de 1993 y 11 de la ley 1150 de 2007.
        <b>CLÁUSULA DECIMA OCTAVA.- <span class="subraya">Seguridad de la información y confidencialidad:</span></b>
        EL CONTRATISTA se obliga a conocer y aplicar la política y los lineamientos de Seguridad de la Información
        y Gestión de los activos de la Información que le entregue el SENA. Así mismo, EL CONTRATISTA se obliga
        a no revelar, durante la vigencia del este contrato, ni dentro de los dos (2) años siguientes a su
        expiración, la información confidencial de propiedad del SENA, de la que el CONTRATISTA tenga conocimiento
        con ocasión o para la ejecución de este contrato, sin el previo consentimiento escrito  del  mismo.
        Se considera información confidencial cualquier información técnica, financiera, comercial, estratégica y,
        en general, cualquier información relacionada con las funciones, programas, planes, proyectos y/o
        actividades del SENA. <b>CLÁUSULA DECIMA NOVENA:- <span class="subraya">Domicilio:</span></b> Para todos
        los efectos  legales  y   fiscales, las partes  fijan como domicilio contractual la ciudad de Popayán Cauca
        y para efectos de notificación se entenderá como domicilio del CONTRATISTA la dirección de residencia
        y teléfono, los datos reportados y validados en el aplicativo SIGEP. <b>CLÁUSULA VIGÉSIMA:
            <span class="subraya">Lugar de Ejecución:</span></b> El lugar de ejecución del presente contrato será en
        la ciudad de Popayán del Departamento del Cauca donde se programe o designe.

        <br>
        <br>

        <p>
            Se firma el presente contrato en la ciudad de Popayán Cauca, el ___________________________________
        </p>
        <br>
        <p>
        <div class="col-6">
            <b>POR EL SENA</b> <br>
            <br>
            <br>
            <br>
            <br>
            <b>EDIER ORLANDO BOLAÑOS HOYOS</b> <br>
            C. C. 10.541.127. <br>
            Subdirector Centro de Teleinformática y <br>
            Producción Industrial <br>
            SENA Regional Cauca


        </div>
        <div class="col-6">
            <b>EL (LA) CONTRATISTA</b> <br>
            <br>
            <br>
            <br>
            <br>
            <b>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }} </b><br>
            @if($employee->document_type == "C.C.")
                C.C.
            @elseif($employee->document_type == "C.E.")
                C.E.
            @else
                T.I.
            @endif
            No. {{ number_format($employee->document_number, 0, ',', '.') }}

        </div>
        </p>
        <br>
        <br>
        <br>
        <p style="font-size: 11px; color: #92908E">
            CDP: {{ $contract->CDP }} <br>
            Valor: ${{ number_format($contract->value, 0, ',', '.')}} <br>
            <br>
            Proyecto: Carmen Elena Ruiz Apoyo Jurídico <br>
            Reviso: Marcela Ausecha Apoyo a la Supervisión de Contratos <br>

        </p>



    </div>


</body>
</html>

<?php
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
