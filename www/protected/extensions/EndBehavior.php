<?php

/**
 * Copyright (c) 2012 by Dmitry Astrikov / www.astrikov.ru
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Application end behavior
 * @package lib/behaviors
 */
class EndBehavior extends CBehavior {

    /**
     * @var _endName
     */
    private $endName;

    /**
     * Getter
     * @return string
     */
    public function getEndName() {
        return $this->endName;
    }

    /**
     * Run app end
     * @param string $name
     * @return void
     */
    public function runEnd($name) {
        //Set end name
        $this->endName = $name;
        //Prepare event
        $this->onModuleCreate = array($this, 'changeModulePaths');
        //Set right path for app views
        $this->setAppViewPath();
        // Run application
        $this->owner->run();
    }

    /**
     * Set app view files path
     * @return void
     */
    private function setAppViewPath() {
        $this->owner->viewPath .= DIRECTORY_SEPARATOR . $this->endName . DIRECTORY_SEPARATOR;
    }




    /**
     * OnModuleCreate
     * @param stdObject $event
     * @return void
     */
    public function onModuleCreate($event) {
        $this->raiseEvent('onModuleCreate', $event);
    }

    /**
     * Change paths inside module
     * @param stdObject $event
     * @return void
     */
    protected function changeModulePaths($event) {
        $module_path = Yii::app()->modulePath . DIRECTORY_SEPARATOR . $event->sender->id;

        $controllerPath = $module_path . DIRECTORY_SEPARATOR .
            $this->endName . DIRECTORY_SEPARATOR .
            'controllers' . DIRECTORY_SEPARATOR;

        if (is_dir($controllerPath))
            $event->sender->controllerPath = $controllerPath;

        $viewPath = $module_path . DIRECTORY_SEPARATOR .
            $this->endName . DIRECTORY_SEPARATOR .
            'views' . DIRECTORY_SEPARATOR;

        if (is_dir($viewPath))
            $event->sender->viewPath = $viewPath;
    }
}