<?php
namespace Karlomikus\Theme\Commands;

use Illuminate\Console\Command;
use Karlomikus\Theme\Theme;

class ThemeMakeCommand extends COmmand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new theme folder';

    /**
     * Theme service.
     *
     * @var Theme
     */
    protected $theme;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('TODO');
    }
}