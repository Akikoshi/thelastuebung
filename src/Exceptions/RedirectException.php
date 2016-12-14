<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 11:53
 */

namespace Class152\TheLastUebung\Exceptions;


class RedirectException extends TheLastUebungExeption
{
    /** @var string */
    protected $url = '/';
    
    /**
     * @var string
     */
    protected $statusCode = '302';
    
    /**
     * @param string $url
     */
    public function setRedirectUrl( string $url = '/' )
    {
        $this->url = $url;
    }
    
    /**
     * @param int $statusCode
     */
    public function setStatusCode( int $statusCode = 302 )
    {
        $this->statusCode = $statusCode;
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }
}