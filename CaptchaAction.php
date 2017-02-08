<?php

namespace dkhlystov\captcha;

class CaptchaAction extends \yii\captcha\CaptchaAction
{

	/**
	 * @var string letter that used for generate code
	 */
	public $letters = '0123456789';

	/**
	 * @inheritdoc
	 */
	public $minLength = 4;

	/**
	 * @inheritdoc
	 */
	public $maxLength = 5;

	/**
	 * @inheritdoc
	 */
	public $width = 100;

	/**
	 * @inheritdoc
	 */
	public $height = 36;

	/**
	 * @inheritdoc
	 */
	public $padding = 0;

	/**
	 * @inheritdoc
	 */
	protected function generateVerifyCode()
	{
		if ($this->minLength > $this->maxLength) {
			$this->maxLength = $this->minLength;
		}
		if ($this->minLength < 3) {
			$this->minLength = 3;
		}
		if ($this->maxLength > 20) {
			$this->maxLength = 20;
		}
		$length = mt_rand($this->minLength, $this->maxLength);

		$max = strlen($this->letters) - 1;
		$code = '';
		for ($i = 0; $i < $length; ++$i) {
			$code .= $this->letters[mt_rand(0, $max)];
		}

		return $code;
	}

}
