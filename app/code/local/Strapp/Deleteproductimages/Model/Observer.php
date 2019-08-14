<?php

/**
 * @category    Strapp
 * @package     Strapp_Deleteproductimages
 */
class Strapp_Deleteproductimages_Model_Observer
{
  public function deleteProductImages($observer)
  { 
    if(Mage::getStoreConfig('deleteproductimages/image/enable'))
    {     
      $product = $observer->getEvent()->getProduct();
      if ($product) 
      {
	$gallery = $product->getData('media_gallery');
	$images  = $gallery['images'];
	foreach ($images as $image) 
	{	 
	  unlink(Mage::getBaseDir('media') . '/catalog/product' . $image['file']);
	}	
      }
    }
  }
}
