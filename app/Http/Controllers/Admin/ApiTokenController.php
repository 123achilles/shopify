<?php


namespace App\Http\Controllers\Admin;


use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use PHPShopify\Exception\SdkException;

class ApiTokenController extends BaseController
{
    public function install()
    {
        $shop = $_GET['shop'];
//        $api_key = "1r30mrvCFMfq2DLGuIXyY2veEJVgTtDD";
        $api_key = "591f4a748fbdeeab1227a1ca88cc7fc5";
//        $scopes = "read_orders,write_products";
        $scopes = "write_products";
        $redirect_uri = "http://localhost/shopify/public/admin/generate-token";

// Build install/approval URL to redirect to
        $install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
        header("Location: " . $install_url);
        die();
    }

    /* public function generateToken()
     {
         // Get our helper functions
 //        require_once("inc/functions.php");

 // Set variables for our request
 //        $api_key = "1r30mrvCFMfq2DLGuIXyY2veEJVgTtDD";
         $api_key = "591f4a748fbdeeab1227a1ca88cc7fc5";
 //        $shared_secret = "TBB5wltKarRtKn5mUVZck9RxHePNN6Jo";
         $shared_secret = "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";
         $params = $_GET; // Retrieve all request parameters
         $hmac = $_GET['hmac']; // Retrieve HMAC request parameter

         $params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
         ksort($params); // Sort params lexographically

 //        $computed_hmac = hash_hmac('sha256', "protocol=https://&".http_build_query($params), $shared_secret);
         $computed_hmac = base64_encode(hash_hmac('sha256', "protocol=https://&".http_build_query($params), $shared_secret));
 //        $computed_hmac = hash_hmac('sha256', "protocol=https://&shop=development-shop-1.myshopify.com&timestamp=1599559951", $shared_secret);

 dd(hash_equals($hmac, $computed_hmac),$computed_hmac);
 // Use hmac data to check that the response is from Shopify or not
         if (hash_equals($hmac, $computed_hmac)) {

             // Set variables for our request
             $query = array(
                 "client_id" => $api_key, // Your API key
                 "client_secret" => $shared_secret, // Your app credentials (secret key)
                 "code" => $params['code'] // Grab the access key from the URL
             );

             // Generate access token URL
             $access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

             // Configure curl client and execute request
             $ch = curl_init();
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             curl_setopt($ch, CURLOPT_URL, $access_token_url);
             curl_setopt($ch, CURLOPT_POST, count($query));
             curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
             $result = curl_exec($ch);
             curl_close($ch);

             // Store the access token
             $result = json_decode($result, true);dd($result);
             $access_token = $result['access_token'];

             // Show the access token (don't do this in production!)
             echo $access_token;
 dd(11,$access_token);
         } else {
             // Someone is trying to be shady!
             die('This request is NOT from Shopify!');
         }
     }*/


    public function install2()
    {
        $config = array(
            'ShopUrl' => 'dotty-dungarees-ltd.myshopify.com',
//            'ShopUrl' => 'development-shop-1.myshopify.com',
//            'ApiKey' => '591f4a748fbdeeab1227a1ca88cc7fc5',//testvi mer sarqac
            'ApiKey' => 'ff3a3c6e8486f98419136008e6282d63',
//            'SharedSecret' => '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',//testvi mer sarqac
            'SharedSecret' => 'c825f515c4422cb73ff77fc47c27bb6b',
        );

        \PHPShopify\ShopifySDK::config($config);

        //your_authorize_url.php
        $scopes = 'read_products,write_products,read_script_tags,write_script_tags';
//This is also valid
//$scopes = array('read_products','write_products','read_script_tags', 'write_script_tags');
        $redirectUrl = 'http://localhost/shopify/public/admin/generate-token';

        \PHPShopify\AuthHelper::createAuthRequest($scopes, $redirectUrl);
    }

    public function generateToken()
    {
        $config = array(
            'ShopUrl' => 'dotty-dungarees-ltd.myshopify.com',
//            'ShopUrl' => 'development-shop-1.myshopify.com',
            //            'ApiKey' => '591f4a748fbdeeab1227a1ca88cc7fc5',//testvi mer sarqac
            'ApiKey' => 'ff3a3c6e8486f98419136008e6282d63',
//            'SharedSecret' => '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',//testvi mer sarqac
            'SharedSecret' => 'c825f515c4422cb73ff77fc47c27bb6b',
        );

        \PHPShopify\ShopifySDK::config($config);
        $accessToken = \PHPShopify\AuthHelper::getAccessToken();
        dd($accessToken);
    }

    public function install3(Request $request)
    {
        $limit = $request->get('limit');
        $page = $request->get('page') ?? null;

        //static
//        $config = array(
//            'ShopUrl' => 'dotty-dungarees-ltd.myshopify.com',
//            'ApiKey' => 'ff3a3c6e8486f98419136008e6282d63',
//            'Password' => 'da13e5c9085d544d24c947f79b7402fa',
//        );

        //dinamic
        $setting = Setting::where('type', 'shopify')->first(['api_key', 'password']);
        if (empty($setting)) {
            throw new SdkException("add shopify api key and password");
        }
        $config = array(
            'ShopUrl' => 'dotty-dungarees-ltd.myshopify.com',
            'ApiKey' => $setting->api_key,
            'Password' => $setting->password,
        );

        \PHPShopify\ShopifySDK::config($config);
        $shopify = new \PHPShopify\ShopifySDK;
        $products = $shopify->Product->get(['limit' => $limit]);
        $products = $this->paginate($products, 15, $page, ["path" => "http://localhost/shopify/public/admin/install3", "pageName" => "page"]);
        return view('admin.shopify.products', compact('products'));
    }

    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
