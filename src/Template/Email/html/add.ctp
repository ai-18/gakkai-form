<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link          https://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       https://opensource.org/licenses/mit-license.php MIT License
*/

echo " 登録が完了しましたのでお知らせいたします。<br>";
echo " 下記、登録内容をご確認ください。<br>";
echo " <br>";
echo " 【登録内容】<br>";
echo " 氏名：".$value["name"]."<br>";
echo " 所属：".$value["beingTo"]."<br>";
echo " メールアドレス：".$value["mail"]."<br>";
echo " 演題番号：".$value["subjectNo"]."<br>";
echo " OSのバージョン：".$value["osVer"]."<br>";
echo " PPTのバージョン：".$value["pptVer"]."<br>";
echo " アップロードファイル：".$fileName."<br>";
echo " <br>";
echo " なお、変更があった場合は、再度アップロードフォームから登録を行ってください。<br>";
