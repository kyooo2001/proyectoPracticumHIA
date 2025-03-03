@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Hospital Isidro Ayora')


@section('content_header_subtitle', 'Bienvenido a los servicios del Hospital Isidro Ayora.')

{{-- Content body: main page content --}}


@section('content_body')
{{-- On the blade file... --}}


{{--
<x-adminlte-small-box title="Panel Principal " text="Bienvenido {{Auth::user()->email}}. Con rol {{Auth::user()->roles->pluck('name')->first()}}." icon="fas fa-h-square"/>
--}}
    <x-adminlte-small-box 
    title="Panel Principal" 
    text="Bienvenido, {{ Auth::user()->name }} ; Email: ({{ Auth::user()->email }}) - Rol: {{ Auth::user()->roles->pluck('name')->first() }}" 
    icon="{{ getRoleIcon(Auth::user()->roles->pluck('name')->first()) }}" 
    theme="gradient-lightblue" 
    {{--url="#" 
    url-text="Más información"--}}
/>

@php
    function getRoleIcon($role) {
        switch ($role) {
            case 'administrator': return 'fas fa-user-shield';
            case 'doctor': return 'fas fa-user-md';
            case 'secretaria': return 'fas fa-user-edit';
            case 'paciente': return 'fas fa-user-injured';
            default: return 'fas fa-user';
        }
    }
@endphp


{{-- Un role requiere vistas--}}
@role('administrator')
<x-adminlte-card title="Estadísticas Totales de los Usuarios Registrados" theme="gray" icon="fas fa-chart-bar" collapsible>
    <canvas id="userChartTotal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</x-adminlte-card>
@endrole
@role('administrator|doctor|secretaria')
<x-adminlte-info-box title="{{$total_eventos}}" text="Reservas médicas" icon="fas fa-lg fa-calendar-alt text-info"
    theme="warning" icon-theme="white"/>  
@endrole 

@role('administrator|doctor|secretaria')

<x-adminlte-card title="Estadísticas de Reservas Médicas por Mes" theme="warning" icon="fas fa-chart-bar" collapsible>
    <canvas id="eventChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</x-adminlte-card>
@endrole

@role('administrator')
<x-adminlte-info-box title="{{$total_usuarios}}" text="Usuarios registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-info" icon-theme="white"/>
@endrole
@role('administrator')
<x-adminlte-card title="Estadísticas de Usuarios registrados" theme="info" icon="fas fa-chart-bar" collapsible>
    <canvas id="userChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</x-adminlte-card>
@endrole

@role('administrator')    
<x-adminlte-info-box title="{{$total_secretarias}}" text="Usuarios secretaria registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-primary" icon-theme="white"/>   
@endrole

@role('administrator') 
<x-adminlte-info-box title="{{$total_pacientes}}" text="Pacientes registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-teal" icon-theme="white"/> 
@endrole 

@role('administrator') 

<x-adminlte-card title="Estadísticas de Pacientes registrados" theme="teal" icon="fas fa-chart-bar" collapsible>
    <canvas id="patientChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</x-adminlte-card>
@endrole 
{{-- Varios roles requieren vistas--}}
@hasanyrole('administrator|doctor')
<x-adminlte-info-box title="{{$total_doctores}}" text="Doctores" icon="fas fa-lg fa-user-md text-primary"
    theme="gradient-success" icon-theme="white"/>  
@endhasanyrole 
@role('administrator') 
<x-adminlte-info-box title="{{$total_consultorios}}" text="Consultorios" icon="fas fa-lg fa-hospital-alt text-primary"
    theme="gradient-secondary" icon-theme="white"/>  
@endrole 


@role('administrator')
<x-adminlte-info-box title="{{$total_horarios}}" text="Horarios" icon="fas fa-lg fa-calendar-alt text-purple"
    theme="gradient-purple" icon-theme="white"/>  
@endrole 



{{-- Setup data for datatables to horarios --}}

