<?php

namespace App\Helpers\Logger;

use Hedii\LaravelGelfLogger\Processors\RenameIdFieldProcessor;
use Monolog\LogRecord;

class Processor extends RenameIdFieldProcessor
{
    public function __invoke(LogRecord $record): LogRecord
    {
        $context = $record->context;

        if (array_key_exists('id', $context)) {
            $context['_id'] = $context['id'];
            unset($context['id']);
        }
        $context['order'] = floor(microtime(true) * 1000);
        return $record->with(context: $context);
    }
}
