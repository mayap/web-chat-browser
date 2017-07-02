<?php
namespace Menu;
class BgMenu extends AbstractMenu
{
    protected $currentStep = 2;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'Вие избрахте 1 - меню на български език',
            'Изберете:',
            '1 - за оплаквания',
            '2 - за похвали',
            '9 - за оператор',
            '0 - за назад'
        ]);
    }

    public function getAvailableSteps()
    {
        return [
            0 => new LangMenu(),
            1 => new BgComplaints(),
            2 => new BgCompliments(),
            9 => new BgOperator()
        ];
    }
}
