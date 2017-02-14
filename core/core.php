<?php

class core {

    public function run() {
        $url = (isset($_GET['url']) && !empty($_GET['url'])) ? $_GET['url']: "";
        $params = array();

        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            global $painel;
            if (isset($url[0]) && $url[0] == "painel_admin") {
                $painel = TRUE;
                array_shift($url);
            } else {
                $painel = FALSE;
            }

            if (isset($url[0]) && !empty($url[0])) {
                $currentController = $url[0] . 'Controller';
                array_shift($url);
            } else {
                $currentController = 'homeController';
            }


            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }

}
