<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 12:54
 */

namespace Class152\TheLastUebung\Http;


class Request
{
    /** @var string */ 
    private $requestUri;

    /** @var string */
    private $controllerName;

    /** @var string */
    private $actionName;

    /** @var string */
    private $firstAdditionalVar = '2';

    /** @var string */
    private $secondAdditionalVar = '';

    /** @var string */
    private $pattern = '/^\/([^\/]+)(\/([^\/]+)){0,1}(\/([^\/]+)){0,1}(\/([^\/]+)){0,1}/i';

    /**
     * Request constructor.
     * @param $requestUri
     */
    public function __construct( $requestUri )
    {
        $this->requestUri = $requestUri;
        $this->cutUri();
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    /**
     * @return string
     */
    public function getFirstAdditionalVar(): string
    {
        return $this->firstAdditionalVar;
    }

    /**
     * @return string
     */
    public function getSecondAdditionalVar(): string
    {
        return $this->secondAdditionalVar;
    }

// Zerschneidet die Request_URI in Controller und Action plus zwei weiterer Variablen
    private function cutUri()
    {
        $controller = 'home';
        $action = 'index';

        preg_match( $this->pattern, $this->requestUri, $matches );

        if( ! empty( $matches[1] ) ) $controller = $matches[1];
        if( ! empty( $matches[3] ) ) $action = $matches[3];

        $this->controllerName = $this->convertUpperCaseFirst( $controller );
        $this->actionName = strtolower( $action );

        if( ! empty( $matches[5] ) ) $this->firstAdditionalVar = $matches[5];
        if( ! empty( $matches[7] ) ) $this->secondAdditionalVar = $matches[7];
    }

    /**
     * @param $string
     * @return string
     */
    private function convertUpperCaseFirst( $string )
    {
        $string = strtolower( $string );
        $string = ucfirst( $string );
        return $string;
    }

}
   