@extends('layouts.app')

@section('title', 'Módulo 1: Búsqueda de Ingeniero - Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Validación CIP</li>
                        </ol>
                    </nav>
                    <h1 class="category-name">Módulo 1: Búsqueda de Ingeniero - Academia CIP</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-2 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm border-0" style="border-radius: 12px;">
                        <div class="card-body p-4 p-sm-5">

                            <div class="text-center mb-4">
                                <span class="badge badge-primary px-3 py-1 text-uppercase mb-2" style="letter-spacing: 1px;">
                                    CIP Sede Cusco
                                </span>
                                <h3 class="font-weight-bold text-dark mb-1">
                                    Consulta de Colegiatura
                                </h3>
                                <p class="text-muted small mb-0">
                                    Consulta y validación de estado de colegiatura mediante API de Laravel
                                </p>
                            </div>

                            <form id="formBuscarCIP" novalidate>
                                <div class="form-group">
                                    <label for="codigoCIP" class="font-weight-bold text-secondary">
                                        Código CIP
                                    </label>
                                    <input
                                        type="text"
                                        id="codigoCIP"
                                        name="codigoCIP"
                                        maxlength="8"
                                        placeholder="Ej. 12345678"
                                        autocomplete="off"
                                        class="form-control form-control-lg text-center font-weight-bold"
                                        style="letter-spacing: 4px; font-family: monospace;"
                                    >
                                    <small class="form-text text-muted">Máximo 8 dígitos numéricos.</small>
                                </div>

                                <button
                                    type="submit"
                                    id="btnBuscar"
                                    class="btn btn-primary btn-lg btn-block font-weight-bold shadow-sm mt-3"
                                >
                                    <i class="fas fa-search mr-2"></i>
                                    <span>Buscar Ingeniero</span>
                                </button>
                            </form>

                            <!-- Caja de Resultados (Inicialmente Oculta) -->
                            <div id="cajaResultado" class="d-none mt-4">
                                <div id="alertaContenedor" class="alert mb-0 d-flex align-items-start" role="alert">
                                    <i id="alertaIcono" class="fas mr-3 mt-1" style="font-size: 1.25rem;"></i>
                                    <div>
                                        <h6 id="alertaTitulo" class="font-weight-bold mb-1"></h6>
                                        <p id="alertaMensaje" class="mb-0 small"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Guía de Pruebas Rápidas (QA Helper) -->
                            <div class="mt-4 pt-3 border-top text-muted small">
                                <p class="font-weight-bold text-dark mb-1">Casos de prueba QA disponibles (conectados a <code>/api/ingenieros/buscar</code>):</p>
                                <ul class="pl-3 mb-0">
                                    <li><code>12345678</code>: Habilitado (Juan Pérez - Ingeniería Civil)</li>
                                    <li><code>87654321</code>: Inhabilitado con deuda (Carlos Gómez - S/ 350.00)</li>
                                    <li><code>11223344</code>: Habilitado (María Fernanda Quispe - Ingeniería Eléctrica)</li>
                                    <li><code>44332211</code>: Inhabilitado con deuda (Luis Alberto Huamán - S/ 180.50)</li>
                                    <li><strong>Cualquier otro de 8 dígitos</strong>: No encontrado en BD</li>
                                    <li><strong>&lt; 8 dígitos, letras o vacío</strong>: Error de formato</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    (function () {
        const formBuscarCIP = document.getElementById('formBuscarCIP');
        const inputCIP = document.getElementById('codigoCIP');
        const cajaResultado = document.getElementById('cajaResultado');
        const alertaContenedor = document.getElementById('alertaContenedor');
        const alertaIcono = document.getElementById('alertaIcono');
        const alertaTitulo = document.getElementById('alertaTitulo');
        const alertaMensaje = document.getElementById('alertaMensaje');

        formBuscarCIP.addEventListener('submit', async function (event) {
            event.preventDefault();
            const cipValue = inputCIP.value.trim();

            if (!/^\d{8}$/.test(cipValue)) {
                mostrarAlerta('amarillo', 'Advertencia de Formato', 'El CIP debe tener exactamente 8 números');
                return;
            }

            try {
                const response = await fetch(`{{ url('/api/ingenieros/buscar') }}?cip=${encodeURIComponent(cipValue)}`, {
                    headers: { 'Accept': 'application/json' }
                });
                const data = await response.json();
                mostrarAlerta(data.tipo || 'rojo', data.titulo || 'Resultado', data.mensaje || '');
            } catch (error) {
                mostrarAlerta('rojo', 'Error de Conexión', 'No se pudo consultar el servicio de validación CIP.');
            }
        });

        function mostrarAlerta(tipo, titulo, mensaje) {
            cajaResultado.classList.remove('d-none');

            const config = {
                verde: {
                    clase: 'alert-success border-success',
                    icono: 'fa-check-circle text-success'
                },
                amarillo: {
                    clase: 'alert-warning border-warning',
                    icono: 'fa-exclamation-triangle text-warning'
                },
                rojo: {
                    clase: 'alert-danger border-danger',
                    icono: 'fa-times-circle text-danger'
                }
            };

            const actual = config[tipo] || config.rojo;
            alertaContenedor.className = `alert mb-0 d-flex align-items-start ${actual.clase}`;
            alertaIcono.className = `fas ${actual.icono} mr-3 mt-1`;
            // Uso seguro de textContent para prevenir vulnerabilidades DOM XSS
            alertaTitulo.textContent = titulo;
            alertaMensaje.textContent = mensaje;
        }
    })();
</script>
@endpush
