@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Emergencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Triaje</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emergencias.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('emergencias.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('emergencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
