<?php

class CronController extends AppController {

    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('test');
	}


	public function test() {
		// Check the action is being invoked by the cron dispatcher 
		if (!defined('CRON_DISPATCHER')) { $this->redirect('/careers/bayesParameters'); exit(); } 

		//no view
		$this->autoRender = false;

		$this->redirect('/careers/bayesParameters')
		echo ('hello');       
            die;

		//do stuff...

		return true;
	}
}
?>