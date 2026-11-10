<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\Enrollment;
use App\Models\IngenieroCip;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuarios (Admin, Instructores y Estudiante)
        $admin = User::updateOrCreate(['email' => 'admin@academiacip.edu.pe'], [
            'name' => 'Administrador CIP',
            'first_name' => 'Administrador',
            'last_name' => 'CIP',
            'role' => 'admin',
            'avatar' => 'instructor1.jpg',
            'password' => Hash::make('password123'),
        ]);

        $instructorMain = User::updateOrCreate(['email' => 'juan.urrego@academiacip.edu.pe'], [
            'name' => 'Tutoriales a tu Alcance',
            'first_name' => 'Juan Fernando',
            'last_name' => 'Urrego',
            'role' => 'instructor',
            'avatar' => 'instructor1.jpg',
            'bio' => 'Profesional en Diseño Visual, programador y especialista en Administración de la Informática Educativa. Dedicado tiempo completo a la docencia en Desarrollo Web y Diseño Interactivo.',
            'password' => Hash::make('password123'),
        ]);

        $instructor2 = User::updateOrCreate(['email' => 'rosalie@academiacip.edu.pe'], [
            'name' => 'Rosalie Ruth',
            'first_name' => 'Rosalie',
            'last_name' => 'Ruth',
            'role' => 'instructor',
            'avatar' => 'student6.jpg',
            'password' => Hash::make('password123'),
        ]);

        $student = User::updateOrCreate(['email' => 'signe.thompson@example.com'], [
            'name' => 'Signe Thompson',
            'first_name' => 'Signe',
            'last_name' => 'Thompson',
            'role' => 'student',
            'avatar' => 'student6.jpg',
            'password' => Hash::make('password123'),
        ]);

        // 2. Categorías y Subcategorías
        $categoriesData = [
            'Web Design' => [
                'icon' => 'fas fa-desktop',
                'subs' => ['Responsive Design', 'WordPress Theme', 'Bootstrap', 'HTML & CSS'],
            ],
            'Graphic Design' => [
                'icon' => 'fas fa-pencil-alt',
                'subs' => ['Photoshop', 'Adobe Illustrator', 'Drawing', 'Logo Design', 'Digital Art'],
            ],
            'User Experience' => [
                'icon' => 'fas fa-male',
                'subs' => ['User Experience Design', 'Mobile App Design', 'User Interface', 'Design Thinking', 'Figma', 'Prototyping'],
            ],
            'Interior Design' => [
                'icon' => 'fas fa-magic',
                'subs' => ['Color Theory', 'Lighting Design', 'SketchUp', 'Home Improvement', '3D Lighting'],
            ],
            '3D and Animation' => [
                'icon' => 'fas fa-cube',
                'subs' => ['Blender', 'Motion Graphics', 'After Effects', 'Maya', 'zBrush', 'Character Modeling'],
            ],
            'Fashion' => [
                'icon' => 'fas fa-user-secret',
                'subs' => ['Fashion Design', 'Sewing', 'T-shirt Design', 'Jewelry Design'],
            ],
            'Frontend Development With Vue.js' => [
                'icon' => 'fab fa-500px',
                'subs' => ['Vue.js Fundamentals'],
            ],
        ];

        $categoryMap = [];
        foreach ($categoriesData as $parentName => $info) {
            $parent = Category::updateOrCreate(['slug' => Str::slug($parentName)], [
                'name' => $parentName,
                'icon' => $info['icon'],
                'parent_id' => null,
            ]);
            $categoryMap[$parentName] = $parent;

            foreach ($info['subs'] as $subName) {
                $sub = Category::updateOrCreate(['slug' => Str::slug($subName)], [
                    'name' => $subName,
                    'icon' => $info['icon'],
                    'parent_id' => $parent->id,
                ]);
                $categoryMap[$subName] = $sub;
            }
        }

        // 3. Cursos del Catálogo
        $coursesData = [
            [
                'title' => 'WordPress Theme Development with Bootstrap',
                'category' => 'WordPress Theme',
                'image' => 'course_thumbnail_default_12.jpg',
                'rating' => 4,
                'old_price' => 11.99,
                'price' => 10.00,
                'lessons_count' => 24,
                'quizzes_count' => 3,
                'duration' => '00:10:22 Hours',
                'level' => 'Beginner',
                'subtitle' => 'Learn how to confidently develop custom & profitable Responsive WordPress Themes and Websites with no prior experience.',
                'outcomes' => [
                    'Have the skills to start making money on the side, as a casual freelancer, or full time as a work-from-home freelancer',
                    'Easily create a beautiful HTML & CSS website with Bootstrap',
                    'Convert any static HTML & CSS website into a Custom WordPress Theme',
                    'Have a thorough understanding of utilizing PHP to create WordPress websites & themes',
                ],
                'requirements' => [
                    'Have a basic understanding of HTML, CSS and PHP',
                    'Have access to a code editor, free or otherwise',
                    'An Internet connection is required',
                ],
            ],
            [
                'title' => 'Adobe Illustrator CC - Essentials Training Course',
                'category' => 'Adobe Illustrator',
                'image' => 'course_thumbnail_default_13.jpg',
                'rating' => 5,
                'old_price' => 18.99,
                'price' => 12.00,
                'lessons_count' => 18,
                'quizzes_count' => 2,
                'duration' => '01:31:12 Hours',
                'level' => 'Beginner',
                'subtitle' => 'Learn Adobe Illustrator CC graphic design, logo design, and more with this in-depth, practical, easy-to-follow course!',
                'outcomes' => [
                    'Master vector design and illustration tools',
                    'Design professional logos and branding assets',
                ],
            ],
            [
                'title' => 'Complete Blender Creator: Learn 3D Modelling for Beginners',
                'category' => 'Blender',
                'image' => 'course_thumbnail_default_14.jpg',
                'rating' => 4,
                'old_price' => 89.99,
                'price' => 24.00,
                'lessons_count' => 15,
                'quizzes_count' => 1,
                'duration' => '02:15:00 Hours',
                'level' => 'Beginner',
                'subtitle' => 'Use Blender to Create Beautiful 3D models for Video Games, 3D Printing & More.',
                'outcomes' => [
                    'Use Blender and understand its interface',
                    'Understand the principles of 3D modelling',
                ],
            ],
            [
                'title' => 'User Experience Design Essentials - Adobe XD UI UX Design',
                'category' => 'User Experience Design',
                'image' => 'course_thumbnail_default_15.jpg',
                'rating' => 2,
                'old_price' => 59.99,
                'price' => 12.00,
                'lessons_count' => 12,
                'quizzes_count' => 1,
                'duration' => '01:20:00 Hours',
                'level' => 'Intermediate',
                'subtitle' => 'Use XD to get a job in UI Design, User Interface, User Experience design, UX design & Web Design.',
                'outcomes' => [
                    'Build & test a full website design',
                    'Build & test a full mobile app',
                ],
            ],
            [
                'title' => 'DESIGN RULES: Principles + Practices for Great UI Design',
                'category' => 'User Interface',
                'image' => 'course_thumbnail_default_16.jpg',
                'rating' => 4,
                'old_price' => 150.00,
                'price' => 99.00,
                'lessons_count' => 10,
                'quizzes_count' => 2,
                'duration' => '01:05:00 Hours',
                'level' => 'Intermediate',
                'subtitle' => 'Everything you need to know to design clean, modern, and usable user interfaces.',
                'outcomes' => [
                    'Apply color theory and typography effectively',
                    'Create balanced visual hierarchies',
                ],
            ],
            [
                'title' => 'How to Use Lighting Design to Transform your Home',
                'category' => 'Lighting Design',
                'image' => 'course_thumbnail_default_21.jpg',
                'rating' => 0,
                'old_price' => 89.99,
                'price' => 56.00,
                'lessons_count' => 10,
                'quizzes_count' => 0,
                'duration' => '01:03:48 Hours',
                'level' => 'Beginner',
                'subtitle' => 'Learn How to Use Lighting in your Interior Design Like a Pro',
                'outcomes' => [
                    'Use 3 layers of light to create a cohesive lighting scheme',
                    'Select light fixtures appropriate to the type of room',
                ],
            ],
            [
                'title' => 'How To Shoot B-Roll Footage with Peter McKinnon',
                'category' => 'Motion Graphics',
                'image' => 'course_thumbnail_default_26.jpg',
                'rating' => 5,
                'old_price' => 1896.00,
                'price' => 1800.00,
                'lessons_count' => 7,
                'quizzes_count' => 1,
                'duration' => '01:09:38 Hours',
                'level' => 'Advanced',
                'subtitle' => "Step Up Your Filmmaking. Today's topic is the importance of B-Roll.",
                'outcomes' => [
                    'Master in B-Roll',
                    'Become pro like Peter McKinnon',
                ],
            ],
            [
                'title' => 'Introduction and Learn Vue.JS',
                'category' => 'Vue.js Fundamentals',
                'image' => 'course_thumbnail_default_28.jpg',
                'rating' => 3,
                'old_price' => null,
                'price' => 359.00,
                'lessons_count' => 8,
                'quizzes_count' => 1,
                'duration' => '00:45:10 Hours',
                'level' => 'Intermediate',
                'subtitle' => 'Vue is a progressive framework for building user interfaces.',
                'outcomes' => [
                    'Build reactive single-page applications with Vue.js',
                ],
            ],
            [
                'title' => 'How to shoot cinematic tech videos like Apple',
                'category' => 'Motion Graphics',
                'image' => 'course_thumbnail_default_30.jpg',
                'rating' => 0,
                'old_price' => null,
                'price' => 524.00,
                'lessons_count' => 3,
                'quizzes_count' => 0,
                'duration' => '00:28:13 Hours',
                'level' => 'Advanced',
                'subtitle' => 'In this video tutorial learn how to shoot cinematic product videos shots like you see in all the big budget commercials.',
                'outcomes' => [
                    'You will become a professional TechTuber',
                ],
            ],
        ];

        $createdCourses = [];
        foreach ($coursesData as $cData) {
            $cat = $categoryMap[$cData['category']] ?? null;
            $course = Course::updateOrCreate(['slug' => Str::slug($cData['title'])], [
                'category_id' => $cat?->id,
                'instructor_id' => $instructorMain->id,
                'title' => $cData['title'],
                'subtitle' => $cData['subtitle'],
                'description' => 'Whether you are a freelance designer, entrepreneur, employee for a company, code hobbyist, or looking for a new career — this course gives you an immensely valuable skill.',
                'image' => $cData['image'],
                'price' => $cData['price'],
                'old_price' => $cData['old_price'],
                'level' => $cData['level'],
                'language' => 'English',
                'duration' => $cData['duration'],
                'rating' => $cData['rating'],
                'lessons_count' => $cData['lessons_count'],
                'quizzes_count' => $cData['quizzes_count'],
                'is_top' => true,
                'outcomes' => $cData['outcomes'],
                'requirements' => $cData['requirements'] ?? [
                    'Have a basic understanding of HTML, CSS and PHP',
                    'An Internet connection is required',
                ],
            ]);
            $createdCourses[] = $course;

            // Secciones y lecciones para cada curso
            $sec1 = CourseSection::updateOrCreate([
                'course_id' => $course->id,
                'title' => 'Getting Started With This Course',
            ], ['sort_order' => 1]);

            Lesson::updateOrCreate([
                'course_section_id' => $sec1->id,
                'title' => 'What Is WordPress & Project Introduction',
            ], [
                'duration' => '00:05:13',
                'video_url' => '6967d9d02be6648.mp4',
                'lesson_type' => 'video',
                'sort_order' => 1,
            ]);

            Lesson::updateOrCreate([
                'course_section_id' => $sec1->id,
                'title' => 'Guide The Basic Webpage Layout',
            ], [
                'duration' => '00:06:50',
                'video_url' => '6967d9d02be6648.mp4',
                'lesson_type' => 'video',
                'sort_order' => 2,
            ]);

            Lesson::updateOrCreate([
                'course_section_id' => $sec1->id,
                'title' => 'Setting Up Your Project Environment',
            ], [
                'duration' => '00:09:55',
                'video_url' => '6967239b0c4d623.mp4',
                'lesson_type' => 'video',
                'sort_order' => 3,
            ]);

            $sec2 = CourseSection::updateOrCreate([
                'course_id' => $course->id,
                'title' => 'Bonus & Resources Section',
            ], ['sort_order' => 2]);

            Lesson::updateOrCreate([
                'course_section_id' => $sec2->id,
                'title' => 'Download Course Lecture & PDF Guide',
            ], [
                'duration' => '00:02:33',
                'video_url' => '6967239b0c4d623.mp4',
                'lesson_type' => 'document',
                'sort_order' => 1,
            ]);
        }

        // 4. Matrículas (Enrollments) para el estudiante de prueba
        if (count($createdCourses) >= 4) {
            Enrollment::updateOrCreate([
                'user_id' => $student->id,
                'course_id' => $createdCourses[0]->id,
            ], ['progress' => 28]);

            Enrollment::updateOrCreate([
                'user_id' => $student->id,
                'course_id' => $createdCourses[1]->id,
            ], ['progress' => 0]);

            Enrollment::updateOrCreate([
                'user_id' => $student->id,
                'course_id' => $createdCourses[5]->id,
            ], ['progress' => 0]);

            Enrollment::updateOrCreate([
                'user_id' => $student->id,
                'course_id' => $createdCourses[8]->id,
            ], ['progress' => 0]);
        }

        // 5. Padrón de Ingenieros CIP (Sede Cusco)
        $ingenieros = [
            [
                'cip' => '12345678',
                'nombre' => 'Juan Pérez',
                'especialidad' => 'Ingeniería Civil',
                'sede' => 'CIP Sede Cusco',
                'habilitado' => true,
                'deuda' => 0.00,
            ],
            [
                'cip' => '87654321',
                'nombre' => 'Carlos Gómez',
                'especialidad' => 'Ingeniería de Sistemas',
                'sede' => 'CIP Sede Cusco',
                'habilitado' => false,
                'deuda' => 350.00,
            ],
            [
                'cip' => '11223344',
                'nombre' => 'María Fernanda Quispe',
                'especialidad' => 'Ingeniería Eléctrica',
                'sede' => 'CIP Sede Cusco',
                'habilitado' => true,
                'deuda' => 0.00,
            ],
            [
                'cip' => '44332211',
                'nombre' => 'Luis Alberto Huamán',
                'especialidad' => 'Ingeniería Industrial',
                'sede' => 'CIP Sede Cusco',
                'habilitado' => false,
                'deuda' => 180.50,
            ],
        ];

        foreach ($ingenieros as $ing) {
            IngenieroCip::updateOrCreate(['cip' => $ing['cip']], $ing);
        }
    }
}
