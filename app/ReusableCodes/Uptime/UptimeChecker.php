<?php

namespace Monitor\ReusableCodes\Uptime;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Monitor\Model\WebsitesMonitor;

/**
 * @author Jackson Chegenye {chegenyejackson@gmail.com}
 * @link https://github.com/jchegenye
 * 
 */
class UptimeChecker
{
    /**
     * @var \GuzzleHttp\Client
     */
    public $client;
    /**
     * An array of lists of status codes.
     *
     * @var array
     */
    private $status_codes = [
        'success' => [200, 201, 202, 203, 204, 205, 206, 207, 210, 226]
    ];
    /**
     * The number of seconds to wait while trying to connect to a server.
     *
     * @var int
     */
    private $connectionTimeout = 10;
    /**
     * The timeout of the request in seconds.
     *
     * @var int
     */
    private $requestTimeout = 30;
    /**
     * The request uri.
     *
     * @var \GuzzleHttp\Psr7\Uri|String
     */
    public $uri;
    /**
     * Whether the request is successful or not.
     *
     * @var bool
     */
    public $success;
    /**
     * The http response status code.
     *
     * @var int
     */
    public $status;
    /**
     * The http response message.
     *
     * @var string
     */
    public $message;

    public $site_info;
    public $domain_id;
    private $host = '';

    /**
     * The transfer time in seconds.
     *
     * @var float
     */
    private $transferTime;
    /**
     * UptimeChecker constructor.
     *
     * @param \GuzzleHttp\Client|null $client
     */
    public function __construct(Client $client = null)
    {
        if ($client) {
            $this->client = $client;
        } else {
            $this->client = new Client([
                'connect_timeout' => $this->connectionTimeout,
                'timeout' => $this->requestTimeout
            ]);
        }
    }
    /**
     * Connection timeout getter.
     *
     * @return int
     */
    public function getConnectionTimeout()
    {
        return $this->connectionTimeout;
    }
    /**
     * Connection timeout setter.
     *
     * @param float $timeout
     * @return $this
     */
    public function setConnectionTimeout(float $timeout)
    {
        $this->connectionTimeout = $timeout;
        return $this;
    }
    /**
     * Request timeout getter.
     *
     * @return int
     */
    public function getRequestTimeout()
    {
        return $this->requestTimeout;
    }
    /**
     * Request timeout setter.
     *
     * @param float $timeout
     * @return $this
     */
    public function setRequestTimeout(float $timeout)
    {
        $this->requestTimeout = $timeout;
        return $this;
    }

    /**
     * Perform the uptime check.
     *
     * @param string $url
     * @return array
     */
    public function check(string $url, $domain_id)
    {

        $websites = WebsitesMonitor::all();

        try {

            $response = $this->client->request('GET', $url, [
                'on_stats' => function (TransferStats $stats) {
                    $this->uri = $stats->getEffectiveUri();
                    $this->transferTime = $stats->getTransferTime();
                    $parse = parse_url($this->uri, PHP_URL_HOST);
                    $this->host = $parse;
                }
            ]);
            $this->success = in_array($response->getStatusCode(), $this->status_codes['success']) ? true : false;
            $this->status = $response->getStatusCode();
            $this->message = $response->getReasonPhrase();

            $this->domain_id = $domain_id;

            return $this->report();

        } catch (\Exception $e) {
            
            $this->success = false;
            $this->status = $e->getCode();
            $this->message = trim($e->getMessage());

            $this->domain_id = $domain_id;

            return $this->report();
        }

    }
    /**
     * Build an array with the check report info.
     *
     * @return array
     */
    public function report()
    {
        return [
            'uri' => (string)$this->uri,
            'host' => $this->host,
            'success' => $this->success,
            'status' => $this->status,
            'message' => $this->message,
            'transfer_time' => $this->transferTime,
            'domain_id' => $this->domain_id,
        ];
    }
    /**
     * Collect all websites data from user to be checked for uptime here.
     *
     * @return array
     */
    public function results(){

        //Fetch from db

            // $websiteData = array(
            //     'https://legibra.com' => array(
            //         'site_name' => 'Legibra Holdings LTD',
            //         'check_type' => 'website',
            //         'site_url' => 'https://legibra.com',
            //     ),
            //     'http://jchegenye.me' => array(
            //         'site_name' => 'Jackson Chegenye1',
            //         'check_type' => 'website',
            //         'site_url' => 'http://jchegenye.me',
            //     ),
            //     'https://wapipay.com' => array(
            //         'site_name' => 'Wapipay',
            //         'check_type' => 'website',
            //         'site_url' => 'https://wapipay.com',
            //     ),
            //     'https://legibratest.com' => array(
            //         'site_name' => 'Legibra Test Server',
            //         'check_type' => 'HTTP(S)',
            //         'site_url' => 'https://legibratest.com',
            //     ),
            //     'http://www.skydivediani.com1' => array(
            //         'site_name' => 'SkyDive Diani',
            //         'check_type' => 'HTTP(S)',
            //         'site_url' => 'http://www.skydivediani.com1',
            //     ),
            // );

            // $query = array();
            // foreach ($websiteData as $key => $data)
            // {
            //     $query[] = $this->check($key,$websiteData);
            // }
            // $data = $query;

            $websiteData = WebsitesMonitor::all();

            $query = array();
                foreach ($websiteData as $key => $val1)
                {
                    $domainId = $val1->id;
                    $query[] = $this->check($val1->site_info['site_url'], $domainId);
                }
            $data = $query;

            //dd($data);

        return $data;

    }
    
}
