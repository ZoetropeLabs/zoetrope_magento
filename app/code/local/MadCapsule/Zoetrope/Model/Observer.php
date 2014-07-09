<?php
/**
 * Observer.php
 * Created by James Mikkelson on 2014-06-25.
 *
 * Licensed under The GPLv2 License
 * Redistributions of files must retain the above copyright notice
 *
 * @link          www.madcapsule.com
 * @author        james@madcapsule.co.uk
 * @license       GPLv2 License (http://www.gnu.org/licenses/gpl-2.0.html)
 */
class MadCapsule_Zoetrope_Model_Observer
{	

	public function trigger_import(){

		if(Mage::getStoreConfig('zoetrope/general/triggerimport')){

			if($this->import()){
				Mage::getSingleton('core/session')->addSuccess('Zoetrope Import Ran'); 
			}else{
				Mage::getSingleton('core/session')->addWarning('Zoetrope import did not complete. Check your feed URL.'); 
			}
		}

	}

	public function import()
	{

		$feed_url = Mage::getStoreConfig('zoetrope/general/feed');

		if(!$feed_url){
			return;
		}

		Mage::log('Zoetrope Import Started');

		if(is_null($feed = $this->getFeed($feed_url))){
			Mage::log('Unable to get feed');
			return;
		}

		$action = Mage::getModel('catalog/resource_product_action');
		foreach($feed as $image){

			$product = Mage::getModel('catalog/product')->loadByAttribute('sku', $image->sku);

			if(!$product){
				Mage::log('Zoetrope image '.$image->zoetrope_id.' not found in Magento');
			}else{

				$product_update = $action->updateAttributes(array($product->getId()), array(
					'zoetrope_id' => $image->zoetrope_id,
					'zoetrope_starting_pos' => $image->zoetrope_start_position
				), 0);

				$product->unsetData();
			}
		}

		Mage::log('Zoetrope Import Complete');
		return true;

	}

	public function getFeed($feed_url){


		try{
			Zend_Loader::loadClass('Zend_Http_Client'); 

		}catch(Zend_Http_Client $e) {
			throw new Exception($this->__('Unable to load Zend_Http_Client.'));
		}

		$feed = new Zend_Http_Client($feed_url);
		$response = $feed->request('GET');

		if($response->isError()){
			return null;
		}

		return json_decode($response->getBody());

	}
}
