<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; margin: 40px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table, .table th, .table td { border: 1px solid black; padding: 8px; text-align: left; }
        .footer { margin-top: 20px; text-align: center; }
    </style>
    
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 40px;
            position: relative;
        }
    
        .watermark {
            position: fixed;
            top: 30%;
            left: 15%;
            width: 70%;
            text-align: center;
            opacity: 0.2; /* Controlar la transparencia */
            z-index: -1;
        }
    
        .watermark img {
            width: 400px; /* Ajustar el tamaño */
            height: auto;
        }
    </style>
    
    <div class="watermark">
        <img src="{{ public_path().$image }}" alt="Marca de Agua">
    </div>

    <h1 class="title">Reporte Historial Médico del Paciente</h1>
    <hr>
    <h2 class="title">Información del Paciente </h2>
    <p><strong>Paciente:</strong> {{ $historial->paciente->apellidos }} {{ $historial->paciente->nombres }}</p>
    <p><strong>Fecha de nacimiento:</strong> {{ $historial->paciente->fecha_nacimiento }}</p>
    <p><strong>Alergias:</strong> {{ $historial->paciente->alergias }}</p>
    <hr>
    <h2 class="title">Información del Doctor</h2>
    <p><strong>Doctor:</strong> {{ $historial->doctor->apellidos }} {{ $historial->doctor->nombres }}</p>
    <p><strong>Especialidad:</strong> {{ $historial->doctor->especialidad }}</p>
    <p><strong>Licencia Médica:</strong> {{ $historial->doctor->licencia_medica }}</p>
    <hr>
    <h2 class="title">Información del diagnóstico</h2>
    <p><strong>Fecha de diagnóstico:</strong> {{ $historial->fecha_visita }}</p>
    <p><strong>Detalles del diagnóstico:</strong> {{strip_tags($historial->detalle)}}</p>

    <div class="footer">
        <hr>
        <p><strong>Fecha de generación del reporte:</strong> {{ now()->format('d/m/Y H:i') }}</p>
        <div>&copy; Hospital Isidro Ayora</div>
    </div>
       
</body>

</html>

          

        

           
          

