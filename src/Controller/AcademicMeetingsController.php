<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

class AcademicMeetingsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $this->set('AcademicMeetings', $this->AcademicMeetings->find('all'));
    }

    public function view($id)
    {
        $AcademicMeeting = $this->AcademicMeetings->get($id);
        $this->set(compact('AcademicMeeting'));
    }

    public function add()
    {
        $AcademicMeeting = $this->AcademicMeetings->newEntity();
        if ($this->request->is('post')) {
            $AcademicMeeting = $this->AcademicMeetings->patchEntity($AcademicMeeting, $this->request->data);
            $inputFileName = $AcademicMeeting["fileName"]["name"];
            if(!$AcademicMeeting->errors()) {
              //エラーなし、登録処理
              if ($this->AcademicMeetings->save($AcademicMeeting)) {
                  $email = new Email('default');
                  $email->setTemplate("add")
                  ->setLayout("add")
                      ->emailFormat('html')
                      ->to($AcademicMeeting['mail'])
                      ->subject('登録完了のお知らせ')
                      ->viewVars(['value' => $AcademicMeeting, 'fileName' => $inputFileName])
                      ->send();
                  $this->Flash->success(__('登録が完了いたしました。登録情報をメール送信しましたのでご確認ください。'));
                  return $this->redirect(['action' => 'add']);
              }
            }
          $this->Flash->error(__('登録に失敗しました。'));
        }
        $this->set('AcademicMeeting', $AcademicMeeting);
    }

    public function export() {
        $AcademicMeetings = $this->AcademicMeetings->find('all');
        $_serialize = 'AcademicMeetings';
        $_header = ['ID', '名前', '所属', 'メールアドレス', '演題番号', 'OSバージョン', 'PPTバージョン', '保存ファイル名'];
        $_extract = [
            'ID', 'name', 'beingTo', 'mail', 'subjectNo', 'osVer', 'pptVer', 'fileName'
        ];

        $_csvEncoding = 'sjis';
        $_newline = "\r\n";
        $_eol = "\r\n";
        $time = date('Y-m-d_H:m');

        $this->response->download('myfile.csv');
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('AcademicMeetings', '_serialize', '_header', '_extract', '_csvEncoding', '_newline', '_eol'));
    }
}
