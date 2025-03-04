<?php declare(strict_types= 1);

#region Namespace
namespace App\Service\Shared\Templates;
#endregion

abstract class BaseTemplateService {
    #region Properties
    protected readonly string $views;
    protected readonly string $cache;
    #endregion
    #region Constructor 
    public function __construct(
        string $projectDir,
        string $views, 
    ) {
        $this->views = static::joinPaths($projectDir, 'templates', $views);
        $this->cache = static::joinPaths($projectDir, 'var', 'cache', $views);
    }
    #endregion
    #region Public methods
    abstract public function render(string $templatePath, array $data = []): string;
    #endregion
    #region Protected methods
    final protected static function joinPaths(string ...$paths): string {
        return implode(DIRECTORY_SEPARATOR, $paths);
    }
    #endregion
}