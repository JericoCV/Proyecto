<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Calificaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            font-size: 10pt;
            /* Disminuir el tamaño de la fuente general */
        }

        .report-card {
            width: 170mm;
            padding: 10mm;
            /* Reducir el padding */
            box-sizing: border-box;
            border: 1px solid #000;
        }

        .header {
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .logo {
            width: 10%;
            /* Reducir el tamaño del logo */
            height: auto;
            display: inline-block;
            margin-right: 10%;
        }

        .school-info {
            text-align: center;
            display: inline-block;
            width: 58%;
            /* Ajusta el tamaño para que ocupe el espacio restante */
        }

        .school-info h1 {
            font-size: 18px;
            /* Reducir tamaño del título */
            color: #003399;
            margin: 0;
        }

        .school-info p {
            font-size: 10px;
            /* Reducir tamaño del texto */
            margin: 0;
        }

        .date {
            font-size: 10px;
            text-align: right;
            display: inline-block;
            width: 20%;
            /* Ajusta el tamaño para que no se sobreponga al texto central */
            text-align: right;
        }

        .title {
            text-align: center;
            margin-bottom: 15px;
        }

        .title h2 {
            font-size: 20px;
            margin: 5px 0;
        }

        .scores-section {
            margin-bottom: 15px;
        }

        .scores-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .scores-table th,
        .scores-table td {
            border: 1px solid #000;
            padding: 6px;
            /* Reducir padding de las celdas */
            text-align: center;
            font-size: 10pt;
        }

        .scores-table th {
            background-color: #003399;
            color: #fff;
            font-size: 12px;
            /* Reducir tamaño de la cabecera */
        }

        .final-score-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .status {
            text-align: center;
        }

        .status-box {
            width: 70px;
            padding: 8px;
            border: 1px solid #000;
            font-size: 12px;
            /* Reducir tamaño de la fuente */
            font-weight: bold;
        }

        .pass {
            background-color: #003399;
            color: #fff;
        }

        .fail {
            background-color: #fff;
            color: #000;
        }

        .final-score {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .evaluation-system {
            margin-top: 20px;
            font-size: 10pt;
            /* Reducir el tamaño de la fuente */
        }

        /* Asegurar que no haya saltos de página dentro de las secciones */
        .report-card,
        .header,
        .title,
        .scores-section,
        .final-score-section,
        .evaluation-system {
            page-break-inside: avoid;
        }

        /* Establecer el contenedor para evitar el desbordamiento de contenido */
        .report-card {
            overflow: hidden;
        }
    </style>

</head>

<body>
    <div class="report-card">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ public_path('image/logo.jpeg') }}" alt="ILC Logo" class="logo">
            <div class="school-info">
                <h1>INSTITUTO DE LENGUA Y CULTURA</h1>
                <p>AMERICAN & BRITISH ENGLISH SCHOOL</p>
                <p>Get set to conquer the world</p>
            </div>
            <p class="date">{{ now()->format('F jS, Y') }}</p>
        </div>

        <!-- Title Section -->
        <div class="title">
            <h2>REPORT CARD</h2>
            <p><strong>PRE-TEENS XI</strong></p>
            <p>FULL NAME: <span class="student-name">{{ $student->fullname }}</span></p>
        </div>

        <!-- Scores Section -->
        <div class="scores-section">
            <h3>ENGLISH AS A SECOND LANGUAGE</h3>
            <h3>Month: {{$month}}</h3>
            <table class="scores-table">
                <thead>
                    <tr>
                        <th>ASPECT</th>
                        <th>SCORES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formattedGrades as $grade)
                    <tr>
                        <td>{{ $grade['activity'] }}</td>
                        <td>{{ $grade['grade'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Final Score Section -->
        <div class="final-score-section">
            <div class="status">
                <div class="status-box {{ $passClass }}" id="pass-box">PASS</div>
                <div class="status-box {{ $failClass }}" id="fail-box">FAIL</div>
            </div>
            <div class="final-score">
                FINAL SCORE
                <div>{{ round($average) }}</div>
            </div>
        </div>

        <!-- Evaluation System -->
        <div class="evaluation-system">
            <h4>SISTEMA DE EVALUACIÓN:</h4>
            <p>
                La evaluación es permanente desde el primer día de clases. La nota mínima aprobatoria es de 80 y la nota
                máxima es de 100. Esta nota se obtendrá al promediar las notas parciales y el examen final.
            </p>
        </div>
    </div>
</body>

</html>