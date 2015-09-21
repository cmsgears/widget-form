<?php
namespace cmsgears\widgets\form;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;

class BaseForm extends Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

    public $form;

	public $model;
	
	public $activeForm;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

    public function run() {

        return $this->renderForm();
    }

	// BaseForm

    public function renderForm() {

    }
}

?>