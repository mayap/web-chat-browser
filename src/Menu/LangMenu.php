<?php

namespace Menu;
class LangMenu extends AbstractMenu
{
    protected $currentStep = 1;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'Изберете:',
            '1 – за български',
            '2 – за английски'
        ]);
    }

    public function getAvailableSteps()
    {
        return [
            1 => new BgMenu(),
            2 => new EnMenu()
        ];
    }
}
