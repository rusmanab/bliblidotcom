<?php

namespace Rusmanab\Blibli\Module;

use Rusmanab\Blibli\ModuleAbstract;
class Category extends ModuleAbstract{
    public function getItems($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/product/getCategory";

        return $this->post($url, $parameters, "GET");
    }
    public function getAttributes($parameters = []){
        $categoryCode = $parameters['category-code'];

        $url = "/proxy/seller/v1/categories/$categoryCode/attributes";

        return $this->post($url, $parameters, "GET");
    }

}
