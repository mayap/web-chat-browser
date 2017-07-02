<?php
namespace Menu;
class EnMenu extends AbstractMenu
{
    protected $currentStep = 2;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'You chose 2 - english menu',
            'Choose:',
            '1 - for complaints',
            '2 - for compliments',
            '9 - for operator',
            '0 - to go back'
        ]);

        $this->setAvailableSteps([
            0 => new LangMenu(),
            1 => new EnComplaints(),
            2 => new EnCompliments(),
            9 => new EnOperator()
        ]);
    }

    public function throwException()
    {
        throw new \Exception('Step is not available.');
    }
}
