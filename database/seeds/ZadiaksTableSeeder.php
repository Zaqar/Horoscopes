<?php

use Illuminate\Database\Seeder;

class ZadiaksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('zadiaks')->insert([
            ['name'=>'Овен','image'=>'овен.png','start_month'=>'2018-03-21','end_month'=>'2018-04-19'],
            ['name'=>'Телец','image'=>'телец.png','start_month'=>'2018-04-20','end_month'=>'2018-05-20'],
            ['name'=>'','image'=>'близнецы.png','start_month'=>'2018-05-21','end_month'=>'2018-06-20'],
            ['name'=>'Рак','image'=>'рак.png','start_month'=>'2018-06-21','end_month'=>'2018-07-22'],
            ['name'=>'Лев','image'=>'лев.png','start_month'=>'2018-07-23','end_month'=>'2018-08-22'],
            ['name'=>'Дева','image'=>'дева.png','start_month'=>'2018-08-23','end_month'=>'2018-09-22'],
            ['name'=>'Весы','image'=>'весы.png','start_month'=>'2018-09-23','end_month'=>'2018-10-22'],
            ['name'=>'Скорпион','image'=>'скорпион.png','start_month'=>'2018-10-23','end_month'=>'2018-11-21'],
            ['name'=>'Стрелец','image'=>'стрелец.png','start_month'=>'2018-11-22','end_month'=>'2018-12-21'],
            ['name'=>'Козерог','image'=>'козерог.png','start_month'=>'2018-12-22','end_month'=>'2018-01-19'],
            ['name'=>'Водолей','image'=>'водолей.png','start_month'=>'2018-01-20','end_month'=>'2018-02-18'],
            ['name'=>'Рыбы','image'=>'рыбы.png','start_month'=>'2018-02-19','end_month'=>'2019-03-20'],
            ['name'=>'Для всех знаков','image'=>'все.png','start_month'=>'2018-01-01','end_month'=>'2018-01-01']
        ]);
    }
}
