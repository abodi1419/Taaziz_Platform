<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Job::create([
            'user_id'=>'2',
            'company_name'=>'Hireejobsgulf',
            'company_phone'=>'0545454545',
            'company_website'=>'http://www.hireejobsgulf.com/',
            'company_speciality'=>'IT',
            'title'=>'IT Application Developer',
            'type'=>'Full time',
            'location'=>'Jeddah',
            'description'=>'An implementation specialist works with companies that adopt new software systems, making sure the system meets the client?s needs. \nAs an implementation specialist, your duties are to assist with the installation and customization of software as a service (SaaS) systems. \nYour responsibilities include collecting data about company objectives and facilitating training sessions for company employees.\n\n Depending on the size of your client company and the scope of the system implementation, you may work independently or with a team of implementation specialists. \nAs an implementation specialist, you report to an implementation manager or engagement manager.',
        ]);

        Job::create([
            'user_id'=>'2',
            'company_name'=>'T2',
            'company_phone'=>'0545454545',
            'company_website'=>'https://t2.sa/ar',
            'company_speciality'=>'IT',
            'title'=>' Senior PHP Developer',
            'type'=>'Full time',
            'location'=>'Jeddah',
            'description'=>'Strong knowledge of PHP coding and web-based applications.
                            Working with JavaScript.
                            Experience building RESTful API.
                            Strong ability to Integrate with Web services (RESTful/JSON, SOAP services).
                            Familiar with GIT repositories (Bit Bucket).
                            Experience with source control management systems, including Subversion and Git.',
        ]);
        Job::create([
            'user_id'=>'2',
            'company_name'=>'T2',
            'company_phone'=>'0545454545',
            'company_website'=>'https://t2.sa/ar',
            'company_speciality'=>'IT',
            'title'=>'مدير منتج أول - Senior Product Manager',
            'type'=>'Part time',
            'location'=>'Jeddah',
            'description'=>'- خبرة 6 سنوات فأكثر في مجال إدارة المنتجات وتطويرها وتشغيلها منها ٤ سنوات في إدارة المنتجات التقنية.

                            - شهادة البكالوريوس أو الماجستير في مجال الإدارة أو تقنية المعلومات .

                            - عقلية ريادية قادرة على تحقيق الأهداف المرجوة وإيجاد ميزات واستراتيجيات جديدة للمنتج.

                            - القدرة على حل المشكلات، وامتلاك مهارات تنظيمية وتحليلية.

                            - مهارات اتصال قوية مع القدرة على تطوير استراتيجية المنتج بناءً على البحث والاتجاه الجديد في هذا المجال.',
        ]);
        Job::create([
            'user_id'=>'2',
            'company_name'=>'T2',
            'company_phone'=>'0545454545',
            'company_website'=>'https://t2.sa/ar',
            'company_speciality'=>'IT',
            'title'=>'Senior Odoo Developer',
            'type'=>'Part time',
            'location'=>'Remote',
            'description'=>'4years experience in Odoo+.
                            Solid understanding Technical and Functional of standard modules like PoS, Sales, Purchase, Inventory.
                             Solid understanding of Odoo Front end (POS) and past experience is a must.
                            Expert with Integrating 3rd party applications.
                            Expert in PostgreSQL database',
        ]);
        Job::create([
            'user_id'=>'1',
            'company_name'=>'T2',
            'company_phone'=>'0545454545',
            'company_website'=>'https://t2.sa/ar',
            'company_speciality'=>'IT',
            'title'=>'مدير مبيعات',
            'type'=>'Full time',
            'location'=>'Remote',
            'description'=>'درجة البكالولوريوس أو أعلى.
                            ·خبرة أكثر من 5 سنوات في نفس المجال.
                            ·خبرة في بيع المنتجات التقنية.
                            ·القدرة على إدارة فريق مسؤولي المبيعات من 3 الى 5 أشخاص.',
        ]);
        Job::create([
            'user_id'=>'1',
            'company_name'=>'Lean node',
            'company_phone'=>'0545454545',
            'company_website'=>'https://leannode.com/?lang=ar',
            'company_speciality'=>'IT',
            'title'=>'Marketing Specialist',
            'type'=>'Full time',
            'location'=>'Riyadh',
            'description'=>'Responsibilities:
                            - Brainstorm and develop ideas for creative marketing campaigns.
                            - Conduct market research to find answers about consumer requirements, habits and trends.
                            - Plan and execute initiatives to reach the target audience through appropriate channels (social media, e-mail, texts etc.).
                            - Manage the company’s social media profiles and presence, including Instagram, Facebook, Twitter, LinkedIn, Tok-tok, and additional channels that may be deemed relevant..

                            Requirements:
                            -BSc/BA in Marketing or related field.

                            -A minimum of 2 years’ marketing experience engaged in marketing.

                            -Good understanding of marketing principles.

                            -Deep knowledge and understanding of global SEM ad platforms (Google, Bing, etc.)
المهارات التقنية:-

                            -In-depth knowledge and application of Microsoft PowerPoint and creating presentations
المهارات العامة:-

                            -Creative thinker with data-driven analytical mindset.

                            -Ability to thrive in a cross-functional environment while juggling multiple responsibilities.

                            -Strong written and verbal communications in both Arabic and English.

                            -A passion for solving puzzles and the ability to tease out trends/insights from complex data sets

                            -Highly adaptable with a strong sense of teamwork and collaboration.',
        ]);






    }
}
