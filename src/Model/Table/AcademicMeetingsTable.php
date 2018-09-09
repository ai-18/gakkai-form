<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AcademicMeetingsTable extends Table{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('name', '氏名を入力してください。')
            ->notEmpty('beingTo', '所属を入力してください。')
            ->notEmpty('mail', '正しいメールアドレスを入力してください。')
            ->notEmpty('subjectNo', '演題番号を入力してください。')
            ->notEmpty('osVer', 'OSバージョンを入力してください。')
            ->notEmpty('pptVer', '選択されていません。')
            ->notEmpty('fileName', 'ファイルサイズが0.5MBを超過しています');
    }

    public function initialize(array $config)
    {
        parent::initialize($config);

        // Upload Plugin
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'fileName' => [
                'path' => 'webroot{DS}file',
                'nameCallback' => function ($data, $settings) {
                    return uniqid().'-'.strtolower($data["name"]);
                }
            ],
        ]);
    }
/*
    public $validate = array(
        'name' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'message' => '氏名を入力してください。',
                'allowEmpty' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 50),
                'message' => '氏名は20文字以内で入力してください。'
            ),
        ),
        'beingTo' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'message' => '所属を入力してください。',
                'allowEmpty' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 50),
                'message' => '所属は20文字以内で入力してください。'
            ),
        ),
        'mail' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => '正しいメールアドレスを入力してください。',
            ),
            'notblank' => array(
                'rule' => array('notblank'),
                'message' => 'メールアドレスを入力してください。',
            ),
        ),
        'subjectNo' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'message' => '演題番号を入力してください。',
                'allowEmpty' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => '演題番号は20文字以内で入力してください。'
            ),
        ),
        'osVer' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'message' => 'OSバージョンを入力してください。',
                'allowEmpty' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => 'OSバージョンは20文字以内で入力してください。'
            ),
        ),
        'pptVer' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'message' => '選択されていません。',
                'allowEmpty' => false,
            ),
        ),
        'fileName' => array(
            'fileSize' => array(
                'rule' => array('checkFileSize', '0.5MB'),
                'message' => 'ファイルサイズが0.5MBを超過しています',
            ),
            'minFileSize' => array(
                'rule'     => array('fileSize', '>', 0),
                 'message' => array('ファイルサイズは0B以上必要です。')
            ),
        ),
    );*/

}
