<?php

class Body {

    private $elementos = array();

    public function addElemento($sElement) {
        $this->elementos[] = $sElement;
    }

    public function ReturnBody() {
        $body = "<body> \n
                         \n
                        <div class=\"container\"> \n";
        foreach ($this->elementos as $itemElemento) {
            $body .= $itemElemento . "\n";
        }
        $body .= "\n </div>
                \n </body>";
        return $body;

    }


}