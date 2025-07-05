@extends('layouts.app')

@section('template_title')
    Emergencias
@endsection
@section('content_header')
    <x-adminlte-small-box title="Emergencias" text="Listado de triajes." icon="fas fa-h-square" />
@stop
@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Emergencia') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('emergencias.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

                                        <th>Paciente Id</th>
                                        <th>Frecuencia Cardiaca Alta</th>
                                        <th>Frecuencia Cardiaca Baja</th>
                                        <th>Frecuencia Respiratoria</th>
                                        <th>Presion Arterial</th>
                                        <th>Saturacion Oxigeno</th>
                                        <th>Nivel Conciencia</th>
                                        <th>Categoria</th>
                                        <th>Puntaje Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emergencias as $emergencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $emergencia->paciente->nombres }}
                                                {{ $emergencia->paciente->apellidos }}<br>
                                                <small><strong>C.I.:</strong>
                                                    {{ $emergencia->paciente->ci }}</small><br>
                                                <small><strong>Fecha. Nacimiento.:</strong>
                                                    {{ \Carbon\Carbon::parse($emergencia->paciente->fecha_nacimiento)->format('d/m/Y') }}</small><br>
                                                <small><strong>Género:</strong>
                                                    {{ ucfirst($emergencia->paciente->genero) }}</small>
                                            </td>
                                            <td>{{ $emergencia->frecuencia_cardiaca_alta }}</td>
                                            <td>{{ $emergencia->frecuencia_cardiaca_baja }}</td>
                                            <td>{{ $emergencia->frecuencia_respiratoria }}</td>
                                            <td>{{ $emergencia->presion_arterial }}</td>
                                            <td>{{ $emergencia->saturacion_oxigeno }}</td> --}}
        {{-- Categoría de triaje con color --}}
        {{-- <td>{{ $emergencia->nivel_conciencia }}</td>
                                            <td>
                                                <span
                                                    class="badge 
                                                    @if ($emergencia->categoria == 'Rojo') bg-danger
                                                    @elseif($emergencia->categoria == 'Naranja') bg-orange text-dark
                                                    @elseif($emergencia->categoria == 'Amarillo') bg-warning
                                                    @else bg-success @endif">
                                                    {{ $emergencia->categoria }}
                                                </span>
                                            </td> --}}
        {{-- Puntaje Total --}}
        {{-- <td>{{ $emergencia->puntaje_total }}</td>

                                            <td>
                                                <form action="{{ route('emergencias.destroy', $emergencia->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('emergencias.show', $emergencia->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('emergencias.edit', $emergencia->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $emergencias->links() !!}
            </div>
        </div> --}}
        {{-- Datables que muestran los resultados de triajes --}}
        {{-- Setup data for datatables --}}
        @hasanyrole('administrator')
            <div class="card">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('emergencias.create') }}" class="btn btn-primary btn-lg active" data-mdb-ripple-init
                            role="button" aria-pressed="true">
                            Crear triaje del paciente.
                        </a>
                    </div>

                    <hr>
                @endhasanyrole
                @php
                    $heads = [
                        'ID',
                        'Paciente Id',
                        'Frecuencia Cardiaca Alta',
                        'Frecuencia Cardiaca Baja',
                        'Frecuencia Respiratoria',
                        'Presion Arterial',
                        'Saturacion Oxigeno',
                        'Nivel Conciencia',
                        'Categoria',
                        'Puntaje Total',
                        ['label' => 'Actions', 'no-export' => true, 'width' => 15],
                    ];

                    $btnEdit = '';
                    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';

                    $btnDetails = '';
                    $btnPrint = '';

                    // Configuración para habilitar los botones de exportación

                    $config = [
                        'dom' => 'Blfrtip', // Mover los botones de exportación a la parte superior
                        'buttons' => ['copy', 'csv', 'excel', 'pdf', 'print'],
                        'responsive' => true,
                    ];

                @endphp
                {{-- Div para los botones de exportación --}}
                {{-- {{-- listar los datos de los examenes con datables --}}
                <x-adminlte-datatable id="table200" :heads="$heads" head-theme="light" :config="$config" striped
                    hoverable bordered compressed>

                    @php $contador = 1; @endphp
                    @if (Auth::check() && Auth::user()->hasRole('administrator')) {{-- Verifica que el usuario está autenticado y tiene relación con secretaria --}}
                        @foreach ($emergencias as $emergencia)
                            <td>{{ ++$i }}</td>
                            <td>{{ $emergencia->paciente->nombres }}
                                {{ $emergencia->paciente->apellidos }}<br>
                                <small><strong>C.I.:</strong>
                                    {{ $emergencia->paciente->ci }}</small><br>
                                <small><strong>Fecha. Nacimiento.:</strong>
                                    {{ \Carbon\Carbon::parse($emergencia->paciente->fecha_nacimiento)->format('d/m/Y') }}</small><br>
                                <small><strong>Género:</strong>
                                    {{ ucfirst($emergencia->paciente->genero) }}</small>
                            </td>
                            <td>{{ $emergencia->frecuencia_cardiaca_alta }}</td>
                            <td>{{ $emergencia->frecuencia_cardiaca_baja }}</td>
                            <td>{{ $emergencia->frecuencia_respiratoria }}</td>
                            <td>{{ $emergencia->presion_arterial }}</td>
                            <td>{{ $emergencia->saturacion_oxigeno }}</td>
                            {{-- Categoría de triaje con color --}}
                            <td>{{ $emergencia->nivel_conciencia }}</td>
                            <td>
                                <span
                                    class="badge 
                                                    @if ($emergencia->categoria == 'Rojo') bg-danger
                                                    @elseif($emergencia->categoria == 'Naranja') bg-orange text-dark
                                                    @elseif($emergencia->categoria == 'Amarillo') bg-warning
                                                    @else bg-success @endif">
                                    {{ $emergencia->categoria }}
                                </span>
                            </td>
                            {{-- Puntaje Total --}}
                            <td>{{ $emergencia->puntaje_total }}</td>

                            <td>
                                <form action="{{ route('emergencias.destroy', $emergencia->id) }}" method="POST">
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('emergencias.show', $emergencia->id) }}"><i
                                            class="fa fa-fw fa-eye"></i>
                                        {{ __('Show') }}</a>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('emergencias.edit', $emergencia->id) }}"><i
                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                        {{ __('Delete') }}</button>
                                </form>
                            </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-danger">
                                No tienes permisos para acceder a este contenido.
                            </td>
                        </tr>
                    @endif
                </x-adminlte-datatable>
                <hr>

            </div>
        @endsection
