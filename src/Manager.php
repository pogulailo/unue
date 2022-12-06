<?php

namespace Pogulailo\Unue;

use Pogulailo\Unue\Driver\DriverInterface;
use Pogulailo\Unue\Transport\TransportInterface;
use Throwable;

class Manager
{
    /** @var DriverInterface $driver */
    private DriverInterface $driver;

    /** @var TransportInterface $transport */
    private TransportInterface $transport;

    /**
     * @param DriverInterface $driver
     * @param TransportInterface $transport
     */
    public function __construct(
        DriverInterface $driver,
        TransportInterface $transport
    ) {
        $this->driver = $driver;
        $this->transport = $transport;
    }

    /**
     * Start collecting coverage data
     *
     * @return void
     */
    public function start(): void
    {
        $this->driver->start();
    }

    /**
     * Stop collecting coverage data
     *
     * @return void
     */
    public function stop(): void
    {
        $this->driver->stop();
        $report = $this->driver->getReport();

        try {
            $this->transport->send($report);
        } catch (Throwable $exception) {
            // Don't stop execution due to package errors
        }
    }
}
