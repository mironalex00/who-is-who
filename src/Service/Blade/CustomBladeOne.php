<?php declare(strict_types= 1);

#region Namespace
namespace App\Service\Blade;
#endregion

#region Libraries imports
use eftec\bladeone\BladeOne;
#endregion

final class CustomBladeOne extends BladeOne {
    #region Constants
    public const PHP_COMMENTS   =   0;
    public const HTML_COMMENTS  =   1;
    public const NO_COMMENTS    =   2;
    #endregion
    #region Constructor
    public function __construct(
        string $templatePath, 
        string $compiledPath = null, 
        int $mode = parent::MODE_AUTO, 
        int $commentMode = self::PHP_COMMENTS
    ) {
        $this->checkTemplatePath($templatePath);
        $this->checkCompiledPath($compiledPath);
        parent::__construct($templatePath, $compiledPath, $mode, $commentMode);
    }
    #endregion
    #region Private methods
    private function checkPath(string $path): bool {
        if(file_exists($path)){
            if(is_dir($path)) 
                return true;
            if(is_file($path)) 
                return true;
        }
        return false;
    }
    private function checkPathOrThrow(string $path): void {
        if(!$this->checkPath($path)){
            $this->showError(
                'checkPath', 
                "The path '$path' does not exist", 
                true, 
                true
            );
        }
    }
    private function checkTemplatePath(string $path): void {
        $this->checkPathOrThrow($path);
    }
    private function checkCompiledPath(string $compiledPath): void {
        if(!$this->checkPath($compiledPath)){
            if(!mkdir($compiledPath, 0777, true)){
                $this->showError(
                    'mkdir', 
                    "The path '$compiledPath' could not be created", 
                    true, 
                    true
                );
            }
        }
    }
    #endregion
}