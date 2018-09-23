<?php

/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
namespace team\a2\controller;

/**
 * Class Controller
 *
 * @package team/a2
 *
 * Code foundation by:
 * @author  Andrew Gilman <a.gilman@massey.ac.nz>
 *
 *
 * @author  Junghoe Hwang <after10y@gmail.com>
 * @author Erdem Alpkaya <erdemalpkaya@gmail.com>
 * @author  Robert Harper   <l.attitude37@gmail.com>
 */
class Controller
{
    /**
     * Redirect to another route
     *
     * @param $route
     * @param array $params
     */
    public function redirect($route, $params = [])
    {
        // Generate a redirect url for a given named route
        $url = $GLOBALS['router']->generate($route, $params);
        header("Location: $url");
    }
}
