<?php
namespace Menu;

class LangMenu extends AbstractMenu
{
    protected $currentStep = 1;

    public function __construct()
    {
        $this->setOnOpenMessage('Изберете 1 – за български, изберете 2 – за английски, 9 – за оператор');

        $this->setAvailableSteps([
            1 => new BgMenu(),
            2 => new EnMenu(),
        ]);
    }
}
