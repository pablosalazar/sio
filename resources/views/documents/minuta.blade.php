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
            CONTRATO DE PRESTACI??N DE SERVICIOS No. <span class="espacio">XXXXXX</span> DE 2017, SUSCRITO ENTRE EL SERVICIO NACIONAL DE
            APRENDIZAJE ??? SENA Y {{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}
        </p>
    </div>
    <div id="footer">
        <p class="page">P??gina <span class="pagenum"></span></p>
        <p class="formato">GTH-F-077 V.06</p>

    </div>
    <div class="documento">
        Entre los suscritos, <b>EDIER ORLANDO BOLA??OS HOYOS</b>, domiciliado en la ciudad de Popay??n-Cauca, identificado con la
        C. de C. 10.541.127, actuando en nombre y representaci??n del SENA en su calidad de SUBDIRECTOR DEL CENTRO DE
        TELEINFORM??TICA Y PRODUCCI??N INDUSTRIAL  y representante legal del mismo ostentando la ordenaci??n del gasto,
        debidamente acreditado y autorizado, cargo en el que fue nombrado mediante Resoluci??n 470 del 2016, y del cual
        tomo posesi??n con el Acta 038 de 2016, actuando en nombre y representaci??n del <b>SERVICIO NACIONAL DE APRENDIZAJE -
            SENA</b>, Establecimiento P??blico del orden nacional adscrito al Ministerio del Trabajo, en virtud de la delegaci??n de
        funciones otorgada en la Resoluci??n 2331 de 2013 o la que la modifique, que en adelante se denomina <b>EL SENA</b>, y
        de otra parte <b>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}</b>, identificado(a) con la
        @if($employee->document_type == "C.C.")
            C. de C.
        @elseif($employee->document_type == "C.E.")
            C. de E.
        @else
            T. de I.
        @endif
        No. {{ number_format($employee->document_number, 0, ',', '.') }}, persona natural que en adelante se denomina
        el (la) <b>CONTRATISTA</b>, hemos convenido celebrar el presente Contrato de Prestaci??n de Servicios Personales que se
        regir?? por la Ley 80 de 1993, la Ley 1150 de 2007 y el Decreto 1082 de 2015 en su parte pertinente, previas las
        siguientes <b>CONSIDERACIONES: 1.</b> Que el numeral 3 del art??culo 32 de la Ley 80 de 1993, se??ala que el contrato de
        prestaci??n de servicios personales no genera relaci??n laboral ni prestaciones sociales, no tiene subordinaci??n y
        se celebrar?? por el t??rmino estrictamente indispensable; por su parte, el literal h) del numeral 4 del art??culo 2??
        de la Ley 1150 de 2007, dispone que los contratos para la prestaci??n de servicios profesionales y de apoyo a la
        gesti??n, se tramitan por la modalidad de contrataci??n directa, en tanto que el art??culo 2.2.1.2.1.4.9 del Decreto
        1082 de 2015, establece que <span class="italica">???Las entidades estatales pueden contratar bajo la modalidad de contrataci??n directa
        la prestaci??n de servicios profesionales y de apoyo a la gesti??n con la persona natural o jur??dica que est?? en
        capacidad de ejecutar el objeto del contrato, siempre y cuando la entidad estatal verifique la idoneidad o
        experiencia requerida y relacionada con el ??rea de que se trate. En este caso, no es necesario que la entidad
        estatal haya obtenido previamente varias ofertas, de lo cual el ordenador del gasto debe dejar constancia escrita.
        // Los servicios profesionales y de apoyo a la gesti??n corresponden a aquellos de naturaleza intelectual diferentes
        a los de consultor??a que se derivan del cumplimiento de las funciones de la entidad estatal, as?? como los
        relacionados con actividades operativas, log??sticas, o asistenciales. //La entidad estatal, para la contrataci??n
        de trabajos art??sticos que solamente puedan encomendarse a determinadas personas naturales, debe justificar
        esta situaci??n en los estudios y documentos previos???</span>. <b>2.</b> Que la subdirecci??n del Centro Teleinform??tica
        y Producci??n Industrial del SENA adelant?? los tr??mites normativos legales y reglamentarios, y elabor?? los
        documentos y estudios previos exigidos normativamente. <b>3.</b> Que se encuentra certificada la inexistencia
        de personal en la planta. <b>4.</b> Que se encuentra autorizada la presente contrataci??n por tratarse de
        objetos iguales. <b>5.</b> Que se suscribi?? el estudio previo para determinar y justificar la necesidad y
        oportunidad del presente contrato, quedando sustentada y evidenciada la necesidad de contratar los
        servicios personales se??alados en el objeto. <b>6.</b> Que la subdirecci??n de centro, como ordenador del gasto,
        deja constancia que la persona natural contratada cuenta con la  capacidad, idoneidad y/o experiencia
        requerida y relacionada con el ??rea de qu?? trata el contrato, sin que sea necesario haber obtenido
        previamente varias ofertas. <b>7.</b> Que de conformidad con lo anterior, las partes acuerdan las siguientes
        <b>CL??USULAS: CL??USULA PRIMERA.- Objeto:</b> {{ $contract->object }}. <b>CL??USULA SEGUNDA.-Plazo:</b> hasta el
        31 de Diciembre de 2017 sin exceder la presente vigencia presupuestal y empezara a contarse a partir del
        cumplimientos de los requisitos de perfeccionamiento y ejecuci??n indicados en este contrato, <b>CL??USULA  TERCERA.
        - <span class="subraya">Valor y Forma de Pago:</span></b> El valor total del presente contrato es de
        {{ numtoletras($contract->value) }} (${{ number_format($contract->value, 0, ',', '.') }}) incluido IVA
        (de conformidad con el r??gimen tributario a que pertenezca el contratista). Esta suma ser?? pagada por el
        SENA al contratista de la siguiente manera: {{ $contract->payment_method }} Los honorarios ser??n pagados por
        el SENA al contratista, conforme a la disponibilidad de recursos y de acuerdo al cronograma definido
        por la Direcci??n Administrativa y Financiera de la Direcci??n General, en la cuenta ahorros No. {{ $contract->account_number }}
        del Banco {{ $contract->bank }}, cuyo titular es el (la) Contratista; <b>PARAGRAFO PRIMERO:</b> El cambio de cuenta
        por parte del contratista deber?? ser informada al supervisor del contrato con el fin de surtir los tr??mites
        pertinentes.  <b>PARAGRAFO SEGUNDO:</b> Para   que   el   SENA   pueda   adelantar   los tr??mites administrativos
        para el pago, el (la) Contratista debe acreditar previamente el cumplimiento de los requisitos de pago, tales
        como la certificaci??n expedida por el supervisor del contrato, en la que acredite el cumplimiento a entera
        satisfacci??n del objeto y obligaciones del contrato en el respectivo periodo y la certificaci??n de aportes
        al sistema general de Salud, Pensi??n y Riesgos Profesionales, as?? como los  dem??s documentos necesarios
        para el pago <b>CL??USULA CUARTA.- <span class="subraya">Obligaciones de las partes:</span> A) OBLIGACIONES DEL ?? DE LA CONTRATISTA:</b> El
        (la) CONTRATISTA, adem??s de las obligaciones que por su ??ndole y la naturaleza del contrato de prestaci??n de
        servicios le son propias, se obliga para con EL SENA: <b>OBLIGACIONES ESPEC??FICAS:</b> XXXXXXXXXXX.
        <b>OBLIGACIONES GENERALES. 1.</b> En cumplimiento de lo dispuesto en el par??grafo 1?? del art??culo 23 de la ley
        1150 de 2007 y del art??culo 6 de la ley 1562 de 2012, el (la) CONTRATISTA deber?? acreditar que se encuentra
        al d??a en el pago mensual de los aportes al sistema de seguridad social integral (salud, pensi??n y riesgos
        laborales) y para la realizaci??n de cada pago derivado del mismo; estos pagos se acreditan ??nicamente por
        el sistema PILA o de Planilla Asistida o el que determine el Ministerio de Trabajo. Cuando corresponda,
        el (la) contratista tambi??n debe acreditar el pago oportuno de los aportes al SENA, ICBF y cajas de
        Compensaci??n Familiar (cuando corresponda) <b>2.</b> El contratista debe cumplir con las normas del Sistema
        General de Riesgos Laborales, en especial, las siguientes: a. Procurar el cuidado integral de su salud. b.
        El contratista informar?? al SENA la ARL a la cual desea afiliarse, para lo cual cada Centro de Formaci??n,
        Direcci??n Regional y Direcci??n General (seg??n corresponda) establecer??n los procedimientos para afiliaci??n
        a la ARL seleccionada por el contratista e informar?? por escrito la fecha a partir de la cual qued?? afiliado
        al sistema de riesgos laborales. (Art. 4 Decreto 723 de 2013). c. El pago de los aportes al sistema de
        riesgos laborales se realizar?? de acuerdo a la clase de actividad establecida en el objeto y obligaciones
        del contratista en los t??rminos establecidos en el Decreto 1607 de 2002. (Ley 1562 de 2012 y Decreto 1530
        de 1996). d. Los Elementos de Protecci??n Personal que requiera el contratista para la ejecuci??n del objeto
        del mismo correr??n por su cuenta y antes de iniciar la ejecuci??n el Supervisor le informar?? por escrito
        la clase y cantidad de elementos que se requieren y verificar?? sus condiciones de acuerdo con el tipo de
        riesgo a que est?? expuesto. (Decreto 723 de 2013, art. 16 numeral 2). e. Ex??menes m??dicos preocupacionales.
        El contratista deber?? hacer entrega del examen m??dico preocupacional al Grupo de Seguridad y Salud en el
        Trabajo de la Direcci??n General y/o sus hom??logos en los Centros de Formaci??n y Direcciones Regionales de
        acuerdo con el profesiograma y el objeto a desarrollar y dentro de los plazos establecidos legalmente.
        (Decreto 723 de 2013 art. 18) f. El contratista se compromete a cumplir  a cabalidad con las normas,
        reglamentos y  la pol??tica de seguridad y salud en el trabajo establecida por la entidad al igual
        que suministrar informaci??n clara, veraz y completa sobre su estado de salud e informar  oportunamente
        al SENA acerca de los peligros y riesgos latentes en la ejecuci??n contractual. (Decreto 1443 de 2014 arts.
        5 y 10). g. Informar a los contratantes la ocurrencia de incidentes, accidentes de trabajo y enfermedades
        laborales. h. Participar en las actividades de Prevenci??n y Promoci??n organizadas por los contratantes,
        los Comit??s Paritarios de Seguridad y Salud en el Trabajo o Vig??as Ocupacionales o la Administradora
        de Riesgos Laborales. i. Informar oportunamente a los contratantes toda novedad derivada del contrato.
        <b>3.</b> vigilar y salvaguardar los bienes que hagan parte del patrimonio del SENA o de  otras entidades
        o  de particulares puestos al servicio de la entidad, y que le hayan sido entregados para el desarrollo
        del objeto del contrato, por lo que son sujetos de control y vigilancia. En consecuencia deber??n dar cuenta
        sobre la entrega de los bienes al supervisor y/o interventor del contrato respectivo y a los ??rganos de
        control fiscal y disciplinario, de ser procedente. <b>4.</b> El contratista deber?? ejecutar su contrato
        conforme al Sistema Integrado de Gesti??n y Autocontrol ???SIGA??? del SENA el cual se encuentra documentado en la
        plataforma Compromiso. <b>5.</b> Las dem??s necesarias para el cabal cumplimiento del objeto contractual.
        <b>PARAGRAFO PRIMERO:</b> Con la suscripci??n de este contrato, el SENA queda autorizado expresamente por el
        (la) Contratista para verificar sus antecedentes judiciales y la informaci??n que considere necesaria
        en los Sistemas de Informaci??n correspondientes, con el uso y las condiciones se??aladas en las normas
        vigentes. <b>PARAGRAFO SEGUNDO:</b> Los derechos patrimoniales de autor de todos los documentos y desarrollos
        que produzca o realice el (la) CONTRATISTA en virtud de la ejecuci??n del presente contrato, ser??n de
        propiedad del SENA; Si hay lugar a publicaciones se dar?? el respectivo reconocimiento de los derechos
        morales de autor. <b>PARAGRAFO TERCERO:</b> En caso de requerirse el desplazamiento del contratista para
        desarrollar actividades directamente relacionadas con objeto del contrato, este ser?? informado por parte
        del supervisor a fin que se adelanten las gestiones necesarias para facilitar su desplazamiento, bien
        sea dentro del territorio nacional o fuera de este, de conformidad con lo establecido en la resoluci??n
        que para el efecto se encuentre vigente. <b>B) OBLIGACIONES DEL SENA:</b> Adem??s de las obligaciones y
        estipulaciones se??aladas en las Leyes 80 de 1993 y 1150 de 2007, as?? como las que se deriven del Decreto
        1082 de 2015, el SENA se obliga a: 1. Verificar previo a la suscripci??n del presente contrato los
        documentos requeridos para la contrataci??n. 2. Pagar al (la) CONTRATISTA los honorarios, en la forma
        estipulada en este contrato. 3. Prestar la mayor colaboraci??n necesaria al (la) CONTRATISTA para la
        correcta ejecuci??n del objeto contratado. 4. Poner a disposici??n del (la) CONTRATISTA la informaci??n
        y/o documentaci??n que requiera para la cabal ejecuci??n del contrato. <b>CL??USULA QUINTA.-
            <span class="subraya">Garant??a ??nica.</span></b>  El (La) CONTRATISTA se obliga a constituir a favor
        del SENA una garant??a en una de las modalidades se??aladas por el Decreto 1082 de 2015, para amparar
        el contrato, en las condiciones que establecen esas normas o las que las modifiquen, as??:
        <b>Cumplimiento de las obligaciones surgidas del contrato estatal:</b> por un valor equivalente al 10%
        del valor total del mismo y con una vigencia igual a su plazo de ejecuci??n y cuatro (4) meses m??s contados
        a partir de la expedici??n de la misma. Esta garant??a ampara entre otros, los riesgos de que trata el
        art??culo 2.2.1.2.3.1.7 del Decreto 1082 de 2015. <b>PARAGRAFO.</b> Cuando se presente uno de los eventos de
        incumplimiento cubierto por la garant??a, la entidad proceder?? a hacerla efectiva en los t??rminos y con
        el procedimiento se??alados por las normas vigentes. (Si del an??lisis de riesgos se evidencia la necesidad
        de amparar el contrato con otra garant??a estas se deber??n establecer en los estudios previos) <b>CL??USULA SEXTA.-
        <span class="subraya">Imputaci??n Presupuestal:</span></b> El valor de los honorarios del presente Contrato
        se har?? con cargo al Certificado de Disponibilidad Presupuestal No. {{ $contract->CDP }} de 2017, expedido
        por el Grupo de Administrativo y Financiero Intercentros de la Regional Cauca del SENA. <b>CL??USULA SEPTIMA.-
        <span class="subraya">Supervisi??n:</span></b> El control y vigilancia del cabal cumplimiento y la completa y adecuada ejecuci??n de este
        contrato y de cada una de sus obligaciones, as?? como de la calidad de los servicios prestados, estar?? a
        cargo del (la) {{ mb_convert_case($supervisor->cargo, MB_CASE_LOWER, "UTF-8") }} del Centro de Teleinform??tica
        y Producci??n Industrial de la Regional Cauca del SENA o de quien designe por escrito el subdirector
        del Centro de Formaci??n del Servicio Nacional de Aprendizaje SENA, el Supervisor del Contrato adem??s
        de velar por el cumplimiento de lo establecido en el art??culo 4?? de la Ley 80 de 1993, la Ley 1150 de 2007,
        los art??culos 44, 83, 84, 86 y 118 de la Ley 1474 de 2011 (anticorrupci??n), debe cumplir las funciones
        se??aladas en la Resoluci??n No. 202 de 2014 ( manual de interventor??a y supervisi??n)  o la que la modifique
        o remplace, as?? como las dem??s que surjan  por la naturaleza de este contrato, cuando se requiera cambio
        de supervisor deber?? realizar el procedimiento se??alado en el manual. <b>CL??USULA OCTAVA.-
            <span class="subraya">Multas y cl??usula penal pecuniaria:</span></b> El incumplimiento de las
        obligaciones del contrato ser??n sancionados pecuniariamente de conformidad con las siguientes estipulaciones:
        1) En caso de que haya lugar a la declaratoria de incumplimiento o caducidad del contrato, el SENA podr??
        exigirle al (la) CONTRATISTA a t??tulo de tasaci??n anticipada de perjuicios, una suma equivalente al diez
        por ciento (10%) del valor total del Contrato, lo cual no lo exime del pago de los perjuicios causados en
        exceso de dicha tasaci??n. 2) Si el incumplimiento es parcial por parte de ??l (la) CONTRATISTA, sin
        que d?? lugar a la declaratoria del siniestro de incumplimiento o la de caducidad, ??ste reconocer?? y pagar??
        al SENA, una multa equivalente al 0,5% del valor del Contrato por cada d??a de retardo en el cumplimiento
        de la respectiva obligaci??n, sin superar el diez (10%) del valor del contrato.  <b>PARAGRAFO  PRIMERO:</b>
        En la aplicaci??n de la cl??usula penal y de las multas se tendr?? en cuenta el principio de proporcionalidad
        y se dar?? previamente cumplimiento al debido proceso, de conformidad con los art??culos 17 de la ley 1150 de
        2007 y 86 de la Ley 1474 de 2011 (anticorrupci??n) y a lo previsto en el art??culo 2.2.1.2.3.1.19  de
        Decreto 1082 de 2015. <b>PARAGRAFO SEGUNDO:</b> En caso de que el (la) CONTRATISTA no pague el valor de la
        cl??usula penal o de la multa dentro del t??rmino indicado en el acto administrativo correspondiente, el SENA
        har?? efectivo su pago a trav??s de la p??liza de cumplimiento del contrato o la deducir?? de cualquier
        cantidad que adeude al (la) CONTRATISTA, quien autoriza esta deducci??n expresamente con la firma de este
        contrato.  <b>CL??USULA NOVENA. -<span class="subraya">Caducidad:</span></b> Se adoptar?? esta medida de
        conformidad con lo previsto en el art??culo 18 de la Ley 80 de 1993 y por las causales se??aladas en esa
        Ley y en las dem??s normas vigentes. <b>CL??USULA DECIMA.- <span class="subraya">Interpretaci??n, Modificaci??n
                y terminaci??n:</span></b> Son aplicables al presente contrato la terminaci??n, modificaci??n e
        interpretaci??n unilateral, en los t??rminos establecidos en la ley 80 de 1993 y dem??s normas vigentes.
        <b>CL??USULA DECIMA PRIMERA.- <span class="subraya">Terminaci??n anticipada del contrato por mutuo acuerdo:</span></b>
        En cualquier momento, durante la vigencia del presente contrato, las partes podr??n darlo por terminado
        anticipadamente de mutuo acuerdo, que constar?? por escrito en un acta suscrita por las partes, en la cual se
        indicar?? expresamente la fecha a partir de la cual acuerdan dar por terminado el contrato.
        <b>CL??USULA DECIMA SEGUNDA.- <span class="subraya">Cesi??n del Contrato:</span></b> El (la) CONTRATISTA
        no podr?? ceder total ni parcialmente el presente contrato a otra persona natural o jur??dica, salvo autorizaci??n
        previa y expresa del SENA. <b> CL??USULA DECIMA TERCERA.- <span class="subraya">Perfeccionamiento, Ejecuci??n:</span></b>
        El presente contrato se entiende perfeccionado con la firma de las partes contratantes. Para su ejecuci??n, el
        Registro Presupuestal correspondiente por parte del SENA, la constituci??n de la Garant??a ??nica por parte del
        (la) CONTRATISTA y la aprobaci??n de la misma por parte del SENA.  <b>CL??USULA DECIMA CUARTA.-
            <span class="subraya">Inhabilidades e Incompatibilidades, Conflicto de Intereses e Impedimentos:</span></b>
        El(la) CONTRATISTA declara bajo la gravedad del juramento que se entiende surtido con la firma de este contrato,
        que no se halla incurso(a) en ninguna de las causales de inhabilidad o incompatibilidad, conflicto de
        intereses o impedimento, se??aladas en la Constituci??n, la Ley o la normatividad vigente; declara igualmente
        que se encuentra a paz y salvo con el Tesoro Nacional y con el SENA, o que adeud??ndole no han vencido los
        t??rminos para su pago y que no es deudor del Estado, o que si es deudor ha suscrito acuerdo de pago vigente.
        <b>CL??USULA D??CIMA QUINTA.- <span class="subraya">Suspensi??n:</span></b> El plazo de ejecuci??n del presente
        contrato podr?? ser suspendido excepcionalmente de manera temporal, en las siguientes circunstancias: 1.
        Por el mutuo acuerdo de las partes. 2. Fuerza mayor o caso fortuito, por causas debidamente justificadas,
        previa solicitud del (la) CONTRATISTA. La suspensi??n se har?? mediante acta suscrita por las partes en la
        cual se expresar?? su causa, el t??rmino de la suspensi??n y la fecha en que se reanuda la ejecuci??n del contrato.
        <b>PARAGRAFO:</b> En caso de suspensi??n el (la) CONTRATISTA se obliga a informar tal evento al Asegurador y a
        ampliar las garant??as, proporcionalmente al t??rmino que dure la misma. <b>CLA??SULA DECIMA SEXTA: -
            <span class="subraya">Ausencia de relaci??n laboral:</span></b> Las partes dejan constancia expresa
        que el presente contrato se suscribe en el marco del art??culo 32 ??? numeral 3 de la Ley 80 de 1993 y dem??s
        normas concordantes y complementarias, por lo cual declaran que no conlleva relaci??n laboral ni prestaciones
        sociales; su ejecuci??n se har?? sin subordinaci??n alguna, gozando el contratista de independencia en la
        preparaci??n y ejecuci??n del contrato. <b>CL??USULA DECIMA SEPTIMA- <span class="subraya">Liquidaci??n del
                contrato:</span></b> De conformidad con el art??culo 217 del Decreto Ley 19 de 2012, que modific??
        el art??culo 60 de la Ley 80 de 1993, no ser?? liquidado el presente contrato cuando el Supervisor del mismo
        certifique a su finalizaci??n que el objeto y todas las obligaciones del contrato fueron cumplidas a satisfacci??n
        por el Contratista y que a ??ste se le cancel?? el valor total de los honorarios pactados. En caso contrario, o
        cuando el contratista presente reclamaci??n que impida considerar que las partes han terminado el contrato
        a paz y salvo, el presente contrato ser?? liquidado de mutuo acuerdo entre las partes, dentro de los
        cuatro (4) meses siguientes a la fecha de su terminaci??n por cualquier causa; en el evento de que las partes
        no lleguen a un acuerdo, el SENA proceder?? a liquidarlo unilateralmente en las condiciones y t??rminos
        establecidos en los art??culos 60 de la Ley 80 de 1993 y 11 de la ley 1150 de 2007.
        <b>CL??USULA DECIMA OCTAVA.- <span class="subraya">Seguridad de la informaci??n y confidencialidad:</span></b>
        EL CONTRATISTA se obliga a conocer y aplicar la pol??tica y los lineamientos de Seguridad de la Informaci??n
        y Gesti??n de los activos de la Informaci??n que le entregue el SENA. As?? mismo, EL CONTRATISTA se obliga
        a no revelar, durante la vigencia del este contrato, ni dentro de los dos (2) a??os siguientes a su
        expiraci??n, la informaci??n confidencial de propiedad del SENA, de la que el CONTRATISTA tenga conocimiento
        con ocasi??n o para la ejecuci??n de este contrato, sin el previo consentimiento escrito  del  mismo.
        Se considera informaci??n confidencial cualquier informaci??n t??cnica, financiera, comercial, estrat??gica y,
        en general, cualquier informaci??n relacionada con las funciones, programas, planes, proyectos y/o
        actividades del SENA. <b>CL??USULA DECIMA NOVENA:- <span class="subraya">Domicilio:</span></b> Para todos
        los efectos  legales  y   fiscales, las partes  fijan como domicilio contractual la ciudad de Popay??n Cauca
        y para efectos de notificaci??n se entender?? como domicilio del CONTRATISTA la direcci??n de residencia
        y tel??fono, los datos reportados y validados en el aplicativo SIGEP. <b>CL??USULA VIG??SIMA:
            <span class="subraya">Lugar de Ejecuci??n:</span></b> El lugar de ejecuci??n del presente contrato ser?? en
        la ciudad de Popay??n del Departamento del Cauca donde se programe o designe.

        <br>
        <br>

        <p>
            Se firma el presente contrato en la ciudad de Popay??n Cauca, el ___________________________________
        </p>
        <br>
        <p>
        <div class="col-6">
            <b>POR EL SENA</b> <br>
            <br>
            <br>
            <br>
            <br>
            <b>EDIER ORLANDO BOLA??OS HOYOS</b> <br>
            C. C. 10.541.127. <br>
            Subdirector Centro de Teleinform??tica y <br>
            Producci??n Industrial <br>
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
            Proyecto: Carmen Elena Ruiz Apoyo Jur??dico <br>
            Reviso: Marcela Ausecha Apoyo a la Supervisi??n de Contratos <br>

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
            $xlimite = 6; // inicializo el contador de centenas xi y establezco el l??mite a 6 d??gitos en la parte entera
            $xexit = true; // bandera para controlar el ciclo del While
            while ($xexit) {
                if ($xi == $xlimite) { // si ya lleg?? al l??mite m??ximo de enteros
                    break; // termina el ciclo
                }

                $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
                $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres d??gitos)
                for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                    switch ($xy) {
                        case 1: // checa las centenas
                            if (substr($xaux, 0, 3) < 100) { // si el grupo de tres d??gitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                            } else {
                                $key = (int) substr($xaux, 0, 3);
                                if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es n??mero redondo (100, 200, 300, 400, etc..)
                                    $xseek = $xarray[$key];
                                    $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Mill??n, Millones, Mil o nada)
                                    if (substr($xaux, 0, 3) == 100)
                                        $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                    else
                                        $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                    $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                                }
                                else { // entra aqu?? si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                    $key = (int) substr($xaux, 0, 1) * 100;
                                    $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 0, 3) < 100)
                            break;
                        case 2: // checa las decenas (con la misma l??gica que las centenas)
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

            // ----------- esta l??nea la puedes cambiar de acuerdo a tus necesidades o a tu pa??s -------
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
            // ------------------      en este caso, para M??xico se usa esta leyenda     ----------------
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
    { // esta funci??n regresa un subfijo para la cifra
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
