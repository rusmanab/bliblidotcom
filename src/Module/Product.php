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

    public function setArchive($parameters = []){
        $url = "/proxy/seller/v1/products/statuses/archive";

        return $this->post($url, $parameters);
    }

    public function setUnArchive($parameters = []){
        $url = "/proxy/seller/v1/products/statuses/unarchive";

        return $this->post($url, $parameters);
    }
    
    public function create($parameters = []){

        $url = "/proxy/seller/v1/products/async";
        return $this->post($url, $parameters,"POST");
    }
    public function updateProduct($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v1/product/updateProduct";
        return $this->post($url, $parameters);
    }
    public function updateProductDetail($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v1/product/updateDetailProduct";
        return $this->post($url, $parameters);
    }

    public function submitionLit($parameters = []){     

        $url = "/proxy/seller/v1/product-submissions/filter";        
        return $this->post($url, $parameters);
    }
    public function updateStok($parameters = []){
        $blibliSku = $parameters['sku'];
        unset($parameters['sku']);
        $url = "proxy/seller/v1/products/".$blibliSku."/stock";

        return $this->put($url, $parameters,"PUT");
    }

    /** Stagging Only */
    public function activatedProduk($parameters = []){

        $url = "/proxy/sas/product-approve-v2";

        return $this->post($url, $parameters);
    }

    public function activatedProdukByProductCode($parameters = []){

        $url = "/proxy/sas/product-approve";

        return $this->post($url, $parameters);
    }
    /** End Stagging Only */

}
