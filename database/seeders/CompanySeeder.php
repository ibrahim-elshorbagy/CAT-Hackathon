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
         DB::table('companies')->insert([
            [
                'name' => 'شركة رقي Roqay',
                'email' => 'ta@roqay.com',
                'phone' => "01012345679",
                'address' => 'الدقهلية, المنصورة',
                'website' => 'https://roqay.com',
                'description' => '
                    ROQAY is a software development company Established by the end of 2015 and scaled up over the years.
                    specialized in:
                    Business Applications
                    Artificial intelligence Applications
                    Mobile Application
                    Digital Transformation
                    Websites & Web Apps',
                'industry' => 'Software Development',
                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'wajz information technology',
                'email' => 'hr@wajz.sa',
                'phone' => "01012345679",
                'address' => 'الدقهلية, المنصورة',
                'website' => 'www.wajz.sa',
                'description' => 'شركات تطوير البرمجة المخصصة, شركات تصميم تطبيقات الجوال, شركات تصميم مواقع الويب, شركات تصميم وتطوير مواقع التجارة الإلكترونية, شركات تطوير البرمجيات التعليمية, شركات تصميم وتطوير واجهات المستخدم',
                'industry' => 'Software Development',
                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital business system',
                'email' => '@dbsmean',
                'phone' => "0101213456789",
                'address' => 'القاهره, القاهره الجديده',
                'website' => 'https://www.dbsmena.com',
                'description' => 'شركات تصميم تطبيقات الجوال, شركات تصميم مواقع الويب, شركات تصميم وتطوير مواقع التجارة الإلكترونية, شركات تطوير تطبيقات سطح المكتب',
                'industry' => 'Software Development',
                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Boubyan digital factory',
                'email' => null,
                'phone' => null,
                'address' => 'القاهرة, مصر الجديده',
                'website' => 'https://boubyan.bankboubyan.com/en/boubyan-digital',
                'description' => null,
                'industry' => 'Digital Factory',
                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lavaloon',
                'email' => 'Info@lavaloon.com',
                'phone' => "0123456789",
                'address' => 'القاهرة, مدينة نصر',
                'website' => 'Lavaloon.com',
                'description' => 'ركات تطوير البرمجة المخصصة, شركات تصميم تطبيقات الجوال, شركات تصميم مواقع الويب, شركات تطوير البرمجة مفتوحة المصدر',
                'industry' => 'Software Development',
                                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Datenlotsen',
                'email' => null,
                'phone' => "123456789",  // No phone data provided
                'address' => 'البحر الأحمر, الغردقة',
                'website' => 'https://www.datenlotsen.de/en/',
                'description' => null,
                'industry' => 'Software Solutions',
                                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Awamer Elshabaka',
                'email' => 'HR@aait.sa',
                'phone' => null,
                'address' => 'الدقهلية, المنصورة',
                'website' => 'https://aait.sa/',
                'description' => 'AAIT',
                'industry' => 'IT Solutions',
                                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'البدر للنظم الذكية',
                'email' => null,
                'phone' => null,
                'address' => 'الغربية, سمنود',
                'website' => 'https://albadrsystems.com/ar/',
                'description' => null,
                'industry' => 'Smart Systems',
                                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quarizm',
                'email' => 'Info@quarizm.tech',
                'phone' => null,
                'address' => 'Remote, Remote - head office reyad saudi',
                'website' => 'https://quarizm.tech/',
                'description' => null,
                'industry' => 'Tech Solutions',
                                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'serv5 web solutions',
                'email' => 'hr@serv5.com',
                'phone' => "0123456789",
                'address' => 'الدقهلية, المنصورة',
                'website' => 'serv5.com.eg',
                'description' => null,
                'industry' => 'Web Solutions',
                                'logo' => "https://roqay.com/wp-content/uploads/2022/08/roqay-profile.pngي.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
