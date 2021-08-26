<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Member Data
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Member Data
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <?= form_open($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <?= form_input('username', $input->username, ['class' => 'form-control', 'id' => 'username']) ?>
                            <?= form_error('username') ?>
                        </div>
                        <div class="mt-3">
                            <label for="nama" class="form-label">Name</label>
                            <?= form_input('nama', $input->nama, ['class' => 'form-control', 'id' => 'nama']) ?>
                            <?= form_error('nama') ?>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'value' => $input->email, 'class' => 'form-control']) ?>
                            <?= form_error('email') ?>
                        </div>
                        <div class="mt-3">
                            <label for="phone" class="form-label">Phone</label>
                            <?= form_input(['type' => 'number', 'name' => 'phone', 'id' => 'phone', 'value' => $input->phone, 'class' => 'form-control']) ?>
                            <?= form_error('phone') ?>
                        </div>
                        <div class="mt-3">
                            <label for="banned" class="form-label">Banned Status</label>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'banned', 'value' => 0, 'checked' => $input->banned == 0 ? true : false, 'form-check-input']) ?>
                                <label for="" class="form-check-label">
                                    Activated
                                </label>
                            </div>
                            <br />
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'banned', 'value' => 1, 'checked' => $input->banned == 1 ? true : false, 'form-check-input']) ?>
                                <label for="" class="form-check-label">
                                    Banned
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="banned" class="form-label">Enable Bonus</label>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'enable_bonus', 'value' => 1, 'checked' => $input->enable_bonus == 1 ? true : false, 'form-check-input']) ?>
                                <label for="" class="form-check-label">
                                    Enable Bonus
                                </label>
                            </div>
                            <br />
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'enable_bonus', 'value' => 0, 'checked' => $input->enable_bonus == 0 ? true : false, 'form-check-input']) ?>
                                <label for="" class="form-check-label">
                                    Not Enable Bonus
                                </label>
                            </div>
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