@role('administrator|usuario|doctor')
      {{-- TITULO Calendario --}}
      
                
        <x-adminlte-card theme="info" theme-mode="outline">
          <strong> Consulta los horarios disponibles de nuestros doctores. </strong>
         </x-adminlte-card>

      {{-- Dropdown para seleccionar consultorio --}}
      <div class="form-group">
        <label for="consultorio-select">Seleccionar Consultorio:</label>
        <select id="consultorio-select" class="form-control">
          <option value="">-- Seleccione un consultorio --</option>
          @foreach($consultorios as $consultorio)
            <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }}</option>
          @endforeach
        </select>
      </div>
      <button id="filtrar-horarios" class="btn btn-success">Filtrar</button>
      <br>
      <br>
  
      {{-- Tabla de horarios --}}
      <div class="card">
        <div class="card-body">
          <br>
          @php
            $heads = [
                'Hora',
                'Lunes',
                'Martes',
                'Miércoles',
                'Jueves',
                'Viernes',
                'Sábado',
                'Domingo',
            ];
  
            $config = [
                'dom' => 'Blfrtip',
                'buttons' => ['copy', 'csv', 'excel', 'pdf', 'print'],
                'responsive' => true,
                'autoWidth' => true,
            ];
          @endphp
  
          <x-adminlte-datatable id="table2" :heads="$heads" head-theme="light" :config="$config" striped hoverable bordered compressed>
            {{-- recorrido de horarios --}}
            @php
              $horas = ['08:00 - 09:00', '10:00 - 11:00', '12:00 - 13:00', '14:00 - 15:00','16:00 - 17:00'];
              $semana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            @endphp
  
            @foreach ($horas as $hora)
              @php
                list($hora_inicio, $hora_final) = explode(' - ', $hora);
              @endphp
              <tr>
                <td>{{ $hora }}</td>
                @foreach ($semana as $dia)
                  @php
                    $nombre_doctor = '';
                    foreach ($horarios as $horario) {
                      if (
                          strtoupper($horario->dia) === strtoupper($dia) &&
                          $horario->consultorio_id == request('consultorio_id') && // Filtrar por consultorio seleccionado
                          new \DateTime($hora_inicio) >= new \DateTime($horario->hora_inicio) &&
                          new \DateTime($hora_final) <= new \DateTime($horario->hora_final)
                      ) {
                        $nombre_doctor = $horario->doctor->nombres . ' ' . $horario->doctor->apellidos;
                        break;
                      }
                    }
                  @endphp
                  <td>{{ $nombre_doctor }}</td>
                @endforeach
              </tr>
            @endforeach
          </x-adminlte-datatable>
        </div>
      </div>
    </div>
  </div>
  {{--Calendariiioooo--}}
  
  <div class="card">
    <div class="card-header">
       
        <div class="card-tools">

          {{-- Dropdown para seleccionar doctor 
      <div class="form-group">
        <label for="doctor-select">Seleccionar Doctor:</label>
        <select id="doctor-select" class="form-control">
          <option value="">-- Seleccione un doctor --</option>
          @foreach($doctores as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->nombres. ' '.$doctor->apellidos }}</option>
          @endforeach
        </select>
      </div>
      <button id="filtrar-horarios" class="btn btn-success">Filtrar</button>
      <br> --}}
     

            {{-- Botón modal para citas médicas --}}
            <x-adminlte-button class="float-right" label="Reservar nueva cita médica" theme="primary" icon="fas fa-calendar-check" data-toggle="modal" data-target="#modalPurple"/>
        </div>
    </div>
        {{-- Calendario FullCalendar --}}
        <div class="card-body">
        <x-adminlte-card title="Calendario de citas médicas" theme="primary" icon="fas fa-calendar-alt" collapsible maximizable>
            <div id="calendar" style="min-height: 500px; height: auto; max-height: 800px; max-width: 100%;"></div>
        </x-adminlte-card>
        </div>
    </div>
        {{-- Botón modal para citas médicas --}}
        <x-adminlte-modal id="modalPurple" title="Reserve una cita médica" theme="primary" icon="fas fa-calendar-check" size='lg' enable-animations>
            <form action="{{ route('home.store') }}" method="POST">
                @csrf
                {{-- Formulario cita médica --}}
                <div class="form-group">
                    <x-adminlte-select name="doctor_id" id="doctor_id" label="Doctor" placeholder="Doctores" label-class="text-lightblue" value="{{ old('doctor_id') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-calendar-alt text-warning"></i>
                            </div>
                        </x-slot>
                        <option value="">Seleccione un doctor</option>
                        @foreach($doctores as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->nombres . ' ' . $doctor->apellidos. ' - ' . $doctor->especialidad }}</option>
                        @endforeach
                    </x-adminlte-select>
                    {{-- Mensaje validacion--}}
                      @error('doctor_id')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                </div>
                
                {{-- Formulario para fecha de reserva--}}
                <div class="form-group">
                  <x-adminlte-input type="date" name="fecha_reserva" id="fecha_reserva" label="Fecha de Reserva" placeholder="Seleccione una fecha" label-class="text-lightblue" value="{{ old('fecha_reserva') }}">
                      <x-slot name="prependSlot">
                          <div class="input-group-text">
                              <i class="fas fa-calendar-alt text-warning"></i>
                          </div>
                      </x-slot>
                     
                          
                  </x-adminlte-input>
                  {{-- Mensaje validacion--}}
                    @error('fecha_reserva')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
              </div>
              {{-- Formulario para hora de reserva --}}
             
              <div class="form-group">
                  <x-adminlte-input type="time" name="hora_reserva" id="hora_reserva" label="Hora de Reserva" placeholder="Seleccione una hora" label-class="text-lightblue" value="{{ old('hora_reserva') }}">
                      <x-slot name="prependSlot">
                          <div class="input-group-text">
                              <i class="fas fa-clock text-warning"></i>
                          </div>
                      </x-slot>
                      
                  </x-adminlte-input>
                  {{-- Mensaje validacion--}}
                    @error('hora_reserva')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
              </div>
                      {{-- Botón para guardar --}}
                      <div>
                        <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-calendar-check"/>
                      </form>
                    </x-adminlte-modal>
                  </div>
                    {{--Boton ver mis citas medicas--}}
                <div class="d-flex justify-content-center mt-4">
                    <x-adminlte-button 
                        label="Ver mis citas médicas" 
                        theme="primary" 
                        icon="fas fa-calendar-check" 
                        class="btn-lg shadow-lg"
                        onclick="window.location.href='{{ url('/reservas/listaReserva', auth()->user()->id) }}'"
                    />
                </div>
                <br>

