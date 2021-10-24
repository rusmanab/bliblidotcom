<?php
namespace Rusmanab\Blibli\Module;

use Rusmanab\Blibli\ModuleAbstract;

class Product extends ModuleAbstract{

    public function getItems($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v2/product/getProductList";

        return $this->post($url, $parameters, "POST");
    }


    public function getItemDetail($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/product/detailProduct";

        return $this->post($url, $parameters, "GET");
    }

    public function getLogistic($parameters = []){
        $url = "/proxy/seller/v1/logistics";

        return $this->post($url, $parameters, "GET");
    }

    public function getPickupPoint($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/product/getPickupPoint";

        return $this->post($url, $parameters, "GET");
    }

    public function create($parameters = []){

        $url = "/proxy/seller/v1/products/async";

        return $this->post($url, $parameters,"POST");
    }

    public function getBrands($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v2/product/getBrands";

        return $this->post($url, $parameters, "GET");
    }
    public function getQueueList($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/feed/list";

        return $this->post($url, $parameters, "GET");
    }
    public function getQueueDetails($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/feed/detail";

        return $this->post($url, $parameters, "GET");
    }


}
