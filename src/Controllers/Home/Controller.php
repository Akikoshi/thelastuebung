<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 13:22
 */

namespace Class152\TheLastUebung\Controllers\Home;


use Class152\TheLastUebung\Library\TwigRendering;

class Controller
{
    public function indexAction()
    {
        new TwigRendering(
            'Home/index.twig',
            [
                'controllerName'=>'home',
                'action'=>'index'
            ]
        );
    }
}