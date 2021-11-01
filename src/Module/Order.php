<?php
namespace Rusmanab\Blibli\Module;

use Rusmanab\Blibli\ModuleAbstract;

class Order extends ModuleAbstract{


    public function getList($parameters = []){

        $url = "/proxy/seller/v1/orders/packages/filter";

        return $this->post($url, $parameters, "POST");
    }
    public function getDetail($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v1/order/orderDetail";

        return $this->post($url, $parameters, "GET");
    }
    public function combineShipping($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/order/getCombineShipping";

        return $this->post($url,$parameters, "GET");

    }

    public function getAirwayBill(){
        $url = "/proxy/mta/api/businesspartner/v1/order/downloadAirwayBill";

        return $this->post($url, [], "GET");

    }
    public function getshippingLabel ($parameter = []){
        $package_id = $parameter['package-id'];
        $url = "/proxy/seller/v1/orders/$package_id/shippingLabel";

        return $this->post($url, $parameter, "GET");
    }

    /** Order Operation */
    public function createPackage($parameters = []){

        $url = "/proxy/mta/api/businesspartner/v1/order/createPackage";

        return $this->post($url, $parameters);

    }
    public function fulfillRegulerOrder($parameters = []){
        $package_id = $parameters['package-id'];

        $url = "/proxy/seller/v1/orders/regular/$package_id/fulfill";

        return $this->post($url, $parameters);

    }
    public function fulfillBigProductOrder($parameters = []){
        $package_id = $parameters['package-id'];

        $url = "/proxy/seller/v1/orders/shipping-by-seller/$package_id/ready-to-ship";

        return $this->post($url, $parameters);

    }
    public function fulfillBopis($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/order/fulfillBopis";

        return $this->post($url, $parameters);

    }

    public function partialFulfill($parameters = []){
        $url = "/proxy/mta/api/businesspartner/v1/order/partialFulfill";

        return $this->post($url, $parameters);

    }

    public function settleBigProduct($parameters = []){
        $package_id = $parameters['package-id'];
        $url = "/proxy/seller/v1/orders/shipping-by-seller/$package_id/mark-as-delivered";

        return $this->post($url, $parameters);
    }

    public function settleBOPIS($parameters = []){
        $package_id = $parameters['package-id'];
        $url = "/proxy/seller/v1/orders/bopis/$package_id/mark-as-delivered";

        return $this->post($url, $parameters);
    }

    public function updateDropship($parameters = []){
        $package_id = $parameters['package-id'];
        $url = "/proxy/seller/v1/orders/dropship/$package_id";

        return $this->post($url, $parameters);
    }

    public function injectVoucherItem($parameters = []){
        $order_item_id = $parameters['order-item-id'];
        $url = "/proxy/seller/v1/order-items/$order_item_id/vouchers";

        return $this->post($url, $parameters);
    }

    // for stagging only
    public function orderCreation($parameters = []){
        $url = "/proxy/sas/create-order-v2";

        return $this->post($url, $parameters);
    }


}

