<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    private function applyFilters($query, Request $request)
    {
        if ($search = $request->query('query')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('subtitle', 'like', "%{$search}%");
            });
        }

        if ($categorySlug = $request->query('category')) {
            if ($categorySlug !== 'all') {
                $category = Category::where('slug', $categorySlug)->first();
                if ($category) {
                    $childIds = $category->children()->pluck('id')->push($category->id);
                    $query->whereIn('category_id', $childIds);
                }
            }
        }

        if ($level = $request->query('level')) {
            if ($level !== 'all') {
                $query->whereRaw('LOWER(level) = ?', [strtolower($level)]);
            }
        }

        if ($price = $request->query('price')) {
            if ($price === 'free') {
                $query->where('price', '<=', 0);
            } elseif ($price === 'paid') {
                $query->where('price', '>', 0);
            }
        }

        if ($rating = $request->query('rating')) {
            if ($rating !== 'all' && is_numeric($rating)) {
                $query->where('rating', '>=', (int) $rating);
            }
        }

        return $query;
    }

    public function home()
    {
        $courses = Course::with('instructor')->get();

        $topCourses = $courses->map(fn (Course $c) => $c->toCardArray(true))->all();
        $latestCourses = $courses->sortByDesc('id')->values()->map(fn (Course $c) => $c->toCardArray(false))->all();

        return view('pages.home', compact('topCourses', 'latestCourses'));
    }

    public function courses(Request $request)
    {
        $query = Course::with(['instructor', 'category']);
        $this->applyFilters($query, $request);

        $courses = $query->get()->map(fn (Course $c) => $c->toCardArray(true))->all();
        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('pages.courses', compact('courses', 'categories'));
    }

    public function coursesList(Request $request)
    {
        $query = Course::with(['instructor', 'category']);
        $this->applyFilters($query, $request);

        $courses = $query->get()->map(fn (Course $c) => $c->toCardArray(false))->all();
        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('pages.courses-list', compact('courses', 'categories'));
    }

    public function courseDetail(?string $slug = null)
    {
        $course = $slug
            ? Course::with(['instructor', 'category', 'sections.lessons'])->where('slug', $slug)->firstOrFail()
            : Course::with(['instructor', 'category', 'sections.lessons'])->firstOrFail();

        return view('pages.course-detail', compact('course'));
    }

    public function lessons(?string $slug = null)
    {
        $course = $slug
            ? Course::with(['sections.lessons'])->where('slug', $slug)->firstOrFail()
            : Course::with(['sections.lessons'])->firstOrFail();

        return view('pages.lessons', [
            'course' => $course,
            'isLoggedIn' => true,
        ]);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function shoppingCart()
    {
        $cartCourses = Course::with('instructor')->take(2)->get();
        return view('pages.shopping-cart', compact('cartCourses'));
    }

    public function myAccount()
    {
        $user = auth()->user() ?? \App\Models\User::where('role', 'student')->first();
        return view('pages.my-account', [
            'user' => $user,
            'isLoggedIn' => true,
        ]);
    }

    public function myCourses(Request $request)
    {
        $enrollmentsQuery = Enrollment::with(['course.instructor']);

        if (auth()->check()) {
            $enrollmentsQuery->where('user_id', auth()->id());
        }

        if ($q = $request->query('q')) {
            $enrollmentsQuery->whereHas('course', function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%");
            });
        }

        $enrolledCourses = $enrollmentsQuery->get()->map(function (Enrollment $enrollment) {
            $course = $enrollment->course;
            return [
                'slug' => $course->slug,
                'title' => $course->title,
                'image' => $course->image,
                'lectures' => $course->lessons_count,
                'quizzes' => $course->quizzes_count,
                'duration' => $course->duration,
                'progress' => $enrollment->progress,
                'instructor' => $course->instructor?->name ?? 'John Doe',
                'avatar' => $course->instructor?->avatar ?? 'student3.jpg',
                'rating' => $course->rating,
            ];
        })->all();

        return view('pages.my-courses', [
            'enrolledCourses' => $enrolledCourses,
            'isLoggedIn' => true,
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function buscarIngeniero()
    {
        return view('pages.buscar-ingeniero');
    }
}
