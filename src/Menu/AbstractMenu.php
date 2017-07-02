<?php
namespace Menu;
abstract class AbstractMenu
{
    protected
        $currentStep,
        $availableSteps = [],
        $onOpenMessage = '';
    protected $message;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentStep()
    {
        return $this->currentStep;
    }

    /**
     * @param $currentStep
     * @return $this
     */
    public function setCurrentStep($currentStep)
    {
        $this->currentStep = $currentStep;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvailableSteps()
    {
        return $this->availableSteps;
    }

    /**
     * @param $availableSteps
     * @return $this
     */
    public function setAvailableSteps($availableSteps)
    {
        $this->availableSteps = $availableSteps;
        return $this;
    }

    /**
     * @return string
     */
    public function getOnOpenMessage()
    {
        return $this->onOpenMessage;
    }

    /**
     * @param $onOpenMessage
     * @return $this
     */
    public function setOnOpenMessage($onOpenMessage)
    {
        $this->onOpenMessage = $onOpenMessage;
        return $this;
    }

    /**
     * @param $message
     * @return mixed
     * @throws \Exception
     */
    public function handleMessage($message)
    {
        $availableSteps = $this->getAvailableSteps();
        if (! isset($availableSteps[$message])) {
            $this->throwException();
            // TODO create custom exception
        }
        return $availableSteps[$message];
    }

    public function throwException()
    {
        throw new \Exception('Невъзможен ход');
    }
}
