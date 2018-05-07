<?php
namespace Concrete\Theme\Elemental;

use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;
use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme implements ThemeProviderInterface
{
    public function getThemeName()
    {
        return t('Tease & Company C5 Theme');
    }

    public function getThemeDescription()
    {
        return t('Custom Tease & Company Concrete5 theme built by Tina Vandervecht.');
    }

    /**
     * @return array
     */
    public function getThemeEditorClasses()
    {
        return [
            [
                'title' => t('Heading Styles'),
                'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
                'attributes' => array('class' => 'heading-styles')
            ],
        ];
    }
}
