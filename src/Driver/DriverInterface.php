<?php

namespace Pogulailo\Unue\Driver;

use Pogulailo\Unue\Report;

interface DriverInterface
{
    /**
     * Start code covering
     *
     * @return void
     */
    public function start(): void;

    /**
     * Stop code covering
     *
     * @return void
     */
    public function stop(): void;

    /**
     * Get report information
     *
     * @return Report\Raw
     */
    public function getReport(): Report\Raw;
}
