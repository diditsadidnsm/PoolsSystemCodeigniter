<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Change Theme
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Theme Setting
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <?= form_open($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'is_active', 'value' => 1, 'checked' => $input->is_active == 1 ? true : false, 'form-check-input']) ?>
                                <label for="" class="form-check-label">
                                    Light Mode <img src="<?= base_url() ?>assets/images/theme/1.png" width="300px" alt="theme setting pools admin">
                                </label>
                            </div>
                            <br />
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'is_active', 'value' => 0, 'checked' => $input->is_active == 0 ? true : false, 'form-check-input']) ?>
                                <label for="" class="form-check-label">
                                    Dark Mode <img src="<?= base_url() ?>assets/images/theme/0.png" width="300px" alt="theme setting pools admin">
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="checkbox" aria-label="Checkbox for following text input" required="true"> Are you sure about this action?
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary shadow-md mr-2" type="submit"><i data-feather="refresh-cw"></i>&nbsp; Change Now</button>
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