@endrole 
@role('administrator|doctor')
{{-- Tabla reservas Doctor --}}
      {{-- On the blade file... --}}
      @if ($message = Session::get('mensaje'))
      <script> alert('{{$message}}');</script>
        
      @endif

      {{-- Setup data for datatables --}}

      <div class="card">
        <div class="card-body">
        
          <x-adminlte-card theme="teal" theme-mode="outline">
            <strong> Listado de reservas </strong>
           </x-adminlte-card>
         
          <br>
        @php
          $heads = [
              'ID',
              'Usuario',
              'Fecha de reserva',
              'Hora de reservada',
              
              //['label' => 'Actions', 'no-export' => true, 'width' => 15],
              
              
          ];

        
          $btnEdit = '';
          $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
          
          $btnDetails = '';
                        
        
                    

          // Configuración para habilitar los botones de exportación
          
          $config = [
            
              'dom' => 'Blfrtip',  // Mover los botones de exportación a la parte superior
              'buttons' => [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ],
              'responsive' => true,
              'autoWidth' => true,
          
          ];
        
          @endphp
      {{-- Div para los botones de exportación --}}
          {{-- Minimal example / fill data using the component slot --}}
          <x-adminlte-datatable id="table14" :heads="$heads" head-theme="light" :config="$config"
          striped hoverable bordered compressed>
          @php $contador = 1; @endphp
              @foreach($eventos as $evento)
              {{--Trae solo el usuario con relacion de doctor--}}
                    @if(auth::user()->doctor && auth::user()->doctor->id == $evento->doctor_id)
                      <tr>
                          <td>{{$contador++}}</td>
                          <td>{{$evento->user->name}}</td> 
                        
                          <td>{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                          <td>{{\Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>                               
                      </tr>
                    @endif
              @endforeach
              
          </x-adminlte-datatable>
        </div>
    </div>

@endrole

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
       
{{-- Consultar reservas de los consultorios --}}
        <script>
            $(document).ready(function() {
            // Manejar evento de filtrado
            $('#filtrar-horarios').on('click', function() {
                const consultorioId = $('#consultorio-select').val();
        
                if (consultorioId) {
                // Redirigir a la misma página con el consultorio seleccionado
                window.location.href = `?consultorio_id=${consultorioId}`;
                } else {
                alert('Por favor seleccione un consultorio.');
                }
            });
            });
        </script>
      


          {{-- FullCalendar --}}
{{-- FullCalendar --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @foreach($eventos as $evento)
                {
                    title: '{{ $evento->title }}',
                    start: '{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d\TH:i:s') }}',
                    end: '{{ \Carbon\Carbon::parse($evento->end)->format('Y-m-d\TH:i:s') }}',
                    color: '{{ $evento->color }}',
                    display: 'block' // Evitar que la hora se muestre automáticamente en el título
                }@if (!$loop->last),@endif
                @endforeach
            ],
            eventTimeFormat: { 
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false
            },
            displayEventTime: false, // No mostrar la hora en el título del evento
        });
        calendar.render();
    });
