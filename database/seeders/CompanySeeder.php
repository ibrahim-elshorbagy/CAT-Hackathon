<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $companies = [
            [
                'id' => 1,
                'name' => 'Roqay',
                'email' => 'ta@roqay.com',
                'phone' => "Not available",
                'address' => 'Dakahlia, Mansoura',
                'website' => 'https://roqay.com',
                'description' => 'ROQAY is a software development company Established by the end of 2015 and scaled up over the years. specialized in: Business Applications, Artificial intelligence Applications, Mobile Application, Digital Transformation, Websites & Web Apps',
                'industry' => 'Software Development',
                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
            ],
            [
                'id' => 2,
                'name' => 'Digital business system',
                'email' => 'info@dbsmena.com',
                'phone' => "Not available",
                'address' => 'Cairo, New Cairo',
                'website' => 'https://www.dbsmena.com',
                'description' => 'DBS’s first physical presence was in KSA in 2016, serving its customers from multiple industries that enabled our resources with the capabilities & enough expertise to penetrate Egypt’s market in 2019 which was considered as a success story given the challenges at that time. With DBS’s physical presence in Egypt the resources & the team started serving our customers in the region.',
                'industry' => 'Software Development',
                'logo' => "https://www.dbsmena.com/wp-content/uploads/cropped-dbsmena2021-logo-1.png",
            ],
            [
                'id' => 3,
                'name' => 'neoxero',
                'email' => "info@neoxero.com",
                'phone' => "+201008840550",
                'address' => 'Cairo, New Cairo',
                'website' => 'neoxero.com',
                'description' => 'Boubyan Digital Factory specializes in creating cutting-edge Business Applications, Artificial intelligence Applications, Mobile Application.',
                'industry' => 'Software Development',
                'logo' => "https://neoxero.com/wp-content/themes/nxwp/assets/img/neoxero.png",
            ],
            [
                'id' => 4,
                'name' => 'onesolutionc',
                'email' => "Info@onesolutionc.com",
                'phone' => " +201004777783",
                'address' => 'El-Nasr Rd, Al Manteqah Al Oula, Nasr City',
                'website' => 'https://www.onesolutionc.com/',
                'description' => 'One Solution provides innovative IT consulting and software solutions, specializing in ERP, web and mobile app development, RFID, and cloud services. As an Odoo Gold Partner, they empower businesses in Kuwait, Egypt, and the MENA region with tailored technology solutions to streamline operations and drive growth.',
                'industry' => 'Software Development',
                'logo' => "https://www.onesolutionc.com/web/image/website/1/logo/ONE%20Solution?unique=363d145",
            ],
            [
                'id' => 5,
                'name' => 'Boubyan digital factory',
                'email' => "Not available",
                'phone' => "+9651820082",
                'address' => 'Cairo, New Cairo',
                'website' => 'https://boubyan.bankboubyan.com/',
                'description' => 'Boubyan Digital Factory specializes in creating cutting-edge Business Applications, Artificial intelligence Applications, Mobile Application.',
                'industry' => 'Software Development',
                'logo' => "https://boubyan.bankboubyan.com/media/filer_public/66/c8/66c8be89-9f4c-4837-aad8-e9c0a9b9712b/boubyandigitalfactorylogo-01.png",
            ],
            [
                'id' => 6,
                'name' => 'Lavaloon',
                'email' => 'Info@lavaloon.com',
                'phone' => "Not available",
                'address' => 'Cairo, Nasr City',
                'website' => 'Lavaloon.com',
                'description' => 'Lavaloon is your trusted partner for seamless integration and automation, helping businesses accelerate their digital transformation. As a Frappe and ERPNext partner, we connect applications, data, and people to boost efficiency and growth.',
                'industry' => 'Software Development',
                'logo' => "https://lavaloon.com/files/logo_lavaloon.png",
            ],
            [
                'id' => 7,
                'name' => 'Al Badr for Smart Systems',
                'email' => "Not available",
                'phone' => " 01061660342",
                'address' => ' Samannoud – Gharbia',
                'website' => 'https://albadrsystems.com/ar/',
                'description' => 'Al-Badr Smart Systems provides innovative website design services for individuals and businesses, tailored to meet their specific goals. Our designs are optimized for modern devices, including smartphones, and cater to personal, corporate, news, school, and e-commerce websites',
                'industry' => 'Software Development',
                'logo' => "https://albadrsystems.com/wp-content/themes/bss/img/logoa.png",
            ],


        ];

        $jobs = [
            [
                'name' => 'Software Developer',
                'description' => 'Develop and maintain software applications for the company.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/8004/8004415.png"
            ],
            [
                'name' => 'Project Manager',
                'description' => 'Oversee projects and ensure timely completion.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/3234/3234972.png"

            ],
            [
                'name' => 'UI/UX Designer',
                'description' => 'Design user interfaces and improve user experiences.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/5047/5047314.png"

            ],
            [
                'name' => 'Backend Developer',
                'description' => 'Build and maintain the server-side logic and APIs.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/6213/6213731.png"

            ],
            [
                'name' => 'Frontend Developer',
                'description' => 'Create and enhance the client-side interface of web applications.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/7190/7190498.png"

            ],
            [
                'name' => 'Laravel Developer',
                'description' => 'Develop web applications using the Laravel framework.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/2721/2721652.png"

            ],
            [
                'name' => 'React Developer',
                'description' => 'Develop front-end web applications using React.js.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/17267/17267160.png"

            ],
            [
                'name' => 'React Native Developer',
                'description' => 'Build mobile applications using React Native.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/2497/2497631.png"

            ],
            [
                'name' => 'Data Analyst',
                'description' => 'Analyze and interpret data to support business decisions.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/4240/4240994.png"

            ],
            [
                'name' => 'DevOps Engineer',
                'description' => 'Automate and streamline the software development and deployment process.',
                'logo'=>"https://cdn-icons-png.flaticon.com/512/5680/5680036.png"

            ],
        ];

        foreach ($companies as $company) {
            DB::table('companies')->insert([
                'id' => $company['id'],
                'name' => $company['name'],
                'email' => $company['email'],
                'phone' => $company['phone'],
                'address' => $company['address'],
                'website' => $company['website'],
                'description' => $company['description'],
                'industry' => $company['industry'],
                'logo' => $company['logo'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $randomJobs = $this->getRandomJobs($jobs, 3);
            foreach ($randomJobs as $job) {
                DB::table('cjobs')->insert([
                    'name' => $job['name'],
                    'description' => $job['description'],
                    'company_id' => $company['id'],
                    'contact_email' => 'job@' . strtolower($company['name']) . '.com',
                    'contact_phone' => $company['phone'],
                    'logo' => $job['logo'],
                    'field' => $this->getFieldFromJob($job['name']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function getRandomJobs($jobs, $count)
    {
        $randomKeys = array_rand($jobs, $count);
        $randomJobs = [];
        foreach ($randomKeys as $key) {
            $randomJobs[] = $jobs[$key];
        }
        return $randomJobs;
    }

    private function getFieldFromJob($jobName)
    {
        $fieldMap = [
            'Software Developer' => 'Development',
            'Project Manager' => 'Management',
            'UI/UX Designer' => 'Design',
            'Backend Developer' => 'Backend Development',
            'Frontend Developer' => 'Frontend Development',
            'Laravel Developer' => 'Laravel Development',
            'React Developer' => 'Frontend Development',
            'React Native Developer' => 'Mobile Development',
            'Data Analyst' => 'Data Analysis',
            'DevOps Engineer' => 'DevOps',
        ];

        return $fieldMap[$jobName] ?? 'Other';
    }
}
