<?php

namespace Pogulailo\Unue\Report;

class File
{
    /** @var string $path */
    private string $path;

    /** @var array $coverage */
    private array $coverage;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Cover line of code
     *
     * @param int $lineNumber
     * @return void
     */
    public function coverLine(int $lineNumber): void
    {
        $this->coverage[$lineNumber] = true;
    }

    /**
     * Uncover line of code
     *
     * @param int $lineNumber
     * @return void
     */
    public function uncoverLine(int $lineNumber): void
    {
        $this->coverage[$lineNumber] = false;
    }

    /**
     * Get file path
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get file coverage
     *
     * @return array
     */
    public function getCoverage(): array
    {
        return $this->coverage;
    }
}
