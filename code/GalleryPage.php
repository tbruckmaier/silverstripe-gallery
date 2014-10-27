<?php

class GalleryPage extends Page {
	
	public static $many_many = array(
		'Images' => 'Image'	
	);

	static $many_many_extraFields = array(
		'Images' => array(
			'Caption' => 'Text',
			'SortOrder' => 'Int',
		),
	);

	public function Images() {
		return $this->getManyManyComponents(
			'Images',
			'',
			"\"GalleryPage_Images\".\"SortOrder\" ASC"
		);
	}

	public function getCMSFields() {

		$fields = parent::getCMSFields();

		$uploadField = new GalleryUploadField('Images', '');
		$fields->addFieldToTab('Root.Images', $uploadField);

		return $fields;
	}

}
class GalleryPage_Controller extends Page_Controller {
	
	public function init() {
		parent::init();
	}
}

class GalleryPage_Images extends DataObject {
	
	private static $db = array (
		'PageID' => 'Int',
		'ImageID' => 'Int',
		'Caption' => 'Text',
		'SortOrder' => 'Int'
	);
}
