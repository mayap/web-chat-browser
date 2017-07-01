<?php
namespace Menu;

class BgMenu extends AbstractMenu
{
    protected $currentStep = 2;

    public function __construct()
    {
        $this->setOnOpenMessage('Вие избрахте 1, изберете 1 – за оплаквания, 2 за похвали, 9 за оператор, 0 за назад');

        $this->setAvailableSteps([
            0 => new LangMenu(),
        ]);
    }
}
