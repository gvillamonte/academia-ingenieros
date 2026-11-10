@extends('layouts.app')

@section('title', 'Panel Administrativo CMS | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">CMS Backoffice</li>
                        </ol>
                    </nav>
                    <h1 class="category-name">Panel de Administración (CMS)</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-2 pb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-book fa-2x text-primary mb-2"></i>
                            <h4 class="font-weight-bold mb-0">{{ $stats['courses'] }}</h4>
                            <small class="text-muted">Cursos en BD</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-layer-group fa-2x text-info mb-2"></i>
                            <h4 class="font-weight-bold mb-0">{{ $stats['categories'] }}</h4>
                            <small class="text-muted">Categorías en BD</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-user-graduate fa-2x text-success mb-2"></i>
                            <h4 class="font-weight-bold mb-0">{{ $stats['students'] }}</h4>
                            <small class="text-muted">Estudiantes</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-id-card fa-2x text-warning mb-2"></i>
                            <h4 class="font-weight-bold mb-0">{{ $stats['cip_queries'] }}</h4>
                            <small class="text-muted">Ingenieros CIP en BD</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white font-weight-bold">
                            Catálogo de Cursos (Eloquent)
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 small">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Curso</th>
                                            <th>Categoría</th>
                                            <th>Nivel</th>
                                            <th class="text-right">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($courses as $c)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('course.detail', ['slug' => $c->slug]) }}" class="font-weight-bold text-dark">
                                                        {{ $c->title }}
                                                    </a>
                                                </td>
                                                <td>{{ $c->category?->name ?? '-' }}</td>
                                                <td><span class="badge badge-secondary">{{ $c->level }}</span></td>
                                                <td class="text-right font-weight-bold">${{ number_format((float) $c->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                            <span>Padrón Ingenieros CIP</span>
                            <a href="{{ route('buscar.ingeniero') }}" class="btn btn-sm btn-outline-primary">Probar Buscador</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 small">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>CIP</th>
                                            <th>Ingeniero</th>
                                            <th>Estado</th>
                                            <th class="text-right">Deuda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ingenieros as $ing)
                                            <tr>
                                                <td class="font-weight-bold"><code>{{ $ing->cip }}</code></td>
                                                <td>{{ $ing->nombre }}</td>
                                                <td>
                                                    @if($ing->habilitado)
                                                        <span class="badge badge-success">Habilitado</span>
                                                    @else
                                                        <span class="badge badge-danger">Inhabilitado</span>
                                                    @endif
                                                </td>
                                                <td class="text-right">S/ {{ number_format((float) $ing->deuda, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
