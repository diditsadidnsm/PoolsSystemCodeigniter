<!DOCTYPE html>
<?php foreach(getTheme() as $theme) : ?>
<html lang="en" class="<?= $theme->is_active ? 'light' : 'dark' ?>">
<?php endforeach; ?>
<head>
    <meta charset="utf-8">
    <link href="<?= base_url('/images/logo/pools_logo.png') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= isset($title) ? $title : 'Pools Admin' ?> - Pools Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />
</head>
<body class="main">
<?php $this->load->view('layouts/_navbar'); ?>
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Slider Image Form
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Slider Image
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <?= form_open($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <?= isset($input->tipe) ? form_hidden('tipe', 1) : '' ?>
                        <div>
                            <label for="name" class="form-label">Slider Name</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control']) ?>
                            <?= form_error('name') ?>
                        </div>
                        <div class="mt-3">
                            <label for="image" class="form-label">Slider Image</label>
                            <br />
                            <input type="file" name="image" value="upload" id="fileButton">
                            <br />
                            <br />
                            <progress value="0" max="100" id="uploader">0%</progress>
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                            <?php if ($input->image): ?>
                                <img src="<?= base_url("https://files.pools.systems/sliders/$input->image") ?>" alt="" height="150">
                            <?php endif ?>
                        </div>
                        <div class="mt-3">
                            <input type="checkbox" aria-label="Checkbox for following text input" required="true"> Are you sure about this action?
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary shadow-md mr-2" type="submit"><i data-feather="check-circle"></i>&nbsp; Upload Now</button>
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

<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

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
    let fbBucketName = 'sliders';

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

</body>
</html>