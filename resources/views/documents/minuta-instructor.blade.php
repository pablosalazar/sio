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
            /*line-height: 1.3em;*/
            padding: 0 10px;
            font-size: 13px;
            padding-bottom: 40px;
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
            bottom: -25px;
            right: 0px;
            height: 65px;
            color: #92908E;
            padding: 0 15px;
            font-size: 12px !important;
        }
        #footer .formato, #footer .page {
            display: inline;
        }

        #footer .formato {
            position:absolute;
            bottom: 74px;
            right: 15px;
        }

        /*#footer .pagenum:before { content: counter(page) " de " counter(pages); }*/
        #footer .pagenum:before { content: counter(page)  " de 5" }

        .col-6 {
            width: 49%;
            float: left;

        }
    </style>
</head>
<body>
    <div class="cabecera">
        <img src="{{ asset('img/logo-minuta.jpg') }}" alt="Logo Sena" class="text-center">
        <p class="texto">
            CONTRATO DE PRESTACI??N DE SERVICIOS No. <span class="espacio">XXXXXX</span> DE 2018, SUSCRITO ENTRE EL SERVICIO NACIONAL DE
            APRENDIZAJE ??? SENA Y {{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}
        </p>
    </div>
    <div id="footer">
        <p class="page">P??gina <span class="pagenum"></span></p>
        <p class="formato">GTH-F-077 V.06</p>

    </div>
    
    <div class="documento">
        Entre los suscritos, <b>EDIER ORLANDO BOLA??OS HOYOS</b>, domiciliado en la ciudad de Popay??n-Cauca, identificado con la
        C.C. 10.541.127, actuando en nombre y representaci??n del SENA en su calidad de SUBDIRECTOR DEL CENTRO DE
        TELEINFORM??TICA Y PRODUCCI??N INDUSTRIAL  y representante legal del mismo ostentando la ordenaci??n del gasto,
        debidamente acreditado y autorizado, cargo en el que fue nombrado mediante Resoluci??n 470 del 2016, y del cual
        tomo posesi??n con el Acta 038 de 2016, actuando en nombre y representaci??n del <b>SERVICIO NACIONAL DE APRENDIZAJE -
            SENA</b>, Establecimiento P??blico del orden nacional adscrito al Ministerio del Trabajo, en virtud de la delegaci??n de
        funciones otorgada en la Resoluci??n 2331 de 2013 o la que la modifique, que en adelante se denomina <b>EL SENA</b>, y
        de otra parte <b>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}</b>, identificado(a) con la
        @if($employee->document_type == "C.C.")
            C.C.
        @elseif($employee->document_type == "C.E.")
            C.E.
        @else
            T.I.
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
        <b>CL??USULAS: CL??USULA PRIMERA.- Objeto:</b> {{ $contract->object }}. <b>CL??USULA SEGUNDA.-Plazo:</b> desde el
        {{ fecha_letras($contract->start_date) }} hasta el {{fecha_letras($contract->end_date)}} de 2018, sin exceder la presente vigencia presupuestal y empezar?? a contarse a partir del
        cumplimientos de los requisitos de perfeccionamiento y ejecuci??n indicados en este contrato, <b>CL??USULA  TERCERA.
        - <span class="subraya">Valor y Forma de Pago:</span></b> El valor total del presente contrato es de
        {{ numtoletras($contract->value) }} (${{ number_format($contract->value, 0, ',', '.') }}) incluido IVA
        (de conformidad con el r??gimen tributario a que pertenezca el contratista). Esta suma ser?? pagada por el
        SENA al contratista de la siguiente manera: {{ $contract->payment_method }} Los honorarios ser??n pagados por
        el SENA al contratista, conforme a la disponibilidad de recursos y de acuerdo al cronograma definido
        por la Direcci??n Administrativa y Financiera de la Direcci??n General, en la cuenta ahorros No. {{ $contract->account_number }}
        del Banco {{ $contract->bank }}, cuyo titular es el (la) Contratista; <b>PARAGRAFO PRIMERO:</b> El cambio de cuenta
        por parte del contratista deber?? ser informada al supervisor del contrato con el fin de surtir los tr??mites
        pertinentes. Para   que   el   SENA   pueda   adelantar   los tr??mites administrativos
        para el pago, el (la) Contratista debe acreditar previamente el cumplimiento de los requisitos de pago, tales
        como la certificaci??n expedida por el supervisor del contrato, en la que acredite el cumplimiento a entera
        satisfacci??n del objeto y obligaciones del contrato en el respectivo periodo y la cancelaci??n de los aportes a la seguridad social: Salud,
        Pensi??n y Riesgos Laborales, as?? como los  dem??s documentos necesarios para el pago.  <b>CL??USULA CUARTA.- <span class="subraya">Obligaciones de las partes:</span> A) OBLIGACIONES DEL ?? DE LA CONTRATISTA:</b> El
        (la) CONTRATISTA, adem??s de las obligaciones que por su ??ndole y la naturaleza del contrato de prestaci??n de
        servicios le son propias, se obliga para con EL SENA: <b>A.1. OBLIGACIONES ESPEC??FICAS:</b> 1. Adelantar
        las gestiones necesarias para la ejecuci??n del contrato en condiciones de eficiencia y calidad, de
        acuerdo a las especificaciones exigidas por el SENA y desglosadas en detalle en la minuta del contrato.
        2. Cumplir el objeto y alcance del contrato, de acuerdo con la programaci??n asignada por Coordinaci??n
        Acad??mica en el marco de las pol??ticas de calidad, pertinencia y eficacia. 3. Ejercer el control propio
        de todas las actividades encomendadas con independencia y autonom??a y de forma oportuna y dentro de los
        t??rminos establecidos con el fin de obtener la correcta realizaci??n del objeto del contrato. 4. Rendir
        informes acad??micos que contenga: juicios evaluativos, novedades de los aprendices (llamados de atenci??n
        verbales, inasistencia reiterada, resultado del plan de mejoramiento, actividades complementarias bien sean
        acad??micas y/o actitudinales); casos espec??ficos para el acompa??amiento de aprendices por bienestar o por
        coordinaci??n acad??mica y reporte de buenas pr??cticas o casos ??xitos por los aprendices. 5. Registrar los
        resultados de la emisi??n de juicios (criterios) de evaluaci??n relacionados con los logros de los resultados
        de aprendizaje o novedades del aprendiz, en los tiempos establecidos por el procedimiento de Ejecuci??n de
        la Formaci??n Profesional, en el aplicativo dispuesto por la Entidad. 6. Garantizar el autocontrol de la
        ejecuci??n de horas de formaci??n en el rango establecido por la entidad. En caso de no cumplir con el rango
        de ejecuci??n mensual establecido por la entidad, el pago se har?? proporcional y por el valor acorde al
        informe generado por la supervisi??n del contrato en el mes correspondiente. 7. Participar de conformidad
        con las normas institucionales en los comit??s de seguimiento y evaluaci??n de aprendices donde se requiera.
        8. Garantizar dentro de los primeros diez (10) d??as calendario de cada mes, el pago de la seguridad social
        en salud, pensi??n y riesgos a que haya a lugar. 9. Vigilar, cuidar y salvaguardar cualquier elemento que le
        sea entregado por parte del SENA como apoyo para el cumplimiento del objeto contractual y a la culminaci??n
        del contrato, deber?? reintegrarlos en las mismas condiciones en la que le fueron entregados, PARAGRAFO.
        En caso de p??rdida  de  alguno de los elementos, el contratista deber?? adelantar los tr??mites pertinentes
        establecidos en el MANUAL DE PROCEDIMIENTOS EN CASO DE PERDIDA Y/O DETERIORO DE BIENES Y/O DETERIORO DE BIENES
        Y RECURSOS Y RECURSOS DE LA ENTIDAD. 10. Brindar el apoyo t??cnico en el ??rea de su especialidad a la Subdirecci??n
        de centro y/o al supervisor de los contratos de bienes y/o servicios del Centro de Formaci??n cuando as?? sea
        requerido. 11. Brindar el apoyo t??cnico en el ??rea de su especialidad para la elaboraci??n de las especificaciones
        t??cnicas, codificaci??n estandarizada UNSPSC, estudios previos, an??lisis del sector requeridos. 12.
        Realizar acompa??amiento t??cnico en el ??rea de su especialidad para la emisi??n de avales requeridos
        por la unidad de emprendimiento. 13. Hacer parte de los comit??s de evaluaci??n de los tr??mites
        pre-contractuales en los que haya sido designado por la Subdirecci??n de centro en raz??n de su ??rea y/o
        especialidad.  14. Participar de las reuniones convocadas por la subdirecci??n y/o coordinaciones. 15.
        Participar en la formulaci??n y ejecuci??n de los proyectos cuando sea requerido seg??n el ??rea de su
        especialidad y de conformidad con la programaci??n acad??mica establecida. 16. Participar de acuerdo a
        la idoneidad y conocimiento de las normas institucionales en los comit??s de evaluaci??n y seguimiento a
        la formaci??n. 17. Promover en los aprendices la autoformaci??n con actividades acad??micas desescolarizadas
        y garantizar el acompa??amiento de los aprendices en las mismas, realizando seguimiento mediante la plataforma
        institucional del centro de Teleinform??tica y Producci??n Industrial. 18. Informar a la subdirecci??n de centro
        las oportunidades de relacionamiento con el sector productivo o social que en el cumplimiento de su objeto
        contractual pudieran ser identificadas. 19. Participar en las actividades de implementaci??n, mantenimiento
        y mejora del SIGA, en calidad de responsables de actividades enmarcadas en los procesos ejecutados por el
        centro de formaci??n o en los que este interact??e. 20. Durante el periodo de ejecuci??n del contrato, dar??
        aplicaci??n al proceso de certificaci??n de competencias seg??n normas de competencias que aplican a la
        prestaci??n del servicio de instructor, as?? como a los procesos que el SENA adelante para certificar
        habilidades pedag??gicas, de los instructores. 21. El Instructor contratista de formaci??n virtual,
        aulas m??viles y a distancia deber?? cumplir con lo establecido en el Manual que orienta el desempe??o del
        instructor en ambientes virtuales de aprendizaje. 22. El contratista se obliga a NO suscribir en la presente
        vigencia anual, contrato de prestaci??n de servicio alguno con otro Centro de Formaci??n o dependencia del SENA
        en cualquier parte del Pa??s. 23. Respecto de la planilla para pagos de honorarios, se deber?? tener en cuenta
        la Circular vigente o u otras disposiciones aplicables. 24. Apoyar la divulgaci??n y promoci??n de los
        servicios educativos y tecnol??gicos de la entidad. 25. Estudiar y resolver reclamaciones o peticiones
        realizadas por los estudiantes respecto de las notas asignadas en el menor tiempo posible.  26.
        El contratista deber?? asumir los costos que le impliquen cumplir con la adecuada vestimenta para la
        ejecuci??n del contrato y deber?? hacer uso de ella dentro de las instalaciones y ambientes de formaci??n;
        el SENA no se responsabiliza de la entrega de ning??n elemento de esta clase, y con la firma de este
        contrato se entiende aceptada dicha obligaci??n. 27. Cumplir con las normas y procedimientos en materia
        de seguridad y salud en el trabajo en el desarrollo de las actividades asignadas 28. El contratista se
        obliga a adquirir los elementos distintivos de acuerdo a las indicaciones realizadas por la supervisi??n
        del contrato.  29. Exigir a los aprendices y garantizar el uso adecuado de los
        elementos de protecci??n y seguridad industrial que se requiera en la formaci??n, al igual que el porte
        del uniforme correspondiente de acuerdo al manual del aprendiz. 30. Exigir el cumplimiento del acta
        de compromiso de los aprendices.  31. Exigir y garantizar el cuidado y pulcritud de los ambientes de
        formaci??n y diferentes espacios de la instituci??n. 32. preparar, elaborar y presentar los informes que
        requiera la Subdirecci??n del Centro de Teleinform??tica y Producci??n Industrial del SENA Regional Cauca
        y/o las dem??s dependencias del SENA del Nivel Regional o Nacional, al igual que los ??rganos de Control
        y Autoridades que lo requieran. 33. Abstenerse de hacer uso indebido del carn?? y dem??s distintivos de la
        entidad, y en caso que le hayan sido suministrados, debe devolverlos al supervisor, en la fecha de
        terminaci??n del contrato; constituy??ndose esta en una obligaci??n exigible para el tr??mite del pago o
        pagos pendientes al momento de la finalizaci??n del plazo establecido en el contrato. 34. Las dem??s que se requieran para el cumplimiento del objeto contractual espec??fico y
        que el centro de formaci??n demande. <b>A.2. OBLIGACIONES ESPECIALES:</b> a)
        Programar y realizar el desarrollo
        curricular dentro del proyecto formativo, b) desarrollar las actividades del procedimiento de Ejecuci??n
        de la Formaci??n Profesional orientando formaci??n por competencias laborales y utilizando la estrategia
        metodol??gica de aprendizaje por proyectos, c) generar ruta de aprendizaje y asociar los aprendices a
        la ruta de la formaci??n titulada o complementaria a su cargo seg??n el cronograma de ingreso establecido
        d) diligenciar las gu??as de aprendizaje, instrumentos de evaluaci??n y material de apoyo para los
        aprendices en los formatos o instrumentos oficiales actualizados y publicarlos en el Learning Management
        System LMS u otro autorizado, del aplicativo Sistema Optimizado de Formaci??n Integral de
        Aprendizaje Activo SOFIA PLUS, e) ingresar, desarrollar y realizar seguimiento a las actividades del
        proyecto de formaci??n en el  LMS u otro autorizado, desde SOFIA PLUS f) crear eventos en SOFIA PLUS,
        g) registrar los juicios evaluativos de los aprendices de acuerdo con los tiempos y fases establecidas
        en el proyecto formativo, h) gestionar la actualizaci??n de los datos de los aprendices en SOFIA PLUS,
        i) garantizar que la totalidad de aprendices susceptibles de contrato de aprendizaje de su formaci??n
        se encuentren registrados en el Sistema de Gesti??n Virtual de aprendices SGVA, j) reportar en SOFIA PLUS
        y en f??sico los juicios de evaluaci??n, las novedades presentadas en el programa de formaci??n
        (inasistencia, cancelaciones de matr??cula y planes de mejoramiento) una vez terminado el resultado
        de aprendizaje en un plazo m??ximo de 5 d??as h??biles, asegurando la calidad de la informaci??n y su
        coherencia con el proceso formativo, k) implementar acciones preventivas o correctivas para garantizar
        la sostenibilidad del Sistema Integrado de Gesti??n, l) atender oportunamente los requerimientos que
        haga el supervisor del contrato y  presentar  informes mensuales de la ejecuci??n del mismo. J)
        El contratista se compromete durante la ejecuci??n contractual a aplicar en procesos de certificaci??n
        en competencias seg??n las normas, en cumplimiento a la funci??n de instructor, as?? como a los diferentes
        procesos que el SENA adelante para certificar habilidades pedag??gicas. Igualmente el contratista deber??
        capacitarse en el idioma ingles y aplicar a la certificaci??n como m??nimo nivel A2.
        <b>A.3. OBLIGACIONES GENERALES. 1)</b> Suscribir oportunamente el Acta de Inicio del contrato de prestaci??n
        de servicios conjuntamente con el supervisor del mismo. <b>2)</b> Dar tr??mite oportuno a los asuntos que le sean
        asignados en desarrollo de las obligaciones contractuales.   <b>3)</b> Atender lo se??alado en el contrato y las
        obligaciones que le corresponden. <b>4)</b> Prestar los servicios contratados de manera eficaz y oportuna,
        as?? como atender los requerimientos que le sean efectuados por el supervisor del contrato y/o la ordenaci??n
        del gasto. <b>5)</b> Cumplir con el objeto y las obligaciones contractuales conservando un comportamiento
        de cordialidad y buen trato con las autoridades y entidades sujeto de atenci??n del SENA as?? como con
        los funcionarios y contratistas de la entidad, tanto en las instalaciones de la misma como donde quiera
        que se desarrollen las actividades derivadas del contrato.   <b>6)</b> Informar sobre los actos o
        conductas irregulares o il??citas de los cuales tenga conocimiento, que sean realizados por cualquier
        persona relacionada con los proyectos y las actividades a cargo de la entidad. <b>7)</b> Guardar la debida
        reserva y confidencialidad sobre la informaci??n y el contenido de los documentos que deba conocer con
        ocasi??n del contrato de prestaci??n de servicios. <b>8)</b> Hacer entrega al supervisor del contrato
        informes de gesti??n detallados sobre las actividades realizadas durante el periodo de ejecuci??n,
        con los soportes correspondientes. <b>9)</b> Mantener al d??a sus pagos al sistema general de seguridad
        social en salud, pensiones y riesgos profesionales los cuales deber??n ser liquidados de acuerdo a la
        normatividad vigente y presentadas las constancias antes de cada pago ante el supervisor. <b>10)</b> Hacer
        buen uso de los elementos y equipos que le sean asignados para el desarrollo del presente contrato
        as?? como de la informaci??n y hacer entrega oportuna de los mismos al supervisor del contrato, al momento
        de la terminaci??n. <b>11)</b> Cumplir estrictamente, con el sistema integrado de gesti??n compuesto
        por el Modelo Est??ndar de Control Interno ???MECI-, la Gesti??n de Calidad y el Plan Institucional de Gesti??n
        Ambiental, comprometi??ndose a mantenerse informado, a participar activamente en las actividades que
        se adelanten  y a  conocer de forma integral las normas pertinentes para su cumplimiento,
        las cuales podr??n ser consultadas a trav??s del portal web de la entidad,  todo lo anterior con
        el fin de aprovechar de forma responsable los recursos e insumos que la entidad pone a su disposici??n,
        tales como: el agua, la energ??a, los elementos de oficina, cumpliendo con el proceso de separaci??n
        en la fuente de los residuos s??lidos y los dem??s procesos de la entidad que conlleven al
        mejoramiento ambiental de la ciudad. <b>12)</b> El contratista debe cumplir con las normas del Sistema
        General de Riesgos Laborales, en especial, las siguientes: <b>1.</b> Procurar el cuidado integral de su salud.
        <b>2.</b> Contar con los elementos de protecci??n personal necesarios para ejecutar la actividad contratada,
        para lo cual asumir?? su costo. <b>3.</b> Informar a los contratantes la ocurrencia de incidentes,
        accidentes de trabajo y enfermedades laborales. <b>4.</b> Participar en las actividades de Prevenci??n y
        Promoci??n organizadas por los contratantes, los Comit??s Paritarios de Seguridad y Salud en el Trabajo
        o Vig??as Ocupacionales o la Administradora de Riesgos Laborales. <b>5.</b> Cumplir las normas, reglamentos
        e instrucciones del Sistema de Gesti??n de la Seguridad y Salud en el Trabajo SG-SST. <b>6.</b> Informar
        oportunamente a los contratantes toda novedad derivada del contrato. <b>13) Ex??menes m??dicos ocupacionales.</b>
        En virtud de lo establecido en el par??grafo 3?? del art??culo 2?? de la Ley 1562 de 2012, la entidad o
        instituci??n contratante deber?? establecer las medidas para que los contratistas sean incluidos en sus
        Sistemas de Vigilancia Epidemiol??gica, para lo cual podr??n tener en cuenta los t??rminos de duraci??n de
        los respectivos contratos. El costo de los ex??menes peri??dicos ser?? asumido por el contratista. <b>14)</b>
        Vigilar y salvaguardar los bienes que hagan parte del patrimonio del SENA o de otras entidades o de
        particulares puestos al servicio de la entidad, y que le hayan sido entregados para el desarrollo del
        objeto del contrato, por lo que son sujetos de control y vigilancia. En consecuencia deber??n dar cuenta
        sobre la entrega de los bienes al supervisor y/o interventor del contrato respectivo y a los ??rganos
        de control fiscal y disciplinario, de ser procedente. <b>15)</b> Estar afiliado o afiliarse al Sistema
        General de Salud y Pensi??n, as?? como facilitar al SENA toda la documentaci??n necesaria para la afiliaci??n
        a la Administradora de Riesgos Laborales -ARL -, a cargo de la Entidad, en virtud de los art??culos 2 y 6
        de la ley 1562 de 2012, previo a la ejecuci??n del contrato. <b>16)</b> En cumplimiento de lo dispuesto en el
        par??grafo del art??culo 23 de la ley 1150 de 2007 y del art??culo 6 de la ley 1562 de 2012, el (la)
        CONTRATISTA deber?? acreditar que se encuentra al d??a en el pago mensual de los aportes al sistema de
        seguridad social integral (salud, pensi??n y riesgos laborales ) y para la realizaci??n de cada pago
        derivado del mismo; estos pagos se acreditan ??nicamente por el sistema PILA o de Planilla Asistida o el
        que determine el Ministerio de Trabajo. Cuando corresponda o haya a lugar, el (la) contratista tambi??n
        debe acreditar el pago oportuno de los aportes al SENA, ICBF y cajas de Compensaci??n Familiar. <b>17)</b>
        Presentar a la suscripci??n del contrato, los siguientes documentos: a) Registro ??nico Tributario ???
        RUT (en caso de que haya cambiado de r??gimen). b) Constancia de afiliaci??n al Plan Obligatorio de
        Salud a trav??s de una Empresa Promotora de Salud (E.P.S) y al Sistema General de Pensiones. c)
        Formulario ??nico de declaraci??n de bienes y rentas diligenciado, d) Registrar al momento de la firma
        del contrato la informaci??n de hoja de vida del Sistema de Informaci??n y Gesti??n del Empleo P??blico ???
        SIGEP, siguiendo el procedimiento se??alado por el Grupo de Apoyo Administrativo Intercentros de la Regional
        Cauca. 18) Las dem??s necesarias para el cabal cumplimiento del objeto contractual.
        <b>PARAGRAFO PRIMERO:</b> Con la suscripci??n de este contrato, el SENA queda autorizado expresamente por el
        (la) Contratista para verificar sus antecedentes judiciales y la informaci??n que considere necesaria
        en los Sistemas de Informaci??n correspondientes, con el uso y las condiciones se??aladas en las normas
        vigentes. <b>PARAGRAFO SEGUNDO:</b> Los derechos patrimoniales de autor de todos los documentos y desarrollos
        que produzca o realice el (la) CONTRATISTA en virtud de la ejecuci??n del presente contrato, ser??n de
        propiedad del SENA; Si hay lugar a publicaciones se dar?? el respectivo reconocimiento de los derechos
        morales de autor. <b>PARAGRAFO TERCERO:</b>En caso de requerirse el desplazamiento del contratista para
        desarrollar actividades directamente relacionadas con el objeto del contrato, ??ste deber?? informar a
        su supervisor con suficiente antelaci??n, a fin que la supervisi??n adelante las gestiones necesarias
        para facilitar: a) gastos de transporte si su desplazamiento se efect??a dentro del departamento del Cauca
        y, b) gastos de transporte y gastos de viaje si su desplazamiento se efect??a por fuera del departamento
        del Cauca o del territorio nacional. La liquidaci??n de los gastos aqu?? estipulados se har?? de conformidad
        con lo establecido en el(los) acto(s) administrativo(s) que para el efecto sea(n) aplicable(s).
        <b>B) OBLIGACIONES DEL SENA:</b> Adem??s de las obligaciones y
        estipulaciones se??aladas en las Leyes 80 de 1993 y 1150 de 2007, as?? como las que se deriven del Decreto
        1082 de 2015, el SENA se obliga a: 1. Verificar previo a la suscripci??n del presente contrato los
        documentos requeridos para la contrataci??n. 2. Pagar al (la) CONTRATISTA los honorarios, en la forma
        estipulada en este contrato. 3. Prestar la mayor colaboraci??n necesaria al (la) CONTRATISTA para la
        correcta ejecuci??n del objeto contratado. 4. Poner a disposici??n del (la) CONTRATISTA la informaci??n
        y/o documentaci??n que requiera para la cabal ejecuci??n del contrato. 5. Ejercer una correcta supervisi??n del
        contrato <b>CL??USULA QUINTA.-<span class="subraya">Garant??a ??nica.</span></b>  El (La) CONTRATISTA se obliga a
        constituir a favor
        del SENA una garant??a en una de las modalidades se??aladas por el Decreto 1082 de 2015, para amparar
        el contrato, en las condiciones que establecen esas normas o las que las modifiquen, as??:
        <b>Cumplimiento de las obligaciones surgidas del contrato estatal:</b> por un valor equivalente al 10%
        del valor total del mismo y con una vigencia igual a su plazo de ejecuci??n y cuatro (4) meses m??s contados
        a partir de la expedici??n de la misma. Esta garant??a ampara entre otros, los riesgos de que trata el Decreto 1082 de 2015.
        <b>PARAGRAFO.</b> Cuando se presente uno de los eventos de
        incumplimiento cubierto por la garant??a, la entidad proceder?? a hacerla efectiva en los t??rminos y con
        el procedimiento se??alados por las normas vigentes. <b>CL??USULA SEXTA.-
        <span class="subraya">Imputaci??n Presupuestal y autorizaci??n:</span></b> El valor de los honorarios del presente Contrato
        se har?? con cargo al Certificado de Disponibilidad Presupuestal No. {{ $contract->CDP }} de 2018, expedido
        por el Grupo de Administrativo y Financiero Intercentros de la Regional Cauca del SENA. <b>CL??USULA SEPTIMA.-
        <span class="subraya">Supervisi??n:</span></b> El control y vigilancia del cabal cumplimiento y la completa y
        adecuada ejecuci??n de este
        contrato y de cada una de sus obligaciones, as?? como de la calidad de los servicios prestados, estar?? a
        cargo del (la) {{ mb_convert_case($supervisor->cargo, MB_CASE_LOWER, "UTF-8") }} del Centro de Teleinform??tica
        y Producci??n Industrial de la Regional Cauca del SENA o de quien designe por escrito el subdirector
        del Centro de Formaci??n del Servicio Nacional de Aprendizaje SENA. El Supervisor del Contrato adem??s
        de velar por el cumplimiento de lo establecido en el art??culo 4?? de la Ley 80 de 1993, la Ley 1150 de 2007,
        los art??culos 44, 83, 84, 86 y 118 de la Ley 1474 de 2011 (anticorrupci??n), debe cumplir las funciones
        se??aladas en la Resoluci??n No. 202 de 2014 ( manual de interventor??a y supervisi??n)  o la que la modifique
        o remplace, as?? como las dem??s que surjan  por la naturaleza de este contrato, cuando se requiera cambio
        de supervisor deber?? realizar el procedimiento se??alado en el manual. <b>CL??USULA OCTAVA.-
            <span class="subraya">Multas y cl??usula penal pecuniaria:</span></b> El incumplimiento de las obligaciones
        del contrato ser??n sancionados pecuniariamente de conformidad con las siguientes estipulaciones: <b>1)</b> En
        caso de que haya lugar a la declaratoria de incumplimiento o caducidad del contrato, el SENA podr?? exigirle al
        (la) CONTRATISTA a t??tulo de tasaci??n anticipada de perjuicios, una suma equivalente al diez por ciento
        (10%) del valor total del Contrato, lo cual no lo exime del pago de los perjuicios causados en exceso de
        dicha tasaci??n. <b>2)</b> Si el incumplimiento es parcial por parte de ??l (la) CONTRATISTA, sin que
        d?? lugar a la declaratoria del siniestro de incumplimiento o la de caducidad, ??ste reconocer?? y pagar?? al
        SENA, una multa equivalente al 0,5% del valor del Contrato por cada d??a de retardo en el cumplimiento de
        la respectiva obligaci??n, sin superar el diez (10%) del valor del contrato.  <b>PARAGRAFO  PRIMERO:</b>
        En la aplicaci??n de la cl??usula penal y de las multas se tendr?? en cuenta el principio de proporcionalidad y
        se dar?? previamente cumplimiento al debido proceso, de conformidad con los art??culos 17 de la ley 1150 de 2007
        y 86 de la Ley 1474 de 2011 (anticorrupci??n) y a lo previsto en el Decreto 1082 de 2015. <b>PARAGRAFO SEGUNDO:</b>
        En caso de que el (la) CONTRATISTA no pague el valor de la cl??usula penal o de la multa dentro del t??rmino
        indicado en el acto administrativo correspondiente, el SENA har?? efectivo su pago a trav??s de la p??liza de
        cumplimiento del contrato  o  la  deducir??  de  cualquier  cantidad  que  adeude  al  (la) CONTRATISTA,
        quien autoriza esta deducci??n  expresamente  con  la  firma  de este contrato. <b>CL??USULA NOVENA. -
            <span class="subraya">Caducidad:</span></b> Se adoptar??  esta  medida  de  conformidad con lo  previsto
        en  el  art??culo 18 de la  Ley  80  de 1993 y por las  causales  se??aladas  en  esa  Ley  y  en  las  dem??s
        normas  vigentes. <b> CL??USULA  DECIMA. - <span class="subraya">Interpretaci??n,   Modificaci??n y
                terminaci??n:</span></b> Son aplicables al presente contrato la terminaci??n, modificaci??n e interpretaci??n
        unilateral, en los t??rminos establecidos en la ley 80 de 1993 y dem??s normas vigentes.
        <b> CL??USULA DECIMA PRIMERA.- <span class="subraya">Terminaci??n anticipada del contrato por mutuo acuerdo:</span></b>
        En cualquier momento, durante la vigencia del presente contrato, las partes podr??n darlo por terminado
        anticipadamente de mutuo acuerdo, que constar?? por escrito en un acta suscrita por las partes, en la cual se
        indicar?? expresamente la fecha a partir de la cual acuerdan dar por terminado el contrato.
        <b>CL??USULA DECIMA SEGUNDA.- <span class="subraya">Cesi??n del Contrato:</span></b> El(la) CONTRATISTA no podr??
        ceder total ni parcialmente el presente contrato a otra persona natural o jur??dica, salvo autorizaci??n previa
        y expresa del SENA. <b>CL??USULA DECIMA TERCERA.- <span class="subraya">Perfeccionamiento, Ejecuci??n:</span></b>
        El presente contrato se entiende perfeccionado con la firma de las partes contratantes. Para su ejecuci??n,
        el Registro Presupuestal correspondiente por parte del SENA, la constituci??n de la Garant??a ??nica por parte
        del (la) CONTRATISTA y la aprobaci??n de la misma por parte del SENA.  <b>CL??USULA DECIMA CUARTA.-
            <span class="subraya">Inhabilidades e Incompatibilidades, Conflicto de Intereses e Impedimentos:</span></b>
        El(la) CONTRATISTA declara bajo la gravedad del juramento que se entiende surtido con la firma de este contrato,
        que no se halla incurso(a) en ninguna de las causales de inhabilidad o incompatibilidad, conflicto de intereses
        o impedimento, se??aladas en la Constituci??n, la Ley o la normatividad vigente; declara igualmente que se encuentra
        a paz y salvo con el Tesoro Nacional y con el SENA, o que adeud??ndole no han vencido los t??rminos para su pago y
        que no es deudor del Estado, o que si es deudor ha suscrito acuerdo de pago vigente.
        <b>PARAGRAFO:</b> la AUTOCERTIFICACI??N durante la ejecuci??n contractual, en cualquier competencia de su
        propia instrucci??n a cargo, hace parte del conflicto de intereses e impedimentos del contratista.
        <b>CL??USULA D??CIMA QUINTA.- <span class="subraya">Suspensi??n:</span></b> El plazo de ejecuci??n del presente
        contrato podr?? ser suspendido excepcionalmente de manera temporal, en las siguientes circunstancias:
        1. Por el mutuo acuerdo de las partes. 2. Fuerza mayor o caso fortuito o por causas debidamente justificadas,
        previa solicitud del (la) CONTRATISTA y autorizaci??n del CONTRATANTE. 3. Por informe de la supervisi??n del
        contrato ante un eventual incumplimiento del contrato, suspensi??n temporal que proceder?? mientras se adelanta
        el respectivo proceso administrativo. La suspensi??n se har?? mediante acta suscrita por las partes en la cual
        se expresar?? su causa, el t??rmino de la suspensi??n y la fecha en que se reanuda la ejecuci??n del contrato.
        <b>PARAGRAFO:</b> En caso de suspensi??n el (la) CONTRATISTA se obliga a informar tal evento al Asegurador y
        a ampliar las garant??as, proporcionalmente al t??rmino que dure la misma. <b>CLA??SULA DECIMASEXTA:
            <span class="subraya">Ausencia de relaci??n laboral:</span></b> Las partes dejan constancia expresa que el
        presente contrato se suscribe en el marco del art??culo 32 ??? numeral 3 de la Ley 80 de 1993 y dem??s normas
        concordantes y complementarias, por lo cual declaran que no conlleva relaci??n laboral ni prestaciones sociales;
        su ejecuci??n se har?? sin subordinaci??n alguna, gozando el contratista de independencia en la preparaci??n y
        ejecuci??n del contrato. <b>CL??USULA DECIMA SEPTIMA- <span class="subraya">Liquidaci??n del contrato:</span></b>
        De conformidad con el art??culo 217 del Decreto Ley 19 de 2012, que modific?? el art??culo 60 de la Ley 80 de 1993,
        no ser?? liquidado el presente contrato cuando el Supervisor del mismo certifique a su finalizaci??n que el
        objeto y todas las obligaciones del contrato fueron cumplidas a satisfacci??n por el Contratista y que a
        ??ste se le cancel?? el valor total de los honorarios pactados, no quedando saldo alguno. En caso contrario,
        o cuando el contratista presente reclamaci??n que impida considerar que las partes han terminado el contrato
        a paz y salvo, el presente contrato ser?? liquidado de mutuo acuerdo entre las partes, dentro de los cuatro (4)
        meses siguientes a la fecha de su terminaci??n por cualquier causa; en el evento de que las partes no lleguen
        a un acuerdo, el SENA proceder?? a liquidarlo unilateralmente en las condiciones y t??rminos establecidos en
        los art??culos 60 de la Ley 80 de 1993 y 11 de la ley 1150 de 2007.  <b>CL??USULA DECIMAOCTAVA.-
            <span class="subraya">Seguridad de la informaci??n y confidencialidad:</span></b> EL CONTRATISTA se obliga a
        conocer y aplicar la pol??tica y los lineamientos de Seguridad de la Informaci??n y Gesti??n de los activos de
        la Informaci??n que le entregue el SENA. As?? mismo, EL CONTRATISTA se obliga a no revelar, durante la vigencia
        del este contrato, ni dentro de los dos (2) a??os siguientes a su expiraci??n, la informaci??n confidencial de
        propiedad del SENA, de la que el CONTRATISTA tenga conocimiento con ocasi??n o para la ejecuci??n de este
        contrato, sin el previo consentimiento escrito del mismo. Se considera informaci??n confidencial
        cualquier informaci??n t??cnica, financiera, comercial, estrat??gica y, en general, cualquier informaci??n
        relacionada con las funciones, programas, planes, proyectos y/o actividades del SENA. <b>CL??USULA DECIMA NOVENA:
            <span class="subraya">Indemnidad.</span></b> El (la) CONTRATISTA se obliga a mantener al SENA libre
        de cualquier da??o o perjuicio originado en reclamaciones, demandas, acciones legales y costos que puedan
        surgir por da??os o lesiones a terceros, ocasionados por las actuaciones del  (la)  CONTRATISTA,  sus
        agentes  o  sus dependientes, durante  la ejecuci??n del objeto y las obligaciones del contrato.
        <b>CL??USULA VIGESIMA. <span class="subraya">Domicilio:</span></b> Para todos los efectos legales y fiscales,
        las partes fijan como domicilio contractual la ciudad de Popay??n.
        <b>CL??USULA VIG??SIMA PRIMERA: <span class="subraya">Lugar de Ejecuci??n:</span></b> El lugar de ejecuci??n del
        presente contrato ser?? en el o en los Municipios del Departamento del Cauca donde se programe o designe.



        <br>
        <br>

        <p style="text-align:left">
            Se firma el presente contrato en la ciudad de Popay??n Cauca, el  _________________________________
        </p>
        <br>
        <div>
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
        </div>
        <br>

        <p style="font-size: 11px; clear:both">
            CDP: {{ $contract->CDP }} <br>
            Valor: ${{ number_format($contract->value, 0, ',', '.')}} <br>
            <br>
            Proyecto: Andres Urrego Ruiz - Apoyo Jur??dico <br>
            Reviso: Marcela Ausecha S. - Apoyo administrativo y jur??dico <br>

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

        return  $dia . " de " .  $mes;
    }
?>
