<?php

/**
 * Class Render
 */
class Render
{

    private $vars;

    private $view;

    /**
     * Render constructor.
     * @param string $view
     * @param array $vars
     */
    public function __construct(string $view, array $vars = [])
    {
        $this->setView($view)->setVars($vars);

        return $this;
    }

    /**
     * @param array $vars
     * @return $this
     */
    private function setVars(array $vars) {
        $this->vars = $vars;
        return $this;
    }

    /**
     * @param array $vars
     * @return $this
     */
    private function addVars(array $vars) {
        foreach ($vars as $k => $v){
            if(!key_exists($k, $this->vars)) {
                $this->vars[$k] = $v;
            }
        }

        return $this;
    }

    /**
     * @param string $view
     * @return $this
     */
    private function setView(string $view){
        $this->view = $view;

        return $this;
    }

    /**
     * @return string
     */
    private function getView(){
        return $this->view . '.html.twig';
    }

    /**
     * @return string
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function getRendererHTML() {
        $loader = new Twig_Loader_Filesystem(TEMPLATE_DIR);
        $twig = new Twig_Environment($loader);

        return $twig->render($this->getView(), $this->vars);
    }

    /**
     *
     */
    public function render($vars = null) {
        if($vars) {
            $this->addVars($vars);
        }

        try {
            echo $this->getRendererHTML();
        } catch (Exception $e) {
            echo 'Error when rendering the requested view';
            var_dump($e);
        }
    }

}