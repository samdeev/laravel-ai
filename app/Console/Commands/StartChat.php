<?php

namespace App\Console\Commands;

use App\AI\Chat;
use Illuminate\Console\Command;
use function Laravel\Prompts\{outro, text, info, spin};

class StartChat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start chatting with OpenAI';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $question = text(
            label: 'How can I help you today?',
            required: true
        );

        $chat = new Chat();

        $response = spin(fn () => $chat->send($question), 'Generating response...');

        info($response);

        while ($question = text('Message ChatGPT...') ?? false) {

            $response = spin(fn () => $chat->send($question), 'Generating response...');

            info($response);
        }

    }
}
