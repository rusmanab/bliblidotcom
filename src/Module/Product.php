<?php
namespace Rusmanab\Tokopedia\Module;

use Rusmanab\Blibli\ModuleAbstract;

class Product extends ModuleAbstract{

    public function getItems($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v2/product/getProductList";

        return $this->post($url, [], "POST");
    }

    
}
