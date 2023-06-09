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
            'email' => 'jarvis.tse.wh.ca@gmail.com',
            'linkedin' => 'https://www.linkedin.com/in/wing-hei-tse-b991701b3/',
            'phone' => '+1(416)8246455',
            'github' => 'https://github.com/jarvistse5',
            'resume' => env('APP_URL') . '/assets/jarvis_tse/doc/jarvis_tse_resume.pdf',
        ];
        $skills = [
            'HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Livewire', 'Alpine.js',
            'Docker', 'AWS', 'Bootstrap', 'Java', 'Spring Boot', 'React.js', 'React Native',
            'TailwindCSS', 'Python', 'C++', 'Angular', 'MySQL', 'RDBMS', 'Git', 'Stripe', 'Paypal',
            'Redis', 'Nginx', 'Apache', 'jQuery', 'Django', 'OAuth', 'WebSocket', 'Postman', 'JMeter',
            'ChatGPT', 'Stable Diffusion', 'RESTful API', 'OOP', 'MVC', 'Agile', 'Node.js', 'Express.js'
        ];
        $skillRate = [
            'Frontend' => [
                'HTML, CSS, JavaScript' => 1.0,
                'Angular' => 0.8,
                'TailwindCSS, Bootstrap' => 0.8,
                'React Native' => 0.6,
                'React.js' => 0.6,
            ],
            'Backend' => [
                'PHP, Laravel' => 1.0,
                'MySQL, MongoDB' => 0.6,
                'Node.js, Express.js' => 0.6,
                'Python, Django' => 0.6,
                'Java, Spring Boot' => 0.2,
            ],
            'Others' => [
                'Linux' => 0.8,
                'Docker' => 0.6,
                'Git' => 0.6,
                'AWS' => 0.4,
            ],
        ];
        $educations = [
            [
                'name' => 'The Hong Kong University of Science and Technology',
                'description' => 'Bachler of Engineering in Computer Engineering with Second Class Honors Division I',
                'period_start' => '09/2017',
                'period_end' => '11/2020',
            ],
            [
                'name' => 'Community College of City University',
                'description' => 'Associate of Engineering with Credit',
                'period_start' => '09/2015',
                'period_end' => '07/2017',
            ]
        ];
        $experiences = [
            [
                'title' => 'Full Stack Developer',
                'company' => 'EPISODE Limited',
                'period_start' => '03/2022',
                'period_end' => '02/2023',
                'description' => [
                    'Designed and implemented a virtual event platform from scratch to host online conferences and virtual exhibitions. The platform includes different interactive features such as AR, chat rooms, live streaming, polling, and Q&A.',
                    'Maintained an all-in-one event system, including registration, email, check-in, and name badge printing. Provided real-time technical support for every project.',
                    'Provided customized IT solutions for more than ten clients, including Lamborghini, Prada, AIA, Tesla, and FWD.',
                    'Developed a customized long-term mobile app for clients\' guests to get regular updates, register for events, and earn rewards by joining activities.',
                    'Participated in researching and developing new event technologies, such as AR photo, AI-based face swap, and data visualization.'
                ],
            ],
            [
                'title' => 'Web Developer',
                'company' => 'Impacts Technology Limited',
                'period_start' => '10/2020',
                'period_end' => '12/2021',
                'description' => [
                    'Maintained an e-learning platform and built tailor-made, professional, and comprehensive cloud-based corporate training solutions for both online self-directed learning and face-to-face interactive training.',
                    'Converted the e-learning platform into a B2C/B2B2C model and implemented a payment and subscription policy using Stripe.',
                    'Revamped a CMS by optimizing API performance, restructuring the database, and improving the user experience and interface.',
                    'Collaborated with project managers and the mobile application team to understand business requirements and regularly deliver complex features.',
                ],
            ],
            [
                'title' => 'Programmer',
                'company' => 'Fortune Information Technology Limited',
                'period_start' => '06/2019',
                'period_end' => '08/2019',
                'description' => [
                    'Researched and developed an AI-based speech-to-text engine and embedded it into computer telephony integration.',
                    'Collaborated with clients\' tech team to upgrade the enterprise management system.',
                    'Participated in website development, including coding simple features, testing, and fixing bugs.',
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
                    'React Native', 'Node.js', 'Express.js', 'MongoDB'
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
                    'React Native', 'Node.js', 'Express.js', 'MongoDB'
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
        return view('frontend.portfolio.theme1.index', [
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

    public function wing() {
        $contacts = [
            'email' => 'wing412.ca@gmail.com',
            'linkedin' => 'https://www.linkedin.com/in/yuen-wing-chan-a027631b5/',
            'phone' => '+1(416)8247821',
            // 'github' => 'https://github.com/jarvistse5',
            'resume' => env('APP_URL') . '/assets/wing/doc/yuen_wing_chan_resume.pdf',
            'portfolio' => env('APP_URL') . '/assets/wing/doc/portfolio.pdf',
        ];

        $skills = [
            [
                'name' => 'Figma',
                'image' => env('APP_URL') . '/assets/wing/skills/figma.png',
            ],
            [
                'name' => 'Adobe Illustrator',
                'image' => env('APP_URL') . '/assets/wing/skills/adobe_ai.png',
            ],
            [
                'name' => 'Adobe Photoshop',
                'image' => env('APP_URL') . '/assets/wing/skills/adobe_ps.png',
            ],
            [
                'name' => 'Adobe Indesign',
                'image' => env('APP_URL') . '/assets/wing/skills/adobe_id.png',
            ],
            [
                'name' => 'Adobe XD',
                'image' => env('APP_URL') . '/assets/wing/skills/adobe_xd.png',
            ],
            [
                'name' => 'Adobe Premiere Pro',
                'image' => env('APP_URL') . '/assets/wing/skills/adobe_pr.png',
            ],
            [
                'name' => 'Adobe After Effect',
                'image' => env('APP_URL') . '/assets/wing/skills/adobe_ae.png',
            ],
            [
                'name' => 'Microsoft Office',
                'image' => env('APP_URL') . '/assets/wing/skills/ms_office.png',
            ]
        ];

        $educations = [
            [
                'name' => 'City University of Hong Kong',
                'description' => 'Bachelor of Social Sciences in Asian and International Studies with Upper Second Class Honors',
                'period_start' => '2017',
                'period_end' => '2019',
            ],
            [
                'name' => 'Community College of City University',
                'description' => 'Associate of Business Administration in General Management with Distinction',
                'period_start' => '2015',
                'period_end' => '2017',
            ]
        ];
        $experiences = [
            [
                'title' => 'Junior UXUI Designer',
                'company' => 'DigiDumpling Limited',
                'period_start' => 'Feb 2023',
                'period_end' => 'Mar 2022',
                'description' => [
                    'Understand user requirements and create information architecture to ensure effective and smooth user experience',
                    'Create low-fidelity wireframes before designing user interface',
                    'Design website, mobile app and software dashboard user interface',
                    'Prepare prototype to present the user flow and interaction design',
                ],
            ],
            [
                'title' => 'Graphic Designer',
                'company' => 'Acc Biotech Limited',
                'period_start' => 'Feb 2021',
                'period_end' => 'Dec 2021',
                'description' => [
                    'Prepare digital materials of social media',
                    'Create website banners and retouch product photos',
                    'Prepare printing materials for promoting the brand',
                    'Develop new brand (Logo, product package, advertising materials)',
                ],
            ],
            [
                'title' => 'Junior Graphic Designer',
                'company' => 'Come Know (Asia) Limited',
                'period_start' => 'Nov 2019',
                'period_end' => 'Dec 2020',
                'description' => [
                    'Responsible for creating inhouse website banner',
                    'Design graphic materials of social media',
                    'Create motion graphic storyboards',
                    'Prepare artworks for clients according to their needs'
                ],
            ],
        ];

        $projects = [
            [
                'name' => 'BDA Banking app',
                'description' => 'This project is to create an app for one of the bank in Macau. In this app, it provides the experience of online banking services to end-users. The design process included high fidelity UI design and user flow.',
                'skills' => [
                    'uxui'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/BDA_mockup.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/BDA'),
            ],
            [
                'name' => 'BioGene Service ticket system',
                'description' => 'This project is to create a ticket system for the company to track the status of each service. The design process included user flow and high fidelity UI design.',
                'skills' => [
                    'uxui'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/BioGene_mockup.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/BioGene'),
            ],
            [
                'name' => 'Daydaycook app',
                'description' => 'In this cooking app, it aims to tackle people don\'t know what to do when they have ingredients, or how they can mix and match with the existing ingredients. The design process included information architecture, low fidelity wireframe, high fidelity UI design and prototype.',
                'skills' => [
                    'uxui'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/DayDayCook_mockup.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/Daydaycook'),
            ],
            [
                'name' => 'George Patrick e-commerce website',
                'description' => 'This project is to revamp a e-commerce website for a luxury brand in the United State. The design process included information architecture and high fidelity UI design.',
                'skills' => [
                    'uxui'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/George Patrick_mockup.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/George Patrick'),
            ],
            [
                'name' => 'Reuteri informative website',
                'description' => 'This project is to revamp the informative website for a Hong Kong brand called "Reuteri" which selling probiotics products. The design process included information architecture and high fidelity UI design.',
                'skills' => [
                    'uxui'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/Reuteri_mockup.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/Reuteri'),
            ],
            [
                'name' => 'Taketab app',
                'description' => 'It is a food scanning app allows users to easily track their nutritional intake by simply scanning the front of food packages. The design process included information architecture and high fidelity UI design.',
                'skills' => [
                    'uxui'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/TAB_mockup.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/TAB'),
            ],
            [
                'name' => 'Sunlife - Internal training video storyboard',
                'description' => "",
                'skills' => [
                    'graphic'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/Sunlife.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/Sunlife'),
            ],
            [
                'name' => 'Microsoft - Microsoft power platform promotional video storyboard',
                'description' => "",
                'skills' => [
                    'graphic'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/Microsoft.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/Microsoft'),
            ],
            [
                'name' => 'Hong Kong 2022 Power Soul - Social Media Post',
                'description' => "",
                'skills' => [
                    'graphic'
                ],
                'cover_img' => env('APP_URL') . '/assets/wing/projects/cover/PowerSoul.jpg',
                'assets' => $this->getProjectAssets('assets/wing/projects/PowerSoul'),
            ],
        ];

        $user = [
            'nickname' => 'Wing',
            'firstname' => 'Yuen Wing',
            'lastname' => 'Chan',
            'subTitle' => "UXUI DESIGNER / GRAPHIC DESIGNER",
            'headerTitle' => 'PORTFOLIO',
            'skills' => $skills,
            'contacts' => $contacts,
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
        return view('frontend.portfolio.theme2.index', [
            'user' => $user,
            'config' => $config,
        ]);
    }
}
