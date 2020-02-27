<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapeController extends Controller
{

	private $client;
	public $url;
	public $crawler;
	public $filters;
	public $content = array();

	public function __construct(Client $client)
	{
		$this->client = $client;
	}


    public function scrape()
    {
    	$this->url = 'http://www.pictaram.com/user/caseyneistat/31027484';
    	$this->setScrapeUrl( $this->url );

    	$this->filters = [
    	'title' => '.posts__post-title',
    	'author' => '.posts__post-author-link'
    	];

    	return view('scraper')
            ->with('contents',$this->getContents()); 

    }

    public function setScrapeUrl($url = NULL, $method = 'GET')
    {
        $this->crawler = $this->client->request($method, $url);
        return $this->crawler;
    }

    public function getContents()
    {
        return $this->content = $this->startScraper();
    }

    private function startScraper() {
        
    }
}
