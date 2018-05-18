<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\form;

// Yii Imports
use yii\captcha\Captcha;

// CMG Imports
use cmsgears\core\common\utilities\FormUtil;

/**
 * The BasicForm used to submit form in traditional way must be wrapped by [[yii\widgets\ActiveForm]].
 *
 * @since 1.0.0
 */
class BasicForm extends BaseForm {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	/**
	 * Active Form to be used to render form.
	 *
	 * @var \yii\widgets\ActiveForm
	 */
	public $activeForm;

	/**
	 * Flag to check whether captcha has to be wrapped.
	 *
	 * @var boolean
	 */
	public $wrapCaptcha	= false;

	/**
	 * Flag to check whether form actions has to be wrapped.
	 *
	 * @var boolean
	 */
	public $wrapActions	= false;

	/**
	 * The default action to listen for captcha request.
	 *
	 * @var string
	 */
	public $captchaAction = '/forms/form/captcha';

	// Instance Methods --------------------------------------------

	// BasicForm

    public function renderWidget( $config = [] ) {

		$fieldsHtml		= null;
		$captchaHtml	= null;

		if( isset( $this->model ) && $this->model->isActive() ) {

			$form		= $this->form;
			$activeForm	= $this->activeForm;
			$fieldsHtml	= FormUtil::getFieldsHtml( $activeForm, $form, [ 'label' => $this->label ] );

			if( $this->model->captcha ) {

				if( $this->label ) {

					$captchaHtml = $activeForm->field( $form, 'captcha' )->widget( Captcha::class, [ 'captchaAction' => $this->captchaAction, 'options' => [ 'placeholder' => 'Captcha*', 'class' =>'captcha' ] ] );
				}
				else {

					$captchaHtml = $activeForm->field( $form, 'captcha' )->label( false )->widget( Captcha::class, [ 'captchaAction' => $this->captchaAction, 'options' => [ 'placeholder' => 'Captcha*', 'class' =>'captcha' ] ] );
				}
			}
		}

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this, 'fieldsHtml' => $fieldsHtml, 'captchaHtml' => $captchaHtml ] );

		if( $this->wrap ) {

			return Html::tag( $this->wrapper, $widgetHtml, $this->options );
		}

		return $widgetHtml;
    }

}
