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
    public function __construct(string $views, string $cache) {
        $this->views = static::joinPaths(dirname(__DIR__, 2) ,'templates', $views);
        $this->cache = static::joinPaths(dirname(__DIR__,2), 'var', 'cache', $cache);
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