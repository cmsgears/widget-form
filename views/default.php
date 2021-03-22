<?php if( !empty( $fieldsHtml ) ) { ?>

<div class="frm-fields <?= $widget->split4060 ? 'frm-split-40-60' : null ?>">
	<?= $fieldsHtml ?>

	<?php if( $widget->wrapCaptcha ) { ?>
		<div class="captcha-wrap clear clearfix clear relative">
			<?= $captchaHtml ?>
		</div>
	<?php } else { ?>
		<?= $captchaHtml ?>
	<?php } ?>

	<?php if( $widget->wrapActions ) { ?>
		<div class="frm-actions clear clearfix">
			<input class="frm-element-medium" type="submit" value="Submit" />
		</div>
	<?php } else { ?>
		<div class="frm-actions">
			<input class="frm-element-medium" type="submit" value="Submit" />
		</div>
	<?php } ?>
</div>

<?php } else { ?>
	<div class="warning">Form submission is disabled.</div>
<?php } ?>
