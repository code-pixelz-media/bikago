<?php

/**
 * Fired during plugin Flexiroam
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/includes
 */

/**
 * Integrating Flexiroam.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/includes
 * @author     Codepixelzmedia <info@codepixelzmedia.com>
 */
class Bikago_Shop_Manager_Flexiroam {

    //include($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

    private $user = 'demoloadplan@flexiroam.com';

    private $password = 'Demo!!!re!!1';

    private $test = 1;


    /************ Curl Operation to retrive data *****/
    private function curlFlexiroam( $url='', $fields=[]  ){

        //$url = 'https://devapi.flexiroam.com/user/view/v1';
        //$fields = [];
        $curl = curl_init();
        $token_con = 'token: ' . $this->getToken();
            curl_setopt_array($curl, 
                array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $fields,
                    CURLOPT_HTTPHEADER => array(
                    $token_con,
                ),
            ));
        $response = curl_exec($curl);

        curl_close($curl);

        return $response;

    }

    public function con_flexiroam(){
        $handle = curl_init();
        $user = get_option('flexiroam_email', 'demoloadplan@flexiroam.com');
        $password = base64_decode( get_option("flexiroam_password") );

        //$user = $this->user;
        //$password = $this->password;
        
        if( $this->test != 1 ){
            $url = "https://api.flexiroam.com/user/login/v1";
        }else{
            $url = "https://devapi.flexiroam.com/user/login/v1";
        }
        
        $postData = array(
          'email' => $user,
          'password'  => $password,
          'submit'    => 'ok'
        ); 

        curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                // Enable the post response.
                CURLOPT_POST   => true,
                CURLOPT_POSTFIELDS => $postData,
                CURLOPT_RETURNTRANSFER => true,
            )
        );

        $data = curl_exec($handle);
        curl_close($handle);
        return $data;
    }

    /** Token for flexiroam **/
    public function getToken()
    {
        $flex_data = json_decode( $this->con_flexiroam() );
        return $flex_data->data->token;
    }


    /************ View Profile *****/

    public function viewProfile(){
        
        $url = "https://devapi.flexiroam.com/user/view/v1";
        
        $response = $this->curlFlexiroam( $url, array()  );
        return $response;
    }

    public function display(){
        //var_dump($this->viewProfile());
        //return $this->getToken();
    }

    /******* View Available SIM **/
    public function availableSim(){
        
        $url = "https://devapi.flexiroam.com/product/inventory/available/v1";
        
        $response = $this->curlFlexiroam( $url, array('sim_type' => 'eSIM','availability' => '0')  );


        $myres = json_decode( $response, true );
        //$token = $myres->data->qr_code;
        // foreach ($myres->data as $code) {
        //     var_dump($code->qr_code);
        // }

        return $myres;
    } 



    /************* View Sim Inventory **********/
    public function simInventory($sku = ""){
        
        $url = "https://devapi.flexiroam.com/product/inventory/view/v1";
        
        $response = $this->curlFlexiroam( 'https://devapi.flexiroam.com/product/inventory/view/v1', array('availability' => '1')  );

        return $response;

    }

    /************* View Sim Inventory **********/
    public function getIccid($sku = ""){

        if( !empty( $sku ) ){

        $url = "https://devapi.flexiroam.com/product/inventory/view/v1";
        
        $response = $this->curlFlexiroam( 'https://devapi.flexiroam.com/product/inventory/view/v1', array( 'sku'=>$sku)  );

        $myres = json_decode( $response, true );
        
        return $myres['data']['0']['iccid'];
        }
        return false;

    }

    /************* View Sim Inventory **********/
    public function getOrderNO($sku = ""){

        if( !empty( $sku ) ){

        $url = "https://devapi.flexiroam.com/product/inventory/view/v1";
        
        $response = $this->curlFlexiroam( 'https://devapi.flexiroam.com/product/inventory/view/v1', array( 'sku'=>$sku)  );

        $myres = json_decode( $response, true );
        
        return $myres['data']['0']['order_no'];
        }
        return false;

    }


    /************* View Offered Plan Inventory **********/
    public function viewOfferedPlan(){

        $url = "https://devapi.flexiroam.com/user/contract/plan/v1";
        
        $response = $this->curlFlexiroam( $url, array()  );

        return $response;
    }

    /************* View Plan Inventory **********/
    public function planInventory(){

        $url = "https://devapi.flexiroam.com/plan/inventory/view/v1";
        
        $response = json_decode( $this->curlFlexiroam( $url, array() ) );

        return $response;
    }

/************* Purchase Plan For Existing Sim **********/
    public function purchasePlanExistingSim( $sku, $plan_code ) {

        $url = 'https://devapi.flexiroam.com/user/order/sim/plan/v1';
        
        $fields = array(
            'sku'=> $sku,
            'plan_code'=> $plan_code,
            'plan_start_type_id' => '1'
        );
        $response = $this->curlFlexiroam( $url, $fields  );

        return $response;
    }

/************* Load Plan For Existing Sim **********/
    public function loadPLanExistingSim( $sku, $plan_code ){

        $url = 'https://devapi.flexiroam.com/plan/load/v1'; 

        $fields = array(
            'sku'=> $sku,
            'plan_code'=> $plan_code,
            'plan_start_type_id' => '1'
        );
        
        $response = $this->curlFlexiroam( $url, $fields  );

        return $response;

    }

/************* UnLoad Plan For Existing Sim **********/
    public function unloadPlan( $plan_uid = "61a87155bea5c" ){

        $url = 'https://devapi.flexiroam.com/plan/unload/v1'; 

        $fields = array(
            'plan_uid' => $plan_uid
        );
        
        $response = $this->curlFlexiroam( $url, $fields  );

        return $response;

    }

/************* Start Plan For Existing Sim **********/
    public function startPlan( $plan_uid = "61a87155bea5c" ){

        $url = 'https://devapi.flexiroam.com/plan/start/v1'; 

        $fields = array(
            'plan_uid' => $plan_uid
        );
        
        $response = $this->curlFlexiroam( $url, $fields  );

        return $response;
    }

/************* Set Selected Plan For Existing Sim **********/
    public function setSelectedPlan( $plan_uid = "61a87155bea5c"){

        $url = 'https://devapi.flexiroam.com/plan/setselected/v1'; 

        $fields = array(
            'plan_uid' => $plan_uid
        );
        
        $response = $this->curlFlexiroam( $url, $fields  );

        return $response;
    }
}

// $flex = new Bikago_Shop_Manager_Flexiroam();
// $sim = $flex->getIccid();
//   var_dump($sim);
 //echo var_dump( $sim['data'][0]["qr_code"] );
//var_dump($sim);
// array(4) { 
//     "sku"=> "2019092976291", 
//     "qr_code"=> "LPA:1$rsp-0026.oberthur.net$DQMYO-XGETL-HPE7Y-ZWGQL",
//     "product_code"=> "FRX-ESIM",
//     "profile_names"=> "J" 
// }

 //var_dump( $flex->con_flexiroam() );