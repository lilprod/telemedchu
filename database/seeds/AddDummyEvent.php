<?php

use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Demo Event-1', 'start_date'=>'2019-07-03', 'end_date'=>'2019-07-05'],
        	['title'=>'Demo Event-2', 'start_date'=>'2019-07-11', 'end_date'=>'2019-07-13'],
        	['title'=>'Demo Event-3', 'start_date'=>'2019-07-09', 'end_date'=>'2019-07-09'],
        ];
        foreach ($data as $key => $value) {
        	Event::create($value);
        }
    }
}
