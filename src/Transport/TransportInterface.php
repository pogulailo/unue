<?php

namespace Pogulailo\Unue\Transport;

use Pogulailo\Unue\Report;

interface TransportInterface
{
    /**
     * Send coverage report
     *
     * @param Report\Raw $report
     *
     * @return mixed
     */
    public function send(Report\Raw $report);
}