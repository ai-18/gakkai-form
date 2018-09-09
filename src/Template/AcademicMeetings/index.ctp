<div class="AcademicMeeting form">
    <h2>発表情報ダウンロード</h2>
    <div class="btnLink">
        <?= $this->Form->postButton('CSVダウンロード', ['controller' => 'AcademicMeetings', 'action' => 'export']) ?>
    </div>
</div>
