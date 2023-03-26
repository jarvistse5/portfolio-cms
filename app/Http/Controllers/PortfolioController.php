<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index()
    {
        $contacts = [
            'email' => 'jarvis.tse.developer@gmail.com',
            'linkedin' => 'https://www.linkedin.com/in/wing-hei-tse-b991701b3/',
            'phone' => '+1(416)8246455',
            'github' => 'https://github.com/jarvistse5',
        ];
        $skills = [
            'html', 'css', 'JavaScript', 'PHP', 'Laravel', 'Livewire', 'AlpineJS',
            'Docker', 'AWS', 'bootstrap', 'Java', 'ReactJS', 'React Native',
            'TailwindCSS', 'Python', 'C++', 'Angular 2', 'MySQL', 'Git',
        ];
        $skillRate = [
            'Frontend' => [
                'html, css, javascript' => 0.9,
                'TailwindCSS' => 0.7,
                'React Native' => 0.6,
                'Angular 2' => 0.6,
                'bootstrap' => 0.5,
                'ReactJS' => 0.1,
            ],
            'Backend' => [
                'Laravel' => 0.9,
                'PHP' => 0.8,
                'MySQL' => 0.7,
                'Livewire' => 0.7,
            ],
            'Others' => [
                'Docker' => 0.6,
                'Git' => 0.6,
                'Java' => 0.5,
                'Python' => 0.4,
                'AWS' => 0.3,
            ],
        ];
        $educations = [
            [
                'name' => 'The Hong Kong University of Science and Technology',
                'description' => 'Bachler of Engineering in Computer Engineering with Second Class Honors Division I',
                'period_start' => '2017',
                'period_end' => '2020',
            ],
            [
                'name' => 'Community College of City University',
                'description' => 'Associate of Engineering with Credit',
                'period_start' => '2015',
                'period_end' => '2017',
            ]
        ];
        $experiences = [
            [
                'title' => 'Full Stack Developer',
                'company' => 'EPISODE Limited',
                'period_start' => 'March 2022',
                'period_end' => 'Feb 2023',
                'description' => [
                    'Develop websites for virtual events',
                    'Add innovative elements to physical activities, such as online rsvp form and app checkin, signatures wall etc.',
                    'Design and implement event technology for company booth, such as AR photo, faceswap',
                    'Interact with the team to solve programs and share experience',
                ],
            ],
            [
                'title' => 'Web Developer',
                'company' => 'Impacts Technology Limited',
                'period_start' => 'Oct 2020',
                'period_end' => 'Dec 2021',
                'description' => [
                    'Develop payment and subscription system',
                    'Convert e-learning platform into B2C / B2B2C model',
                    'Revamp e-learning CMS website',
                    'Responsible for the new functional development',
                ],
            ],
            [
                'title' => 'Programmer',
                'company' => 'Fortune Information Technology Limited',
                'period_start' => 'Jun 2019',
                'period_end' => 'Aug 2019',
                'description' => [
                    'Develop AI-based speech-to-text engine',
                    'Upgrade system and database for the other companies',
                    'Help for bug fixing',
                ],
            ],
        ];
        $projects = [
            [
                'name' => 'Hong Kong Science Festival 2023',
                'description' => 'Bababa...',
                'skills' => [
                    'Laravel', 'Livewire', 'Javscript', 'TailwindCss'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/scifest.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/scifest'),
            ],
            [
                'name' => 'Virtually Versailles',
                'description' => 'Bababa...',
                'skills' => [
                    'React Native', 'Laravel'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/frenchmay.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/frenchmay'),
            ],
            [
                'name' => 'i-CREATe',
                'description' => 'Bababa...',
                'skills' => [
                    'Laravel', 'Livewire', 'Javscript', 'TailwindCss'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/i-create.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/i-create'),
            ],
            [
                'name' => 'e-signature wall',
                'description' => 'Bababa...',
                'skills' => [
                    'Laravel', 'Javscript', 'CSS'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/e-signature.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/e-signature'),
            ],
            [
                'name' => 'Coiner App',
                'description' => 'Bababa...',
                'skills' => [
                    'React Native', 'Laravel'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/coiner.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/coiner'),
            ],
        ];
        
        $user = [
            'name' => 'Jarvis Tse',
            'title' => 'Full Stack Developer',
            'intro' => "Hello world,\nI'm Jarvis Tse",
            'subTitle' => "Full Stack Developer \ Web Developer \ Programmer",
            'skills' => $skills,
            'contacts' => $contacts,
            'skillRate' => $skillRate,
            'educations' => $educations,
            'experiences' => $experiences,
            'projects' => $projects,
        ];
        $config = [
            'sessions' => [
                'about' => 'About',
                'skills' => 'Skills',
                'education' => 'Education',
                'experience' => 'Experience',
                'project' => 'Project',
            ],
        ];
        return view('frontend.portfolio.index', [
            'user' => $user,
            'config' => $config,
        ]);
    }

    public function getProjectAssets($path)
    {
        $assets = [];
        $publicPath = public_path($path);
        $files = File::allFiles($publicPath);
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $extension = $file->getExtension();
            $fileUrl = env('APP_URL') . '/' . $path . '/' . $filename;
            array_push($assets, [
                'filename' => $filename,
                'extension' => $extension,
                'fileUrl' => $fileUrl
            ]);
        }
        return $assets;
    }
}
