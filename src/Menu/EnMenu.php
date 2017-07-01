<?php
namespace Menu;

class EnMenu extends AbstractMenu
{
    protected $currentStep = 2;

    public function __construct()
    {
        $this->setOnOpenMessage('You chose 1, choose 1 - for complaints, 2 for compliment, 9 for operator, 0 to go back');

        $this->setAvailableSteps([
            0 => new LangMenu(),

        ]);
    }
}