</script>
         {{-- Script para validación de fecha y hora de atencion --}}
        <script>
          document.addEventListener('DOMContentLoaded', function() {
              const fechaReservaInput = document.getElementById('fecha_reserva');
              const horaReservaInput = document.getElementById('hora_reserva');
      
              // Escuchar evento en el campo de fecha de reserva
              fechaReservaInput.addEventListener('change', function() {
                  let selectedDate = this.value; // Obtiene fecha seleccionada
                  // Obtener la fecha actual
                  let today = new Date().toISOString().slice(0, 10);
      
                  // Verifica si la fecha seleccionada es anterior a la actual
                  if (selectedDate < today) {
                      // Si es cierto, establece fecha seleccionada a null
                      this.value = null;
                      alert('No se puede seleccionar una fecha pasada');
                  }
              });
      
              // Escuchar evento en el campo de hora de reserva
                    horaReservaInput.addEventListener('change', function() {
                        let selectedTime = this.value; // Obtiene la hora seleccionada
                        let startTime = '08:00';
                        let endTime = '17:00';

                        // Verifica si la hora seleccionada está fuera del horario de atención
                        if (selectedTime < startTime || selectedTime > endTime) {
                            // Si es cierto, establece hora seleccionada a null
                            this.value = null;
                            alert('La hora de reserva debe estar entre las 08:00 y las 17:00');
                        } else {
                            // Verifica si los minutos son diferentes de 00
                            let minutes = selectedTime.split(':')[1];
                            if (minutes !== '00') {
                                this.value = null;
                                alert('La hora de reserva debe ser en horas completas (por ejemplo, 08:00, 09:00, etc.)');
                            }
                        }
                    });
                });
               
          </script>

                  {{--Alerta con sweetAlert 2--}}
                  @if ($errors->any())
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Error',
                                  text: '{{ $errors->first() }}',
                              }).then((result) => {
                                  if (result.isConfirmed) {
                                      $('#modalPurple').modal('show');
                                  }
                              });
                          });
                      </script>
                  @endif
                  {{--Estadisticas usuarios--}}
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var ctx = document.getElementById('userChart').getContext('2d');
                
                        var labels = {!! json_encode($labels) !!};
                        var data = {!! json_encode($data) !!};
                
                        var userChart = new Chart(ctx, {
                            type: 'bar', // Tipo de gráfico (puede ser 'line', 'bar', 'pie', etc.)
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Usuarios Registrados', // Etiquetas para el eje X
                                    data: data, // Datos para el gráfico
                                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                                    borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#c82333'],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    x: {
                                        gridLines: { display: false }
                                    },
                                    y: {
                                        beginAtZero: true,
                                        gridLines: { display: false }
                                    }
                                }
                            }
                        });
                    });
                </script>

                {{--Estadisticas pacientes--}}
                <script>
                  $(function () {
                      var ctx = document.getElementById('patientChart').getContext('2d');
                      var patientChart = new Chart(ctx, {
                          type: 'bar', // Tipo de gráfico (puede ser 'line', 'bar', 'pie', etc.)
                          data: {
                              labels: {!! json_encode($labels) !!}, // Etiquetas para el eje X
                              datasets: [{
                                  label: 'Pacientes registrados',
                                  data: {!! json_encode($data) !!}, // Datos para el gráfico
                                  backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                                    borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#c82333'],
                                    borderWidth: 1
                              }]
                          },
                          options: {
                              responsive: true,
                              maintainAspectRatio: false,
                              scales: {
                                  xAxes: [{
                                      gridLines: {
                                          display: false,
                                      }
                                  }],
                                  yAxes: [{
                                      gridLines: {
                                          display: false,
                                      }
                                  }]
                              }
                          }
                      });
                  });
              </script>

              {{--Estadisticas reservas medicas--}}
              <script>
                $(function () {
                    var ctx = document.getElementById('eventChart').getContext('2d');
                    var eventChart = new Chart(ctx, {
                        type: 'bar', // Tipo de gráfico (puede ser 'line', 'bar', 'pie', etc.)
                        data: {
                            labels: {!! json_encode($labels) !!}, // Etiquetas para el eje X
                            datasets: [{
                                label: 'Reservas médicas',
                                data: {!! json_encode($data) !!}, // Datos para el gráfico
                                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                                    borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#c82333'],
                                    borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }],
                                yAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }]
                            }
                        }
                    });
                });
            </script>
        {{--Estadisticas  TOTALES--}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById('userChartTotal').getContext('2d');

                var totalUsuarios = {{ $total_usuarios ?? 0 }};
                var totalSecretarias = {{ $total_secretarias ?? 0 }};
                var totalPacientes = {{ $total_pacientes ?? 0 }};
                var totalDoctores = {{ $total_doctores ?? 0 }};

                console.log("Usuarios:", totalUsuarios);
                console.log("Secretarias:", totalSecretarias);
                console.log("Pacientes:", totalPacientes);
                console.log("Doctores:", totalDoctores);

                var userChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Usuarios', 'Secretarias', 'Pacientes', 'Doctores'],
                        datasets: [{
                            label: 'Cantidad',
                            data: [totalUsuarios, totalSecretarias, totalPacientes, totalDoctores],
                            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                            borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#c82333'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>

@endpush