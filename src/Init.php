<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 11:29
 */

namespace Class152\TheLastUebung;


use Class152\TheLastUebung\ControllerFactory\ControllerFactory;
use Class152\TheLastUebung\Exceptions\NotFoundException;
use Class152\TheLastUebung\Exceptions\RedirectException;
use Class152\TheLastUebung\Http\Request;

class Init
{
    public function __construct(){
        try
        {
            $request = new Request($_SERVER['REQUEST_URI']);
            new ControllerFactory( __NAMESPACE__, $request );
        }
        catch ( RedirectException $exception )
        {
            header( "Location: " . $exception->getUrl() );
            exit;
        }
        catch ( NotFoundException $exception )
        {
            echo "Uri not found - ToDo: ErrorPage<br />";
        }
    }
}