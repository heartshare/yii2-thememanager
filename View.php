<?php
/**
 * @link        http://hiqdev.com/yii2-thememanager
 * @license     BSD 3-clause
 * @copyright   Copyright (c) 2015 HiQDev
 */

namespace hiqdev\thememanager;

use Yii;

class View extends \yii\web\View
{
    use GetManagerTrait;

    /**
     * Returns classes for HTML body
     */
    public function getBodyClasses()
    {
        return $this->getManager()->getTheme()->getBodyClasses();
    }

    /**
     * Magic setter.
     *
     * @param int|string   $name
     * @param mixed        $value the element value
     */
    public function __set($name, $value)
    {
        if ($name && $this->canSetProperty($name)) {
            parent::__set($name, $value);
        } else {
            $this->params[$name] = $value;
        }
    }

    /**
     * Magic getter.
     *
     * @param string $name component or property name
     *
     * @return mixed param or property value
     */
    public function __get($name)
    {
        if ($name && $this->canGetProperty($name)) {
            return parent::__get($name);
        } else {
            return $this->params[$name];
        }
    }

    /**
     * Magic is set checker.
     *
     * @param string $name the property or param name to check.
     *
     * @return bool whether the value is set.
     */
    public function __isset($name)
    {
        return ($name && parent::__isset($name)) || isset($this->params[$name]);
    }

    /**
     * Magic unsetter.
     *
     * @param string $name the property or param name to unset.
     */
    public function __unset($name)
    {
        if ($name && $this->canSetProperty($name)) {
            parent::__unset($name);
        } else {
            unset($this->params[$name]);
        }
    }

}
