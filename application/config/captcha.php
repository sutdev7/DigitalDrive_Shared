<?php
// BotDetect PHP Captcha configuration options

//$config = array(
//  // Captcha configuration for contact page
//  'ContactCaptcha' => array(
//    'UserInputID' => 'CaptchaCode',
//    'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
//    'ImageStyle' => ImageStyle::AncientMosaic,
//  ),
//
//);

$config = array(
    'img_path'      => 'captcha_images/',
    'img_url'       => base_url().'assets/captcha_images/',
    'img_width'     => '150',
    'img_height'    => 50,
    'word_length'   => 8,
    'font_size'     => 16
);
$captcha = create_captcha($config);