<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\IngenieroCip;
use App\Models\User;

class CmsController extends Controller
{
    public function index()
    {
        $stats = [
            'courses' => Course::count(),
            'categories' => Category::count(),
            'students' => User::where('role', 'student')->count(),
            'instructors' => User::where('role', 'instructor')->count(),
            'cip_queries' => IngenieroCip::count(),
        ];

        $courses = Course::with(['category', 'instructor'])->latest()->get();
        $ingenieros = IngenieroCip::orderBy('cip')->get();

        return view('cms.dashboard', compact('stats', 'courses', 'ingenieros'));
    }
}
