# Category Ad

## What does it do?

The module adds an attribute to Magento's catalog categories called **category_ad** of input type **image**.

## How to call the att in frontend?

You do need to call it via **$_category->getCategoryAd()** in the view.phtml of categories.

But there are two problems:

* Output contains the filename, not the path to it
* Output points to the original image — if it is too large, you'll need to resize it

Here is a full example of how to call it correctly:

	<?php
	if ($_adUrl = Mage::getBaseUrl('media').DS.'catalog'.DS.'category'.DS.$_category->getCategoryAd()) {
		$_adHtml = '<p class="category-image"><img src="'.$_adUrl.'" alt="'.$this->htmlEscape($_category->getName()).'" title="'.$this->htmlEscape($_category->getName()).'" /></p>';
		$_adHtml = $_helper->categoryAttribute($_category, $_adHtml, 'image');
	}
	?>
	
	<?php if ($_adUrl): ?>
    	<?php echo $_adHtml ?>
	<?php endif; ?>

In order to make the call bulletproof, you'll need to change **Mage::getBaseUrl()** to **Mage::getBaseDir()** to get the absolute server dir to it and pass it to a resize helper function.