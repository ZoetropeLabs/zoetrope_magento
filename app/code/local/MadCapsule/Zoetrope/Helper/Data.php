<?php
/**
 * Data.php
 * Created by James Mikkelson on 2014-06-25.
 *
 * Licensed under The GPLv2 License
 * Redistributions of files must retain the above copyright notice
 *
 * @link          www.madcapsule.com
 * @author        james@madcapsule.co.uk
 * @license       GPLv2 License (http://www.gnu.org/licenses/gpl-2.0.html)
 */
class MadCapsule_Zoetrope_Helper_Data extends Mage_Core_Helper_Abstract
{	

	const _zoetrope_cdn = 'https://s3-eu-west-1.amazonaws.com/zoetrope-alpha/';

	public function getSiteId(){
		
		return Mage::getStoreConfig('zoetrope/general/siteid');

	}

	public function getWidth(){
		
		return Mage::getStoreConfig('zoetrope/general/width');

	}

	public function getHeight(){
		
		return Mage::getStoreConfig('zoetrope/general/height');

	}

	public function getStyle(){

		$style = '';

		if(Mage::getStoreConfig('zoetrope/general/inline')){
			$style = 'data-zoe-inline="true"';
		}

		return $style;
	
	}

	public function getResolution(){

		$resolution = 500;

		if(Mage::getStoreConfig('zoetrope/general/resolution')){
			$resolution = Mage::getStoreConfig('zoetrope/general/resolution');
		}

		return $resolution;

	}

	public function getCdn(){

		$cdn = self::_zoetrope_cdn;

		if(Mage::getStoreConfig('zoetrope/general/cdn')){
			$cdn = Mage::getStoreConfig('zoetrope/general/cdn');
		}

		return $cdn;
	}
}

