<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Problem Support List Form
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Problem Support List
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <?= form_open($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <?= isset($input->status) ? form_hidden('status', 1) : '' ?>
                        <?= isset($input->answer_by) ? form_hidden('answer_by', 'admin') : '' ?>
                        <?= isset($input->answer_date) ? form_hidden('answer_date', date("Y-m-d H:i:s")) : '' ?>
                        <div class="mt-3">
                            <label for="problem" class="form-label">Problem</label>
                            <?= form_input('problem', $input->problem, ['class' => 'form-control', 'id' => 'problem', 'readonly' => true]) ?>
                            <?= form_error('problem') ?>
                        </div>
                        <div class="mt-3">
                            <label for="answer" class="form-label">Answer</label>
                            <?= form_textarea(['name' => 'answer', 'id' => 'answer', 'value' => $input->answer, 'row' => 4, 'class' => 'form-control']) ?>
                            <?= form_error('answer') ?>
                        </div>
                        <div class="mt-3">
                            <label for="answer" class="form-label">Image</label>
                            <br />
                            <input type="file" name="answer_img" value="upload" id="fileButton">
                            <br />
                            <br />
                            <progress value="0" max="100" id="uploader">0%</progress>
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                            <?php if ($input->answer_img): ?>
                                <img src="<?= base_url("https://files.pools.systems/answer/$input->answer_img") ?>" alt="" height="150">
                            <?php endif ?>
                        </div>
                        <div class="mt-3">
                            <input type="checkbox" aria-label="Checkbox for following text input" required="true"> Are you sure about this action?
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary shadow-md mr-2" type="submit"><i data-feather="check-circle"></i>&nbsp; Submit Now</button>
                            <a href="javascript:history.back(-1)" class="btn btn-danger shadow-md mr-2"><i data-feather="x-circle"></i>&nbsp; Cancel</a>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <!-- END: Input -->
        </div
    </div>
</div>
<!-- END: Content -->
</div>
</div>

<script src="<?= base_url() ?>assets/text-editor/ckeditor/ckeditor.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

<script type="text/javascript">
    CKEDITOR.replace('answer');
</script>

<script>
    var config = {
        apiKey: "AIzaSyCDzwlnnd8TJPmfZYxCBH6c6GPrZXI3g7s",
        authDomain: "avava-amizade.firebaseapp.com",
        databaseURL: "https://avava-amizade.firebaseio.com",
        projectId: "avava-amizade",
        storageBucket: "files.pools.systems",
        messagingSenderId: "472064102347",
    };
    firebase.initializeApp(config);
</script>

<script type="text/javascript">
    let fbBucketName = 'answer';

    let uploader = document.getElementById('uploader');
    let fileButton = document.getElementById('fileButton');

    fileButton.addEventListener('change', function (e) {

        console.log('file upload event', e);

        let file = e.target.files[0];
        let storageRef = firebase.storage().ref(`${fbBucketName}/${file.name}`);
        let uploadTask = storageRef.put(file);

        uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED,
            function (snapshot) {
                let progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                uploader.value = progress;
                console.log('Upload is ' + progress + '% done');
                switch (snapshot.state) {
                    case firebase.storage.TaskState.PAUSED:
                        console.log('Upload is paused');
                        break;
                    case firebase.storage.TaskState.RUNNING:
                        console.log('Upload is running');
                        break;
                }
            }, function (error) {
                switch (error.code) {
                    case 'storage/unauthorized':
                        break;
                    case 'storage/canceled':
                        break;
                    case 'storage/unknown':
                        break;
                }
            }, function () {
                let downloadURL = uploadTask.snapshot.downloadURL;
                console.log('downloadURL', downloadURL);
            });

    });
</script>