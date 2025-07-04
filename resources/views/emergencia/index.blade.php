@extends('layouts.app')

@section('template_title')
    Emergencias
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
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
        </div>
    </div>
@endsection
