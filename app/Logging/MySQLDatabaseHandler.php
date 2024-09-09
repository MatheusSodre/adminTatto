<?php
namespace App\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;
use App\Models\Log;

class MySQLDatabaseHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        // Personalize como os logs serão salvos no banco de dados
        Log::create([
            'level' => $record->level->getName(),
            'message' => $record->message,
            'context' => json_encode($record->context),
        ]);
    }
}
