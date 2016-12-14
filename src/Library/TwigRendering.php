<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 12:16
 */

namespace Class152\TheLastUebung\Library;


use Class152\TheLastUebung\Configurations\TemplateConfig;

class TwigRendering
{
    private $templatePath;
    
    public function __construct(string $template, array $variables)
    {
        $this->templatePath = TemplateConfig::getPath();
        \Twig_Autoloader::register();

        $loader = new \Twig_Loader_Filesystem($this->templatePath);
        $twig = new \Twig_Environment($loader, array( ));
        $twig->display($template, $variables);
    }
}