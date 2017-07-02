<?php
namespace Menu;

class EnComplaints extends AbstractMenu
{
    protected $currentStep = 3;

    public function __construct()
    {
        $this->setOnOpenMessage([
            'You chose 1 - menu for complaints',
            'Please enter your complaint',
            'Choose 0 to go back'
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
        }

        $this->saveMessageToFile($message);

        $enMenu = new EnMenu();

        $curr = $enMenu->getOnOpenMessage();
        $curr[0] = 'Your complaint has been saved.';
        $enMenu->setOnOpenMessage($curr);
        return $enMenu;
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
