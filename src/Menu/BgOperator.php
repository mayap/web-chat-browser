<?php
namespace Menu;

class BgOperator extends AbstractMenu
{
    protected $currentStep = 4;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'Вие избрахте 9 - връзка с оператор',
            'Моля изчакайте...',
            'Изберете 0 за назад',
            $this->generateRandomTip()
        ]);
    }

    public function getAvailableSteps()
    {
        return [
            0 => new BgMenu(),
        ];
    }

    public function handleMessage($message)
    {
        if ($message == '0') {
            $bgMenu = new BgMenu();

            $curr = $bgMenu->getOnOpenMessage();
            $curr[0] = 'Вие се върнахте в меню на български.';
            $bgMenu->setOnOpenMessage($curr);
            return $bgMenu;
        } else {
            throw new \Exception('Невъзможен ход.');
        }
    }

    public function generateRandomTip()
    {
        $tipArray = [
            'Проектите по Уеб технологии се представят на 03.07.',
            'За връзка с преподавател - пишете на имейл.',
            'Уточнете изискванията си за проекти предварително.',
            'Подгответе документация за проекта по Уеб.'
        ];

        $randomNumber = rand(0, count($tipArray) - 1);

        return '<b>' . $tipArray[$randomNumber] . '</b>';
    }
}