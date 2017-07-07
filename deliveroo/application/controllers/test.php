<?php

class Test extends CI_Controller {

	public function __construct()
    {
        //  Obligatoire
        parent::__construct();
    }

	public function index()
	{
		$this->test();
	}

	public function test()
	{
		echo "test cron !!";
	}
}

