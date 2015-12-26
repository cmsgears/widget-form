<?php
namespace cmsgears\widgets\form;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\captcha\Captcha;

// CMG Imports
use cmsgears\forms\common\models\entities\FormField;

use cmsgears\core\common\utilities\FormUtil;

class BasicForm extends BaseForm {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	/**
	 * Form model to be rendered by Active Form.
	 */
	public $model;

	/**
	 * It can be used to override form actions to change submit button value or add additional buttons.
	 */
	public $formActions;

	/**
	 * Active Form to be used to render form.
	 */
	public $activeForm;

	// Instance Methods --------------------------------------------

	// BasicForm

    public function renderForm() {

		if( isset( $this->form ) && $this->form->active ) {

			$model		= $this->model;
			$activeForm	= $this->activeForm;
			$fieldsHtml	= FormUtil::getFieldsHtml( $activeForm, $this->model, [ 'label' => $this->showLabel ] );

			echo $fieldsHtml;

			if( $this->form->captcha ) {

				if( $this->showLabel ) {

					$captchaHtml = $activeForm->field( $model, 'captcha' )->widget( Captcha::classname(), [ 'options' => [ 'placeholder' => 'Captcha*' ] ] );
				}
				else {

					$captchaHtml = $activeForm->field( $model, 'captcha' )->label( false )->widget( Captcha::classname(), [ 'options' => [ 'placeholder' => 'Captcha*' ] ] );
				}

				echo $captchaHtml;
			}

			if( !isset( $this->formActions ) ) {
	
				echo "<div class='frm-actions'><input type='submit' value='Submit' /></div>";
			}
			else {

				echo $this->formActions;
			}
		}
		else {

			echo "<div class='warning'>Form submission is disabled by site admin.</div>";	
		}
    }
}

?>