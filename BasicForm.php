<?php
namespace cmsgears\widgets\form;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\forms\common\models\entities\FormField;

class BasicForm extends BaseForm {

	// Instance Methods --------------------------------------------

	// BasicForm

    public function renderForm() {

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
    }
}

?>