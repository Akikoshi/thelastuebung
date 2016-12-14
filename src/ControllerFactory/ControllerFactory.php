<?php
/**
 * Created by PhpStorm.
 * User: Heiset
 * Date: 14.12.2016
 * Time: 12:51
 */

namespace Class152\TheLastUebung\ControllerFactory;


use Class152\TheLastUebung\Exceptions\NotFoundException;
use Class152\TheLastUebung\Http\Request;
use Class152\TheLastUebung\Interfaces\ControllerInterface;

class ControllerFactory
{
    /** @var string */
    private $namespace;

    /** @var Request */
    private $request;

    /** @var ControllerInterface */
    private $controllerInstance;

    /** @var string */
    private $classPath;

    /** @var string */
    private $classWithNamespace;

    /**
     * ControllerFactory constructor.
     *
     * @param string   $namespace
     * @param Request  $request
     */
    public function __construct( string $namespace, Request $request )
    {
        $this->namespace = $namespace;
        $this->request = $request;
        $this->generateClassPath();
        $this->checkIfControllerExists();
        $this->generateClassNameWithNamespace();
        $this->loadController();
        $this->loadAction();
    }

    /**
     * @return ControllerInterface
     */
    public function getControllerInstance()
    {
        return $this->controllerInstance;
    }

    private function generateClassPath()
    {
        $this->classPath =
            __DIR__ . '/../Controllers/'
            . $this->request->getControllerName();
    }

    private function generateClassNameWithNamespace()
    {
        $this->classWithNamespace =
            '\\' . $this->namespace . '\\Controllers\\'
            . $this->request->getControllerName() . '\\Controller';
    }


    private function checkIfControllerExists()
    {
        if( ! is_dir( $this->classPath ) )
        {
            throw new NotFoundException("Action " . $this->request->getControllerName() );
        }
    }

    private function loadController()
    {
        $this->controllerInstance = new $this->classWithNamespace(
            $this->request
        );
    }

    private function loadAction()
    {
        $actionName = $this->request->getActionName();
        $actionName .= 'Action';
        $controllerClassName = get_class( $this->controllerInstance );
        $methodList = get_class_methods($controllerClassName);

        if( in_array( $actionName, $methodList ) )
        {
            $this->controllerInstance->$actionName();
            return;
        }
        throw new NotFoundException("Action " . $actionName );
    }
}