<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 13:12
 */

namespace Class152\TheLastUebung\Interfaces;


use Class152\TheLastUebung\Http\Request;

interface ControllerInterface
{
    /**
     * ControllerInterface constructor.
     * @param Request $request
     * @param SessionService $sessionService
     */
    public function __construct( Request $request, SessionService $sessionService );

    /**
     * shows an default page
     */
    public function indexAction();
}