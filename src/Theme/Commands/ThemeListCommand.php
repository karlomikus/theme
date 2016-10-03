<?php
namespace Karlomikus\Theme\Commands;

use Illuminate\Console\Command;
use Karlomikus\Theme\Contracts\ThemeInterface;

class ThemeListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all available themes';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $themes = $this->laravel[ThemeInterface::class]->all();
        $headers = ['Name', 'Author', 'Namespace'];

        $output = [];
        foreach ($themes as $theme) {
            $output[] = [
                'Name'      => $theme->getName(),
                'Author'    => $theme->getAuthor(),
                'Namespace' => $theme->getNamespace()
            ];
        }

        $this->table($headers, $output);
    }
}
