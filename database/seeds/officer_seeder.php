<?php
use Illuminate\Database\Seeder;

class officer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Office::create(
            [
                'office_id' => 1,
                'member_since' => '1970',
                'office_name' => 'internet sol',
                'office_address' => 'Lahore',
                'office_phone' => '9394839834',
                'office_email' => 'email@com.com',
                'office_logo' => 'img.png'
            ]
        );
    }
}
