<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Menu\LangMenu;

class Chat implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function findClient(ConnectionInterface $conn)
    {
        $clients = $this->clients;

        foreach ($clients as $client) {
            if ($client->conn === $conn) {
                return $client;
            }
        }

        throw new \Exception('Cannot find client.');
    }

    public function onOpen(ConnectionInterface $conn)
    {
        echo 123;die;
        $client = new \stdClass();
        $client->conn = $conn;
        $client->handler = new LangMenu();

        // Store the new connection to send messages to later
        $this->clients->attach($client);

        $conn->send('Вие се свързахте с оператор.');
        $conn->send($client->handler->getOnOpenMessage());
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $client = $this->findClient($from);

        $newHandler = $client->handler->handleMessage($msg);
        $client->conn->send($newHandler->getOnOpenMessage());

        $this->clients->detach($client);
        $client->handler = $newHandler;
        $this->clients->attach($client);
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {

        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}