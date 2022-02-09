<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

require __DIR__ . '/../fixtures/texttest_fixture.php';

class CornerStoreTest extends TestCase
{
    use MatchesSnapshots;

    /** @test */
    public function it_tests_snapshot()
    {

        $this->assertMatchesSnapshot(generateReport());
    }
}
