<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileTest extends TestCase
{
    /** @test **/
    public function a_file_belongs_to_a_day()
    {
        // given
        $day = factory(\App\Day::class)->make();
        $file = factory(\App\File::class)->make();
        // when
        $file->day()->associate( $day );
        $file->save();
        //then
        $this->assertEquals( $day->id, $file->day->id  );
    }
}
