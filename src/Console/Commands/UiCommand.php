<?php

namespace Brnbio\LaravelUi\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Class UiCommand
 * @package Brnbio\LaravelUi\Console\Commands
 */
class UiCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'ui';

    /**
     * @var string
     */
    protected $description = 'Generate ui';

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->_updatePackageJson();
        $this->_copyResources();
        $this->info('Run npm install && npm run dev');
    }

    /**
     * @return UiCommand
     */
    private function _updatePackageJson(): UiCommand
    {
        $packageJson = base_path('package.json');

        $file = json_decode(file_get_contents($packageJson), true);
        $file['devDependencies']['laravel-mix'] = '^5.0.1';
        $file['devDependencies']['bootstrap'] = '^4.5';
        $file['devDependencies']['jquery'] = '^3.2';
        $file['devDependencies']['popper.js'] = '^1.16';
        $file['devDependencies']['sass'] = '^1.15.2';
        $file['devDependencies']['sass-loader'] = '^8.0';
        $file['devDependencies']['@fortawesome/fontawesome-free'] = '^5.13.0';
        $file['devDependencies']['roboto-sass'] = '^1.0.4';

        file_put_contents($packageJson, json_encode($file, JSON_PRETTY_PRINT));

        return $this;
    }

    /**
     * @return UiCommand
     */
    private function _copyResources(): UiCommand
    {
        $baseDir = str_replace('src/Console/Commands', '', __DIR__);

        // sass
        $targetDir = base_path('resources/sass/ui');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        copy($baseDir . 'resources/sass/_variables.scss', base_path('resources/sass/ui/_variables.scss'));
        copy($baseDir . 'resources/sass/_app.scss', base_path('resources/sass/ui/_app.scss'));

        // views
        $targetDir = base_path('resources/views/_ui');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        copy($baseDir . 'resources/views/app.blade.php', base_path('resources/views/_ui/app.blade.php'));

        $targetDir = base_path('resources/views/_ui/html');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        copy($baseDir . 'resources/views/html/head.blade.php', base_path('resources/views/_ui/html/head.blade.php'));
        copy($baseDir . 'resources/views/html/navbar-top.blade.php', base_path('resources/views/_ui/html/navbar-top.blade.php'));
        copy($baseDir . 'resources/views/html/navbar-second.blade.php', base_path('resources/views/_ui/html/navbar-second.blade.php'));
        copy($baseDir . 'resources/views/html/footer.blade.php', base_path('resources/views/_ui/html/footer.blade.php'));
        copy($baseDir . 'resources/views/html/scripts.blade.php', base_path('resources/views/_ui/html/scripts.blade.php'));

        return $this;
    }
}
