<?php
namespace Menu;

class BgComplaints extends AbstractMenu
{
    protected $currentStep = 3;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'Вие избрахте 1 - меню за оплаквания',
            'Моля въведете вашето оплакване',
            'Изберете 0 за назад'
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
        }

        $this->saveMessageToFile($message);

        $bgMenu = new BgMenu();

        $curr = $bgMenu->getOnOpenMessage();
        $curr[0] = 'Вашето оплакване е записано.';
        $bgMenu->setOnOpenMessage($curr);
        return $bgMenu;
    }

    public function saveMessageToFile($message)
    {
        $file = 'complaints.txt';
        $contentArray = [];
        $contentArray = json_decode(file_get_contents($file));
        $contentArray[] = $message;
        file_put_contents($file, json_encode($contentArray));
    }
}
