<?php declare(strict_types= 1);

#region Namespace
namespace App\Service\Blade;
#endregion

#region Project imports
use App\Service\Shared\Templates\BaseTemplateService;
#endregion

#region Libraries imports
use Symfony\Component\DependencyInjection\Attribute\Autowire;
#endregion

class BladeService extends BaseTemplateService{
    #region Properties
    private CustomBladeOne $bladeOne;
    #endregion
    #region Constructor 
    public function __construct(
            #[Autowire('%kernel.project_dir%')]   
            string $project,
            #[Autowire('%template.folder%')]            
            string $engine,
        ) {
        # Call parent constructor
        parent::__construct($project, $engine, );
        # Set the template service
        $this->bladeOne = new CustomBladeOne($this->views, $this->cache);
    }
    #endregion
    #region Public methods
    public function render(string $templatePath, array $data = []): string {
        return $this->bladeOne->run($templatePath, $data);
    }
    #endregion
}