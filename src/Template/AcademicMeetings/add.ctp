<div class="AcademicMeeting form">
    <h2>発表登録</h2>
    <?= $this->Form->create($AcademicMeeting, ['enctype' => 'multipart/form-data','onsubmit'=>'return confirm("こちらの内容で登録してもいいですか？");']) ?>
    <fieldset>
        <?= $this->Form->input('name', ['label' => '氏名', 'error' => false]) ?>
        <?= $this->Form->error('name') ?>
        <?= $this->Form->input('beingTo', ['label' => '所属', 'error' => false]) ?>
        <?= $this->Form->error('beingTo') ?>
        <?= $this->Form->input('mail', ['label' => 'メールアドレス', 'error' => false]) ?>
        <?= $this->Form->error('mail') ?>
        <?= $this->Form->input('subjectNo', ['label' => '演題番号', 'error' => false]) ?>
        <?= $this->Form->error('subjectNo') ?>
        <?= $this->Form->input('osVer', ['label' => 'OSバージョン', 'error' => false]) ?>
        <?= $this->Form->error('osVer') ?>
        <?= $this->Form->input('pptVer', [
            'options' => [
                'Power point 97-2003' => 'Power point 97-2003'
                , 'Power point 2007' => 'Power point 2007'
                , 'Power point 2010' => 'Power point 2010'
                , 'Power point 2013' => 'Power point 2013'
                , 'Power point 2016' => 'Power point 2016']
        , 'label' => 'PPTバージョン', 'error' => false]) ?>
        <?= $this->Form->error('pptVer') ?>
        <?= $this->Form->input('fileName', ['type' => 'file', 'label' => 'パワーポイント', 'error' => false]); ?>
        <?= $this->Form->error('fileName') ?>
        <p>※50MBを超えるファイルを送信する場合は、<br>
        　スライドに挿入されている画像の圧縮や、<br>
        　zip等での圧縮等を行い50MBにファイルサイズを抑えてください</p>
   </fieldset>
   <div class="btnLink">
       <?= $this->Form->button(__('登録内容を確認')); ?>
   </div>
   <?= $this->Form->end() ?>
</div>
