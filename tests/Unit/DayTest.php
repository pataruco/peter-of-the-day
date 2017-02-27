<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Day;
use App\File;

class DayTest extends TestCase
{

    use DatabaseTransactions;

    /** @test **/
    public function a_day_should_have_a_date() {
        // given
           $day = new Day();
        // when
           $day->date = '2017-02-27';
        //then
           $this->assertEquals( '2017-02-27', $day->date );
    }

    /** @test **/
    public function a_day_can_have_many_files()
    {
        // given
       $day = factory(\App\Day::class)->make();
       $file = factory(\App\File::class)->make([
            'id' => 1000,
            'name' => 'hola',
            'url' => 'http://www.placehold.it/50x50'
        ]);
        $fileTwo = factory(\App\File::class)->make([
            'id' => 999,
            'name' => 'Chao',
            'url' => 'http://www.placehold.it/100x100'
        ]);
        // when
         $day->files()->save($file);
         $day->files()->save($fileTwo);
        //then
        $this->assertContainsOnly( \App\File::class,  $day->files );
    }
}
