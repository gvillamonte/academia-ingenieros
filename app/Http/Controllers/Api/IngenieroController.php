<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IngenieroCip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngenieroController extends Controller
{
    public function status(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'service' => 'Academia CIP - API',
            'message' => 'Hola Este es el API funcionando sobre Laravel 12 con Base de Datos Eloquent',
            'total_ingenieros' => IngenieroCip::count(),
        ]);
    }

    public function buscar(Request $request): JsonResponse
    {
        $cip = trim((string) $request->query('cip', ''));

        if (!preg_match('/^\d{8}$/', $cip)) {
            return response()->json([
                'status' => 'invalid_format',
                'tipo' => 'amarillo',
                'titulo' => 'Advertencia de Formato',
                'mensaje' => 'El CIP debe tener exactamente 8 números',
            ], 422);
        }

        $ingeniero = IngenieroCip::where('cip', $cip)->first();

        if (!$ingeniero) {
            return response()->json([
                'status' => 'not_found',
                'tipo' => 'rojo',
                'titulo' => 'Registro No Hallado',
                'mensaje' => 'Ingeniero no encontrado en el Colegio de Ingenieros',
            ], 404);
        }

        if ($ingeniero->habilitado) {
            return response()->json([
                'status' => 'enabled',
                'tipo' => 'verde',
                'titulo' => 'Consulta Exitosa',
                'mensaje' => "Ingeniero: {$ingeniero->nombre} ({$ingeniero->especialidad}). Estado: HABILITADO (Sin deudas)",
                'ingeniero' => [
                    'cip' => $ingeniero->cip,
                    'nombre' => $ingeniero->nombre,
                    'especialidad' => $ingeniero->especialidad,
                    'sede' => $ingeniero->sede,
                    'habilitado' => true,
                    'deuda' => (float) $ingeniero->deuda,
                ],
            ]);
        }

        $deudaFormateada = number_format((float) $ingeniero->deuda, 2);

        return response()->json([
            'status' => 'disabled',
            'tipo' => 'rojo',
            'titulo' => 'Estado Inhabilitado',
            'mensaje' => "Ingeniero: {$ingeniero->nombre} ({$ingeniero->especialidad}). Estado: INHABILITADO (Deuda de S/ {$deudaFormateada})",
            'ingeniero' => [
                'cip' => $ingeniero->cip,
                'nombre' => $ingeniero->nombre,
                'especialidad' => $ingeniero->especialidad,
                'sede' => $ingeniero->sede,
                'habilitado' => false,
                'deuda' => (float) $ingeniero->deuda,
            ],
        ]);
    }
}
