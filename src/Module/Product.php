<?php
namespace Rusmanab\Tokopedia\Module;

use Rusmanab\Blibli\ModuleAbstract;

class Product extends ModuleAbstract{

    public function getItems($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v2/product/getProductList";

        return $this->post($url, [], "POST");
    }

    public function getItemDetail($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/product/detailProduct";

        return $this->post($url, $parameters, "GET");
    }

    
}
