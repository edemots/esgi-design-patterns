<?php

namespace DesignPatterns\IW1;

interface BookInterface
{
    public function getDetails(int $depth = 0): string;

    public function getPrice(): float;

    public function getPegi(): int;

    public function getTitle(): string;

    public function makeAvailable(): void;

    public function makeUnavailable(): void;

    public function isAvailable(): bool;
}
