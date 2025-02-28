<?php declare(strict_types= 1);

#region Namespace
namespace App\Service\Blade;
#endregion

#region Project imports
use App\Service\Shared\Templates\BaseTemplateService;
#endregion

#region Libraries imports
use eftec\bladeone\BladeOne;
#endregion

class BladeService extends BaseTemplateService{
    #region Properties
    private BladeOne $bladeOne;
    #endregion
    #region Constructor 
    public function __construct(string $templateFolder) {
        # Call parent constructor
        parent::__construct($templateFolder, 'blade');
        # Set the template service
        $this->bladeOne = new BladeOne($this->views, $this->cache, BladeOne::MODE_AUTO);
    }
    #endregion
    #region Public methods
    public function render(string $templatePath, array $data = []): string {
        return $this->bladeOne->run($templatePath, $data);
    }
    #endregion
}