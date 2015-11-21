<?php
namespace cmsgears\widgets\form;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\captcha\Captcha;

// CMG Imports
use cmsgears\forms\common\models\entities\FormField;

class BasicForm extends BaseForm {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	public $model;

	public $formActions;

	public $activeForm;

	// Instance Methods --------------------------------------------

	// BasicForm

    public function renderForm() {
		
		if( isset( $this->form ) && $this->form->active ) {

			$model		= $this->model;
			$fields 	= $this->model->fields;
			$activeForm	= $this->activeForm;
	
			foreach ( $fields as $key => $field ) {
	
				$fieldHtml	= null;
	
				if( isset( $field->options ) ) {
	
					$field->options	= json_decode( $field->options, true );
				}
				else {
	
					$field->options	= [];
				}
	
				switch( $field->type ) {
	
					case FormField::TYPE_TEXT: {
	
						$fieldHtml = $activeForm->field( $model, $key )->textInput( $field->options );
	
						break;
					}
					case FormField::TYPE_TEXTAREA: {
	
						$fieldHtml = $activeForm->field( $model, $key )->textArea( $field->options );
	
						break;
					}
				}
	
				if( !isset( $field->label ) ) {
	
					$fieldHtml->label( false );
				}
	
				echo $fieldHtml;
			}
	
			if( $this->form->captcha ) {
	
				$captchaHtml = $activeForm->field( $model, 'captcha' )->label( false )->widget( Captcha::classname(), [ 'options' => [ 'placeholder' => 'Captcha*' ] ] );
	
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