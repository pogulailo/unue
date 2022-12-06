<?php

namespace Pogulailo\Unue\Driver;

use Pogulailo\Unue\Exception\DriverNotInstalledException;
use Pogulailo\Unue\Report;

class Pcov implements DriverInterface
{
    /**
     * @throws DriverNotInstalledException
     */
    public function __construct()
    {
        if (!extension_loaded('pcov')) {
            throw new DriverNotInstalledException('PCOV not installed');
        }
    }

    /**
     * @inheritDoc
     */
    public function start(): void
    {
        \pcov\start();
    }

    /**
     * @inheritDoc
     */
    public function stop(): void
    {
        \pcov\stop();
    }

    /**
     * @inheritDoc
     */
    public function getReport(): Report\Raw
    {
        $reportData = \pcov\collect();
        return Report\Raw::fromPcov($reportData);
    }
}
