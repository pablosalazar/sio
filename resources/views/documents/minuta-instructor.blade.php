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
            CONTRATO DE PRESTACIÓN DE SERVICIOS No. <span class="espacio">XXXXXX</span> DE 2018, SUSCRITO ENTRE EL SERVICIO NACIONAL DE
            APRENDIZAJE – SENA Y {{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}
        </p>
    </div>
    <div id="footer">
        <p class="page">Página <span class="pagenum"></span></p>
        <p class="formato">GTH-F-077 V.06</p>

    </div>
    
    <div class="documento">
        Entre los suscritos, <b>EDIER ORLANDO BOLAÑOS HOYOS</b>, domiciliado en la ciudad de Popayán-Cauca, identificado con la
        C.C. 10.541.127, actuando en nombre y representación del SENA en su calidad de SUBDIRECTOR DEL CENTRO DE
        TELEINFORMÁTICA Y PRODUCCIÓN INDUSTRIAL  y representante legal del mismo ostentando la ordenación del gasto,
        debidamente acreditado y autorizado, cargo en el que fue nombrado mediante Resolución 470 del 2016, y del cual
        tomo posesión con el Acta 038 de 2016, actuando en nombre y representación del <b>SERVICIO NACIONAL DE APRENDIZAJE -
            SENA</b>, Establecimiento Público del orden nacional adscrito al Ministerio del Trabajo, en virtud de la delegación de
        funciones otorgada en la Resolución 2331 de 2013 o la que la modifique, que en adelante se denomina <b>EL SENA</b>, y
        de otra parte <b>{{ mb_convert_case($employee->name, MB_CASE_UPPER, "UTF-8") }}</b>, identificado(a) con la
        @if($employee->document_type == "C.C.")
            C.C.
        @elseif($employee->document_type == "C.E.")
            C.E.
        @else
            T.I.
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
        <b>CLÁUSULAS: CLÁUSULA PRIMERA.- Objeto:</b> {{ $contract->object }}. <b>CLÁUSULA SEGUNDA.-Plazo:</b> desde el
        {{ fecha_letras($contract->start_date) }} hasta el {{fecha_letras($contract->end_date)}} de 2018, sin exceder la presente vigencia presupuestal y empezará a contarse a partir del
        cumplimientos de los requisitos de perfeccionamiento y ejecución indicados en este contrato, <b>CLÁUSULA  TERCERA.
        - <span class="subraya">Valor y Forma de Pago:</span></b> El valor total del presente contrato es de
        {{ numtoletras($contract->value) }} (${{ number_format($contract->value, 0, ',', '.') }}) incluido IVA
        (de conformidad con el régimen tributario a que pertenezca el contratista). Esta suma será pagada por el
        SENA al contratista de la siguiente manera: {{ $contract->payment_method }} Los honorarios serán pagados por
        el SENA al contratista, conforme a la disponibilidad de recursos y de acuerdo al cronograma definido
        por la Dirección Administrativa y Financiera de la Dirección General, en la cuenta ahorros No. {{ $contract->account_number }}
        del Banco {{ $contract->bank }}, cuyo titular es el (la) Contratista; <b>PARAGRAFO PRIMERO:</b> El cambio de cuenta
        por parte del contratista deberá ser informada al supervisor del contrato con el fin de surtir los trámites
        pertinentes. Para   que   el   SENA   pueda   adelantar   los trámites administrativos
        para el pago, el (la) Contratista debe acreditar previamente el cumplimiento de los requisitos de pago, tales
        como la certificación expedida por el supervisor del contrato, en la que acredite el cumplimiento a entera
        satisfacción del objeto y obligaciones del contrato en el respectivo periodo y la cancelación de los aportes a la seguridad social: Salud,
        Pensión y Riesgos Laborales, así como los  demás documentos necesarios para el pago.  <b>CLÁUSULA CUARTA.- <span class="subraya">Obligaciones de las partes:</span> A) OBLIGACIONES DEL Ó DE LA CONTRATISTA:</b> El
        (la) CONTRATISTA, además de las obligaciones que por su índole y la naturaleza del contrato de prestación de
        servicios le son propias, se obliga para con EL SENA: <b>A.1. OBLIGACIONES ESPECÍFICAS:</b> 1. Adelantar
        las gestiones necesarias para la ejecución del contrato en condiciones de eficiencia y calidad, de
        acuerdo a las especificaciones exigidas por el SENA y desglosadas en detalle en la minuta del contrato.
        2. Cumplir el objeto y alcance del contrato, de acuerdo con la programación asignada por Coordinación
        Académica en el marco de las políticas de calidad, pertinencia y eficacia. 3. Ejercer el control propio
        de todas las actividades encomendadas con independencia y autonomía y de forma oportuna y dentro de los
        términos establecidos con el fin de obtener la correcta realización del objeto del contrato. 4. Rendir
        informes académicos que contenga: juicios evaluativos, novedades de los aprendices (llamados de atención
        verbales, inasistencia reiterada, resultado del plan de mejoramiento, actividades complementarias bien sean
        académicas y/o actitudinales); casos específicos para el acompañamiento de aprendices por bienestar o por
        coordinación académica y reporte de buenas prácticas o casos éxitos por los aprendices. 5. Registrar los
        resultados de la emisión de juicios (criterios) de evaluación relacionados con los logros de los resultados
        de aprendizaje o novedades del aprendiz, en los tiempos establecidos por el procedimiento de Ejecución de
        la Formación Profesional, en el aplicativo dispuesto por la Entidad. 6. Garantizar el autocontrol de la
        ejecución de horas de formación en el rango establecido por la entidad. En caso de no cumplir con el rango
        de ejecución mensual establecido por la entidad, el pago se hará proporcional y por el valor acorde al
        informe generado por la supervisión del contrato en el mes correspondiente. 7. Participar de conformidad
        con las normas institucionales en los comités de seguimiento y evaluación de aprendices donde se requiera.
        8. Garantizar dentro de los primeros diez (10) días calendario de cada mes, el pago de la seguridad social
        en salud, pensión y riesgos a que haya a lugar. 9. Vigilar, cuidar y salvaguardar cualquier elemento que le
        sea entregado por parte del SENA como apoyo para el cumplimiento del objeto contractual y a la culminación
        del contrato, deberá reintegrarlos en las mismas condiciones en la que le fueron entregados, PARAGRAFO.
        En caso de pérdida  de  alguno de los elementos, el contratista deberá adelantar los trámites pertinentes
        establecidos en el MANUAL DE PROCEDIMIENTOS EN CASO DE PERDIDA Y/O DETERIORO DE BIENES Y/O DETERIORO DE BIENES
        Y RECURSOS Y RECURSOS DE LA ENTIDAD. 10. Brindar el apoyo técnico en el área de su especialidad a la Subdirección
        de centro y/o al supervisor de los contratos de bienes y/o servicios del Centro de Formación cuando así sea
        requerido. 11. Brindar el apoyo técnico en el área de su especialidad para la elaboración de las especificaciones
        técnicas, codificación estandarizada UNSPSC, estudios previos, análisis del sector requeridos. 12.
        Realizar acompañamiento técnico en el área de su especialidad para la emisión de avales requeridos
        por la unidad de emprendimiento. 13. Hacer parte de los comités de evaluación de los trámites
        pre-contractuales en los que haya sido designado por la Subdirección de centro en razón de su área y/o
        especialidad.  14. Participar de las reuniones convocadas por la subdirección y/o coordinaciones. 15.
        Participar en la formulación y ejecución de los proyectos cuando sea requerido según el área de su
        especialidad y de conformidad con la programación académica establecida. 16. Participar de acuerdo a
        la idoneidad y conocimiento de las normas institucionales en los comités de evaluación y seguimiento a
        la formación. 17. Promover en los aprendices la autoformación con actividades académicas desescolarizadas
        y garantizar el acompañamiento de los aprendices en las mismas, realizando seguimiento mediante la plataforma
        institucional del centro de Teleinformática y Producción Industrial. 18. Informar a la subdirección de centro
        las oportunidades de relacionamiento con el sector productivo o social que en el cumplimiento de su objeto
        contractual pudieran ser identificadas. 19. Participar en las actividades de implementación, mantenimiento
        y mejora del SIGA, en calidad de responsables de actividades enmarcadas en los procesos ejecutados por el
        centro de formación o en los que este interactúe. 20. Durante el periodo de ejecución del contrato, dará
        aplicación al proceso de certificación de competencias según normas de competencias que aplican a la
        prestación del servicio de instructor, así como a los procesos que el SENA adelante para certificar
        habilidades pedagógicas, de los instructores. 21. El Instructor contratista de formación virtual,
        aulas móviles y a distancia deberá cumplir con lo establecido en el Manual que orienta el desempeño del
        instructor en ambientes virtuales de aprendizaje. 22. El contratista se obliga a NO suscribir en la presente
        vigencia anual, contrato de prestación de servicio alguno con otro Centro de Formación o dependencia del SENA
        en cualquier parte del País. 23. Respecto de la planilla para pagos de honorarios, se deberá tener en cuenta
        la Circular vigente o u otras disposiciones aplicables. 24. Apoyar la divulgación y promoción de los
        servicios educativos y tecnológicos de la entidad. 25. Estudiar y resolver reclamaciones o peticiones
        realizadas por los estudiantes respecto de las notas asignadas en el menor tiempo posible.  26.
        El contratista deberá asumir los costos que le impliquen cumplir con la adecuada vestimenta para la
        ejecución del contrato y deberá hacer uso de ella dentro de las instalaciones y ambientes de formación;
        el SENA no se responsabiliza de la entrega de ningún elemento de esta clase, y con la firma de este
        contrato se entiende aceptada dicha obligación. 27. Cumplir con las normas y procedimientos en materia
        de seguridad y salud en el trabajo en el desarrollo de las actividades asignadas 28. El contratista se
        obliga a adquirir los elementos distintivos de acuerdo a las indicaciones realizadas por la supervisión
        del contrato.  29. Exigir a los aprendices y garantizar el uso adecuado de los
        elementos de protección y seguridad industrial que se requiera en la formación, al igual que el porte
        del uniforme correspondiente de acuerdo al manual del aprendiz. 30. Exigir el cumplimiento del acta
        de compromiso de los aprendices.  31. Exigir y garantizar el cuidado y pulcritud de los ambientes de
        formación y diferentes espacios de la institución. 32. preparar, elaborar y presentar los informes que
        requiera la Subdirección del Centro de Teleinformática y Producción Industrial del SENA Regional Cauca
        y/o las demás dependencias del SENA del Nivel Regional o Nacional, al igual que los órganos de Control
        y Autoridades que lo requieran. 33. Abstenerse de hacer uso indebido del carné y demás distintivos de la
        entidad, y en caso que le hayan sido suministrados, debe devolverlos al supervisor, en la fecha de
        terminación del contrato; constituyéndose esta en una obligación exigible para el trámite del pago o
        pagos pendientes al momento de la finalización del plazo establecido en el contrato. 34. Las demás que se requieran para el cumplimiento del objeto contractual específico y
        que el centro de formación demande. <b>A.2. OBLIGACIONES ESPECIALES:</b> a)
        Programar y realizar el desarrollo
        curricular dentro del proyecto formativo, b) desarrollar las actividades del procedimiento de Ejecución
        de la Formación Profesional orientando formación por competencias laborales y utilizando la estrategia
        metodológica de aprendizaje por proyectos, c) generar ruta de aprendizaje y asociar los aprendices a
        la ruta de la formación titulada o complementaria a su cargo según el cronograma de ingreso establecido
        d) diligenciar las guías de aprendizaje, instrumentos de evaluación y material de apoyo para los
        aprendices en los formatos o instrumentos oficiales actualizados y publicarlos en el Learning Management
        System LMS u otro autorizado, del aplicativo Sistema Optimizado de Formación Integral de
        Aprendizaje Activo SOFIA PLUS, e) ingresar, desarrollar y realizar seguimiento a las actividades del
        proyecto de formación en el  LMS u otro autorizado, desde SOFIA PLUS f) crear eventos en SOFIA PLUS,
        g) registrar los juicios evaluativos de los aprendices de acuerdo con los tiempos y fases establecidas
        en el proyecto formativo, h) gestionar la actualización de los datos de los aprendices en SOFIA PLUS,
        i) garantizar que la totalidad de aprendices susceptibles de contrato de aprendizaje de su formación
        se encuentren registrados en el Sistema de Gestión Virtual de aprendices SGVA, j) reportar en SOFIA PLUS
        y en físico los juicios de evaluación, las novedades presentadas en el programa de formación
        (inasistencia, cancelaciones de matrícula y planes de mejoramiento) una vez terminado el resultado
        de aprendizaje en un plazo máximo de 5 días hábiles, asegurando la calidad de la información y su
        coherencia con el proceso formativo, k) implementar acciones preventivas o correctivas para garantizar
        la sostenibilidad del Sistema Integrado de Gestión, l) atender oportunamente los requerimientos que
        haga el supervisor del contrato y  presentar  informes mensuales de la ejecución del mismo. J)
        El contratista se compromete durante la ejecución contractual a aplicar en procesos de certificación
        en competencias según las normas, en cumplimiento a la función de instructor, así como a los diferentes
        procesos que el SENA adelante para certificar habilidades pedagógicas. Igualmente el contratista deberá
        capacitarse en el idioma ingles y aplicar a la certificación como mínimo nivel A2.
        <b>A.3. OBLIGACIONES GENERALES. 1)</b> Suscribir oportunamente el Acta de Inicio del contrato de prestación
        de servicios conjuntamente con el supervisor del mismo. <b>2)</b> Dar trámite oportuno a los asuntos que le sean
        asignados en desarrollo de las obligaciones contractuales.   <b>3)</b> Atender lo señalado en el contrato y las
        obligaciones que le corresponden. <b>4)</b> Prestar los servicios contratados de manera eficaz y oportuna,
        así como atender los requerimientos que le sean efectuados por el supervisor del contrato y/o la ordenación
        del gasto. <b>5)</b> Cumplir con el objeto y las obligaciones contractuales conservando un comportamiento
        de cordialidad y buen trato con las autoridades y entidades sujeto de atención del SENA así como con
        los funcionarios y contratistas de la entidad, tanto en las instalaciones de la misma como donde quiera
        que se desarrollen las actividades derivadas del contrato.   <b>6)</b> Informar sobre los actos o
        conductas irregulares o ilícitas de los cuales tenga conocimiento, que sean realizados por cualquier
        persona relacionada con los proyectos y las actividades a cargo de la entidad. <b>7)</b> Guardar la debida
        reserva y confidencialidad sobre la información y el contenido de los documentos que deba conocer con
        ocasión del contrato de prestación de servicios. <b>8)</b> Hacer entrega al supervisor del contrato
        informes de gestión detallados sobre las actividades realizadas durante el periodo de ejecución,
        con los soportes correspondientes. <b>9)</b> Mantener al día sus pagos al sistema general de seguridad
        social en salud, pensiones y riesgos profesionales los cuales deberán ser liquidados de acuerdo a la
        normatividad vigente y presentadas las constancias antes de cada pago ante el supervisor. <b>10)</b> Hacer
        buen uso de los elementos y equipos que le sean asignados para el desarrollo del presente contrato
        así como de la información y hacer entrega oportuna de los mismos al supervisor del contrato, al momento
        de la terminación. <b>11)</b> Cumplir estrictamente, con el sistema integrado de gestión compuesto
        por el Modelo Estándar de Control Interno –MECI-, la Gestión de Calidad y el Plan Institucional de Gestión
        Ambiental, comprometiéndose a mantenerse informado, a participar activamente en las actividades que
        se adelanten  y a  conocer de forma integral las normas pertinentes para su cumplimiento,
        las cuales podrán ser consultadas a través del portal web de la entidad,  todo lo anterior con
        el fin de aprovechar de forma responsable los recursos e insumos que la entidad pone a su disposición,
        tales como: el agua, la energía, los elementos de oficina, cumpliendo con el proceso de separación
        en la fuente de los residuos sólidos y los demás procesos de la entidad que conlleven al
        mejoramiento ambiental de la ciudad. <b>12)</b> El contratista debe cumplir con las normas del Sistema
        General de Riesgos Laborales, en especial, las siguientes: <b>1.</b> Procurar el cuidado integral de su salud.
        <b>2.</b> Contar con los elementos de protección personal necesarios para ejecutar la actividad contratada,
        para lo cual asumirá su costo. <b>3.</b> Informar a los contratantes la ocurrencia de incidentes,
        accidentes de trabajo y enfermedades laborales. <b>4.</b> Participar en las actividades de Prevención y
        Promoción organizadas por los contratantes, los Comités Paritarios de Seguridad y Salud en el Trabajo
        o Vigías Ocupacionales o la Administradora de Riesgos Laborales. <b>5.</b> Cumplir las normas, reglamentos
        e instrucciones del Sistema de Gestión de la Seguridad y Salud en el Trabajo SG-SST. <b>6.</b> Informar
        oportunamente a los contratantes toda novedad derivada del contrato. <b>13) Exámenes médicos ocupacionales.</b>
        En virtud de lo establecido en el parágrafo 3° del artículo 2° de la Ley 1562 de 2012, la entidad o
        institución contratante deberá establecer las medidas para que los contratistas sean incluidos en sus
        Sistemas de Vigilancia Epidemiológica, para lo cual podrán tener en cuenta los términos de duración de
        los respectivos contratos. El costo de los exámenes periódicos será asumido por el contratista. <b>14)</b>
        Vigilar y salvaguardar los bienes que hagan parte del patrimonio del SENA o de otras entidades o de
        particulares puestos al servicio de la entidad, y que le hayan sido entregados para el desarrollo del
        objeto del contrato, por lo que son sujetos de control y vigilancia. En consecuencia deberán dar cuenta
        sobre la entrega de los bienes al supervisor y/o interventor del contrato respectivo y a los órganos
        de control fiscal y disciplinario, de ser procedente. <b>15)</b> Estar afiliado o afiliarse al Sistema
        General de Salud y Pensión, así como facilitar al SENA toda la documentación necesaria para la afiliación
        a la Administradora de Riesgos Laborales -ARL -, a cargo de la Entidad, en virtud de los artículos 2 y 6
        de la ley 1562 de 2012, previo a la ejecución del contrato. <b>16)</b> En cumplimiento de lo dispuesto en el
        parágrafo del artículo 23 de la ley 1150 de 2007 y del artículo 6 de la ley 1562 de 2012, el (la)
        CONTRATISTA deberá acreditar que se encuentra al día en el pago mensual de los aportes al sistema de
        seguridad social integral (salud, pensión y riesgos laborales ) y para la realización de cada pago
        derivado del mismo; estos pagos se acreditan únicamente por el sistema PILA o de Planilla Asistida o el
        que determine el Ministerio de Trabajo. Cuando corresponda o haya a lugar, el (la) contratista también
        debe acreditar el pago oportuno de los aportes al SENA, ICBF y cajas de Compensación Familiar. <b>17)</b>
        Presentar a la suscripción del contrato, los siguientes documentos: a) Registro Único Tributario –
        RUT (en caso de que haya cambiado de régimen). b) Constancia de afiliación al Plan Obligatorio de
        Salud a través de una Empresa Promotora de Salud (E.P.S) y al Sistema General de Pensiones. c)
        Formulario único de declaración de bienes y rentas diligenciado, d) Registrar al momento de la firma
        del contrato la información de hoja de vida del Sistema de Información y Gestión del Empleo Público –
        SIGEP, siguiendo el procedimiento señalado por el Grupo de Apoyo Administrativo Intercentros de la Regional
        Cauca. 18) Las demás necesarias para el cabal cumplimiento del objeto contractual.
        <b>PARAGRAFO PRIMERO:</b> Con la suscripción de este contrato, el SENA queda autorizado expresamente por el
        (la) Contratista para verificar sus antecedentes judiciales y la información que considere necesaria
        en los Sistemas de Información correspondientes, con el uso y las condiciones señaladas en las normas
        vigentes. <b>PARAGRAFO SEGUNDO:</b> Los derechos patrimoniales de autor de todos los documentos y desarrollos
        que produzca o realice el (la) CONTRATISTA en virtud de la ejecución del presente contrato, serán de
        propiedad del SENA; Si hay lugar a publicaciones se dará el respectivo reconocimiento de los derechos
        morales de autor. <b>PARAGRAFO TERCERO:</b>En caso de requerirse el desplazamiento del contratista para
        desarrollar actividades directamente relacionadas con el objeto del contrato, éste deberá informar a
        su supervisor con suficiente antelación, a fin que la supervisión adelante las gestiones necesarias
        para facilitar: a) gastos de transporte si su desplazamiento se efectúa dentro del departamento del Cauca
        y, b) gastos de transporte y gastos de viaje si su desplazamiento se efectúa por fuera del departamento
        del Cauca o del territorio nacional. La liquidación de los gastos aquí estipulados se hará de conformidad
        con lo establecido en el(los) acto(s) administrativo(s) que para el efecto sea(n) aplicable(s).
        <b>B) OBLIGACIONES DEL SENA:</b> Además de las obligaciones y
        estipulaciones señaladas en las Leyes 80 de 1993 y 1150 de 2007, así como las que se deriven del Decreto
        1082 de 2015, el SENA se obliga a: 1. Verificar previo a la suscripción del presente contrato los
        documentos requeridos para la contratación. 2. Pagar al (la) CONTRATISTA los honorarios, en la forma
        estipulada en este contrato. 3. Prestar la mayor colaboración necesaria al (la) CONTRATISTA para la
        correcta ejecución del objeto contratado. 4. Poner a disposición del (la) CONTRATISTA la información
        y/o documentación que requiera para la cabal ejecución del contrato. 5. Ejercer una correcta supervisión del
        contrato <b>CLÁUSULA QUINTA.-<span class="subraya">Garantía Única.</span></b>  El (La) CONTRATISTA se obliga a
        constituir a favor
        del SENA una garantía en una de las modalidades señaladas por el Decreto 1082 de 2015, para amparar
        el contrato, en las condiciones que establecen esas normas o las que las modifiquen, así:
        <b>Cumplimiento de las obligaciones surgidas del contrato estatal:</b> por un valor equivalente al 10%
        del valor total del mismo y con una vigencia igual a su plazo de ejecución y cuatro (4) meses más contados
        a partir de la expedición de la misma. Esta garantía ampara entre otros, los riesgos de que trata el Decreto 1082 de 2015.
        <b>PARAGRAFO.</b> Cuando se presente uno de los eventos de
        incumplimiento cubierto por la garantía, la entidad procederá a hacerla efectiva en los términos y con
        el procedimiento señalados por las normas vigentes. <b>CLÁUSULA SEXTA.-
        <span class="subraya">Imputación Presupuestal y autorización:</span></b> El valor de los honorarios del presente Contrato
        se hará con cargo al Certificado de Disponibilidad Presupuestal No. {{ $contract->CDP }} de 2018, expedido
        por el Grupo de Administrativo y Financiero Intercentros de la Regional Cauca del SENA. <b>CLÁUSULA SEPTIMA.-
        <span class="subraya">Supervisión:</span></b> El control y vigilancia del cabal cumplimiento y la completa y
        adecuada ejecución de este
        contrato y de cada una de sus obligaciones, así como de la calidad de los servicios prestados, estará a
        cargo del (la) {{ mb_convert_case($supervisor->cargo, MB_CASE_LOWER, "UTF-8") }} del Centro de Teleinformática
        y Producción Industrial de la Regional Cauca del SENA o de quien designe por escrito el subdirector
        del Centro de Formación del Servicio Nacional de Aprendizaje SENA. El Supervisor del Contrato además
        de velar por el cumplimiento de lo establecido en el artículo 4º de la Ley 80 de 1993, la Ley 1150 de 2007,
        los artículos 44, 83, 84, 86 y 118 de la Ley 1474 de 2011 (anticorrupción), debe cumplir las funciones
        señaladas en la Resolución No. 202 de 2014 ( manual de interventoría y supervisión)  o la que la modifique
        o remplace, así como las demás que surjan  por la naturaleza de este contrato, cuando se requiera cambio
        de supervisor deberá realizar el procedimiento señalado en el manual. <b>CLÁUSULA OCTAVA.-
            <span class="subraya">Multas y cláusula penal pecuniaria:</span></b> El incumplimiento de las obligaciones
        del contrato serán sancionados pecuniariamente de conformidad con las siguientes estipulaciones: <b>1)</b> En
        caso de que haya lugar a la declaratoria de incumplimiento o caducidad del contrato, el SENA podrá exigirle al
        (la) CONTRATISTA a título de tasación anticipada de perjuicios, una suma equivalente al diez por ciento
        (10%) del valor total del Contrato, lo cual no lo exime del pago de los perjuicios causados en exceso de
        dicha tasación. <b>2)</b> Si el incumplimiento es parcial por parte de él (la) CONTRATISTA, sin que
        dé lugar a la declaratoria del siniestro de incumplimiento o la de caducidad, éste reconocerá y pagará al
        SENA, una multa equivalente al 0,5% del valor del Contrato por cada día de retardo en el cumplimiento de
        la respectiva obligación, sin superar el diez (10%) del valor del contrato.  <b>PARAGRAFO  PRIMERO:</b>
        En la aplicación de la cláusula penal y de las multas se tendrá en cuenta el principio de proporcionalidad y
        se dará previamente cumplimiento al debido proceso, de conformidad con los artículos 17 de la ley 1150 de 2007
        y 86 de la Ley 1474 de 2011 (anticorrupción) y a lo previsto en el Decreto 1082 de 2015. <b>PARAGRAFO SEGUNDO:</b>
        En caso de que el (la) CONTRATISTA no pague el valor de la cláusula penal o de la multa dentro del término
        indicado en el acto administrativo correspondiente, el SENA hará efectivo su pago a través de la póliza de
        cumplimiento del contrato  o  la  deducirá  de  cualquier  cantidad  que  adeude  al  (la) CONTRATISTA,
        quien autoriza esta deducción  expresamente  con  la  firma  de este contrato. <b>CLÁUSULA NOVENA. -
            <span class="subraya">Caducidad:</span></b> Se adoptará  esta  medida  de  conformidad con lo  previsto
        en  el  artículo 18 de la  Ley  80  de 1993 y por las  causales  señaladas  en  esa  Ley  y  en  las  demás
        normas  vigentes. <b> CLÁUSULA  DECIMA. - <span class="subraya">Interpretación,   Modificación y
                terminación:</span></b> Son aplicables al presente contrato la terminación, modificación e interpretación
        unilateral, en los términos establecidos en la ley 80 de 1993 y demás normas vigentes.
        <b> CLÁUSULA DECIMA PRIMERA.- <span class="subraya">Terminación anticipada del contrato por mutuo acuerdo:</span></b>
        En cualquier momento, durante la vigencia del presente contrato, las partes podrán darlo por terminado
        anticipadamente de mutuo acuerdo, que constará por escrito en un acta suscrita por las partes, en la cual se
        indicará expresamente la fecha a partir de la cual acuerdan dar por terminado el contrato.
        <b>CLÁUSULA DECIMA SEGUNDA.- <span class="subraya">Cesión del Contrato:</span></b> El(la) CONTRATISTA no podrá
        ceder total ni parcialmente el presente contrato a otra persona natural o jurídica, salvo autorización previa
        y expresa del SENA. <b>CLÁUSULA DECIMA TERCERA.- <span class="subraya">Perfeccionamiento, Ejecución:</span></b>
        El presente contrato se entiende perfeccionado con la firma de las partes contratantes. Para su ejecución,
        el Registro Presupuestal correspondiente por parte del SENA, la constitución de la Garantía Única por parte
        del (la) CONTRATISTA y la aprobación de la misma por parte del SENA.  <b>CLÁUSULA DECIMA CUARTA.-
            <span class="subraya">Inhabilidades e Incompatibilidades, Conflicto de Intereses e Impedimentos:</span></b>
        El(la) CONTRATISTA declara bajo la gravedad del juramento que se entiende surtido con la firma de este contrato,
        que no se halla incurso(a) en ninguna de las causales de inhabilidad o incompatibilidad, conflicto de intereses
        o impedimento, señaladas en la Constitución, la Ley o la normatividad vigente; declara igualmente que se encuentra
        a paz y salvo con el Tesoro Nacional y con el SENA, o que adeudándole no han vencido los términos para su pago y
        que no es deudor del Estado, o que si es deudor ha suscrito acuerdo de pago vigente.
        <b>PARAGRAFO:</b> la AUTOCERTIFICACIÓN durante la ejecución contractual, en cualquier competencia de su
        propia instrucción a cargo, hace parte del conflicto de intereses e impedimentos del contratista.
        <b>CLÁUSULA DÉCIMA QUINTA.- <span class="subraya">Suspensión:</span></b> El plazo de ejecución del presente
        contrato podrá ser suspendido excepcionalmente de manera temporal, en las siguientes circunstancias:
        1. Por el mutuo acuerdo de las partes. 2. Fuerza mayor o caso fortuito o por causas debidamente justificadas,
        previa solicitud del (la) CONTRATISTA y autorización del CONTRATANTE. 3. Por informe de la supervisión del
        contrato ante un eventual incumplimiento del contrato, suspensión temporal que procederá mientras se adelanta
        el respectivo proceso administrativo. La suspensión se hará mediante acta suscrita por las partes en la cual
        se expresará su causa, el término de la suspensión y la fecha en que se reanuda la ejecución del contrato.
        <b>PARAGRAFO:</b> En caso de suspensión el (la) CONTRATISTA se obliga a informar tal evento al Asegurador y
        a ampliar las garantías, proporcionalmente al término que dure la misma. <b>CLAÚSULA DECIMASEXTA:
            <span class="subraya">Ausencia de relación laboral:</span></b> Las partes dejan constancia expresa que el
        presente contrato se suscribe en el marco del artículo 32 – numeral 3 de la Ley 80 de 1993 y demás normas
        concordantes y complementarias, por lo cual declaran que no conlleva relación laboral ni prestaciones sociales;
        su ejecución se hará sin subordinación alguna, gozando el contratista de independencia en la preparación y
        ejecución del contrato. <b>CLÁUSULA DECIMA SEPTIMA- <span class="subraya">Liquidación del contrato:</span></b>
        De conformidad con el artículo 217 del Decreto Ley 19 de 2012, que modificó el artículo 60 de la Ley 80 de 1993,
        no será liquidado el presente contrato cuando el Supervisor del mismo certifique a su finalización que el
        objeto y todas las obligaciones del contrato fueron cumplidas a satisfacción por el Contratista y que a
        éste se le canceló el valor total de los honorarios pactados, no quedando saldo alguno. En caso contrario,
        o cuando el contratista presente reclamación que impida considerar que las partes han terminado el contrato
        a paz y salvo, el presente contrato será liquidado de mutuo acuerdo entre las partes, dentro de los cuatro (4)
        meses siguientes a la fecha de su terminación por cualquier causa; en el evento de que las partes no lleguen
        a un acuerdo, el SENA procederá a liquidarlo unilateralmente en las condiciones y términos establecidos en
        los artículos 60 de la Ley 80 de 1993 y 11 de la ley 1150 de 2007.  <b>CLÁUSULA DECIMAOCTAVA.-
            <span class="subraya">Seguridad de la información y confidencialidad:</span></b> EL CONTRATISTA se obliga a
        conocer y aplicar la política y los lineamientos de Seguridad de la Información y Gestión de los activos de
        la Información que le entregue el SENA. Así mismo, EL CONTRATISTA se obliga a no revelar, durante la vigencia
        del este contrato, ni dentro de los dos (2) años siguientes a su expiración, la información confidencial de
        propiedad del SENA, de la que el CONTRATISTA tenga conocimiento con ocasión o para la ejecución de este
        contrato, sin el previo consentimiento escrito del mismo. Se considera información confidencial
        cualquier información técnica, financiera, comercial, estratégica y, en general, cualquier información
        relacionada con las funciones, programas, planes, proyectos y/o actividades del SENA. <b>CLÁUSULA DECIMA NOVENA:
            <span class="subraya">Indemnidad.</span></b> El (la) CONTRATISTA se obliga a mantener al SENA libre
        de cualquier daño o perjuicio originado en reclamaciones, demandas, acciones legales y costos que puedan
        surgir por daños o lesiones a terceros, ocasionados por las actuaciones del  (la)  CONTRATISTA,  sus
        agentes  o  sus dependientes, durante  la ejecución del objeto y las obligaciones del contrato.
        <b>CLÁUSULA VIGESIMA. <span class="subraya">Domicilio:</span></b> Para todos los efectos legales y fiscales,
        las partes fijan como domicilio contractual la ciudad de Popayán.
        <b>CLÁUSULA VIGÉSIMA PRIMERA: <span class="subraya">Lugar de Ejecución:</span></b> El lugar de ejecución del
        presente contrato será en el o en los Municipios del Departamento del Cauca donde se programe o designe.



        <br>
        <br>

        <p style="text-align:left">
            Se firma el presente contrato en la ciudad de Popayán Cauca, el  _________________________________
        </p>
        <br>
        <div>
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
        </div>
        <br>

        <p style="font-size: 11px; clear:both">
            CDP: {{ $contract->CDP }} <br>
            Valor: ${{ number_format($contract->value, 0, ',', '.')}} <br>
            <br>
            Proyecto: Andres Urrego Ruiz - Apoyo Jurídico <br>
            Reviso: Marcela Ausecha S. - Apoyo administrativo y jurídico <br>

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
