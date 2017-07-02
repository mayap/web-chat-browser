<?php
namespace Menu;

class EnOperator extends AbstractMenu
{
    protected $currentStep = 4;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'You chose 9 - connect to an operator',
            'Please wait...',
            'Choose 0 to go back',
            $this->generateRandomTip()
        ]);
    }

    public function getAvailableSteps()
    {
        return [
            0 => new EnMenu(),
        ];
    }

    public function handleMessage($message)
    {
        if ($message == '0') {
            $enMenu = new EnMenu();

            $curr = $enMenu->getOnOpenMessage();
            $curr[0] = 'You returned to the english menu.';
            $enMenu->setOnOpenMessage($curr);
            return $enMenu;
        } else {
            throw new \Exception('Step is not available.');
        }
    }

    public function generateRandomTip()
    {
        $tipArray = [
            'The projects on Web Technologies will be presented on 03.07.',
            'If you want to connect with a lecturer, please write him an e-mail.',
            'You should consider clarifying the requirements for you projects in advance.',
            'You should prepare a documentation for you project on Web Technologies.'
        ];

        $randomNumber = rand(0, count($tipArray) - 1);

        return '<b>' . $tipArray[$randomNumber] . '</b>';
    }
}