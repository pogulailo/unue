<?php

namespace Pogulailo\Unue\Report;

use Pogulailo\Unue\Report;

class Raw
{
    /** @var array $files */
    private array $files = [];

    /**
     * Add file to report
     *
     * @param File $file
     *
     * @return void
     */
    public function addFile(File $file): void
    {
        $this->files[] = $file;
    }

    /**
     * Get report files
     *
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * Generate raw report from PCOV
     *
     * @param array $reportData
     * @return static
     */
    public static function fromPcov(array $reportData): self
    {
        $report = new Report\Raw();

        foreach ($reportData as $name => $coverage) {
            $file = new Report\File($name);

            foreach ($coverage as $lineNumber => $coverageData) {
                if ($coverageData === -1) {
                    $file->uncoverLine($lineNumber);
                }

                if ($coverageData === 1) {
                    $file->coverLine($lineNumber);
                }
            }

            $report->addFile($file);
        }

        return $report;
    }
}
