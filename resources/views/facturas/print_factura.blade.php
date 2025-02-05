<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura Médica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 40px;
            position: relative;
        }
        .header, .footer {
            text-align: center;
        }
        .logo {
            text-align: left;
        }
        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }
        .watermark {
            position: fixed;
            top: 30%;
            left: 15%;
            width: 70%;
            text-align: center;
            opacity: 0.1;
            z-index: -1;
        }
        .watermark img {
            width: 300px;
            height: auto;
        }
    </style>
</head>
<body>

    <!-- Marca de Agua -->
    <div class="watermark">
        <img src="{{ public_path('storage/images/logopcmh.png') }}" alt="Marca de Agua">
    </div>

    <!-- Encabezado con Logo -->
    <table width="100%">
        <tr>
            <td class="logo">
                <img src="{{ public_path('storage/images/logopcmh.png') }}" alt="Hospital Isidro Ayora" width="80">
            </td>
            <td class="header">
                <h1>Factura Médica</h1>
                <p><strong>Fecha de emisión:</strong> {{ now()->format('d/m/Y H:i') }}</p>
            </td>
        </tr>
    </table>

    <hr>

    <!-- Información del Paciente -->
    <h2 class="title">Información del Paciente</h2>
    <p><strong>Paciente:</strong> {{ $factura->paciente->apellidos }} {{ $factura->paciente->nombres }}</p>
    <p><strong>Número de Cédula:</strong> {{ $factura->paciente->ci }}</p>
    <p><strong>Fecha de Pago:</strong> {{ \Carbon\Carbon::parse($factura->fecha_pago)->format('d/m/Y') }}</p>

    <hr>

    <!-- Especialidad Médica -->
    <h2 class="title">Especialidad Médica</h2>
    <p><strong>Especialidad:</strong> {{ $factura->doctor->especialidad }}</p>

    <hr>

    <!-- Detalle de Factura -->
    <h2 class="title">Descripción del Servicio</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ strip_tags($factura->descripcion) }}</td>
                <td>$ {{ number_format($factura->monto, 2, '.', ',') }}</td>
            </tr>
        </tbody>
    </table>

    <br>

    <!-- Total -->
    <h3 style="text-align:right;">Total a Pagar: <span style="color:green;">$ {{ number_format($factura->monto, 2, '.', ',') }}</span></h3>

    <!-- Pie de página -->
    <div class="footer">
        <hr>
        <p>&copy; Hospital Isidro Ayora - Todos los derechos reservados</p>
    </div>

</body>
</html>
