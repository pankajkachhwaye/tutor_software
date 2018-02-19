<?php

use Illuminate\Database\Seeder;
use App\Model\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mems = [
            'category_01' => ['phone_no' => '9971246087', 'created_at' => \Carbon\Carbon::now()],
            'category_02' => ['phone_no' => '9827698850', 'created_at' => \Carbon\Carbon::now()],
            'category_03' => ['phone_no' => '9015512345', 'created_at' => \Carbon\Carbon::now()],
            'category_04' => ['phone_no' => '7845621452', 'created_at' => \Carbon\Carbon::now()],
            'category_05' => ['phone_no' => '9854752106', 'created_at' => \Carbon\Carbon::now()],

        ];

        foreach ($mems as $code => $sys) {
            $mem = new Contact();
            $mem->phone_no = $sys['phone_no'];
            $mem->created_at = $sys['created_at'];
            $mem->save();
        }
    }
}
