<?php

namespace Unit;

use Fixtures\BackedFrom;
use PHPUnit\Framework\TestCase;

use function dirname;

/** @covers \A6a\FromDir\BackedFrom */
class BackedFromTest extends TestCase
{
    /**
     * @param string $alias One of the available aliases for the directory method.
     *
     * @test
     * @dataProvider directoryFunctionAliases
     */
    public function it_converts_the_case_name_to_a_directory_relative_to_the_downstream_package_root(
        string $alias
    ): void {
        $this->assertSame(dirname(__DIR__, 1) . '/', BackedFrom::TESTS->$alias());
    }

    /** @return array<string, array{0: string}> */
    public function directoryFunctionAliases(): array
    {
        return [
            'directory' => ['directory'],
            'dir' => ['dir'],
            'asDir' => ['asDir'],
            'asDirectory' => ['asDirectory'],
            'asDirectoryInPackageRoot' => ['asDirectoryInPackageRoot'],
        ];
    }

    /**
     * @param string $alias One of the available aliases for the directory method.
     *
     * @test
     * @dataProvider directoryFunctionAliases
     */
    public function it_converts_the_special_case_name_having_only_triple_underscores_to_the_downstream_package_root(
        string $alias
    ): void {
        $this->assertSame(dirname(__DIR__, 2) . '/', BackedFrom::___->$alias());
    }

    /**
     * @param string $alias One of the available aliases for the directory method.
     *
     * @test
     * @dataProvider directoryFunctionAliases
     */
    public function it_replaces_triple_underscores_in_case_names_with_directory_separators(string $alias): void
    {
        $this->assertSame(__DIR__ . '/', BackedFrom::TESTS___UNIT->$alias());
    }
}
