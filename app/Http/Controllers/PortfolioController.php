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
            'HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Livewire', 'AlpineJS',
            'Docker', 'AWS', 'Bootstrap', 'Java', 'ReactJS', 'React Native',
            'TailwindCSS', 'Python', 'C++', 'Angular 2', 'MySQL', 'Git', 'Stripe',
            'Redis', 'Nginx', 'jQuery',
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
                'description' => 'A virtual exhibition website. The exhibitors can upload their booth info and streaming, so the guests can join this festival virtually.',
                'skills' => [
                    'Laravel', 'Livewire', 'Javascript', 'TailwindCss'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/scifest.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/scifest'),
            ],
            [
                'name' => 'Virtually Versailles',
                'description' => 'The app designed for the French May event is designed to allow tourists to have an immersive experience, combining AR interaction, hologram, 360 images and other technologies, so that everyone can understand of France and its art with fun.',
                'skills' => [
                    'React Native', 'Laravel'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/frenchmay.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/frenchmay', [
                    [
                        'type' => 'youtube',
                        'youtube_id' => 'EdNIHr3C5r0',
                    ]
                ]),
            ],
            [
                'name' => 'i-CREATe Virtual Exhibition',
                'description' => 'A virtual exhibition website. The exhibitors can upload their booth info and streaming, so the guests can join this festival virtually.',
                'skills' => [
                    'Laravel', 'Livewire', 'Javascript', 'TailwindCss'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/i-create.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/i-create'),
            ],
            [
                'name' => 'E-Signature Wall',
                'description' => 'Sign the signature on iPad, and display the signature on the screen.',
                'skills' => [
                    'Laravel', 'Javascript', 'CSS'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/e-signature.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/e-signature'),
            ],
            [
                'name' => 'Coiner App',
                'description' => 'An app to store member point and browse information.',
                'skills' => [
                    'React Native', 'Laravel'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/coiner.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/coiner'),
            ],
            [
                'name' => 'iTrain B2B2C Convertion',
                'description' => 'Convert e-learning platform into B2C / B2B2C model, and revamp the UI of the whole system.',
                'skills' => [
                    'Angular', 'Laravel'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/itrain.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/itrain', [
                    [
                        'type' => 'youtube',
                        'youtube_id' => 'pigTNV_SNDA',
                    ],
                    [
                        'type' => 'youtube',
                        'youtube_id' => 'zbTLx5nQJ8Y',
                    ],
                ]),
            ],
            [
                'name' => 'File Picker Component',
                'description' => 'A file picker component using Augular, which is allowing multi-select, adjust, preview function.',
                'skills' => [
                    'Angular'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/filepicker.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/filepicker', [
                    [
                        'type' => 'youtube',
                        'youtube_id' => '25gmRKZuBFc',
                    ],
                ]),
            ],
            [
                'name' => 'Masksapp',
                'description' => 'Share mask information at the begining of COVID-19',
                'skills' => [
                    'Android Studio', 'Java', 'Firebase'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/masksapp.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/masksapp', [
                    [
                        'type' => 'youtube',
                        'youtube_id' => '2d5Q1Nvd01U',
                    ]
                ]),
            ],
            [
                'name' => 'Low Cost Book Tracking System Prototype',
                'description' => 'Using RFID technology to real time track book, we build a prototype with a simple library management system and Android App for the staff.',
                'skills' => [
                    'RFID', 'Laravel', 'Android Studio', 'Java', 'C++'
                ],
                'cover_img' => env('APP_URL') . '/assets/jarvis_tse/cover/book-tracking.png',
                'assets' => $this->getProjectAssets('assets/jarvis_tse/book-tracking', [
                    [
                        'type' => 'youtube',
                        'youtube_id' => 'O1yaCYtzeJs'
                    ]
                ]),
            ]
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

    public function getProjectAssets($path, $assets = [])
    {
        $publicPath = public_path($path);
        if (!$publicPath || !File::exists($publicPath)) {
            return $assets;
        }
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
