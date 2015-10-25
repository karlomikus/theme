<?php
namespace Karlomikus\Theme\Commands;

use Illuminate\Console\Command;
use Karlomikus\Theme\Theme;

class ThemeListCommand extends Command {

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
     * Theme service.
     *
     * @var Theme
     */
    protected $theme;

    /**
     * Create a new command instance.
     *
     * @param  Theme  $theme
     * @return void
     */
    public function __construct(Theme $theme)
    {
        parent::__construct();

        $this->theme = $theme;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $themes = $this->theme->getThemes();
        $headers = ['Name', 'Author'];

        $output = [];
        foreach ($themes as $theme) {
            $output[]['Name'] = $theme->getName();
            $output[]['Author'] = $theme->getAuthor();
        }

        $this->table($headers, $output);
    }

}