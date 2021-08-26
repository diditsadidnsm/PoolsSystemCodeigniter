<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            News List Form
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        News List
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <?= form_open($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <?= isset($input->answer_by) ? form_hidden('answer_by', 'admin') : '' ?>
                        <?= isset($input->answer_date) ? form_hidden('answer_date', date("Y-m-d H:i:s")) : '' ?>
                        <div>
                            <label for="title" class="form-label">Title</label>
                            <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title']) ?>
                            <?= form_error('title') ?>
                        </div>
                        <div class="mt-3">
                            <label for="content" class="form-label">Content</label>
                            <?= form_textarea(['name' => 'content', 'id' => 'content', 'value' => $input->content, 'row' => 4, 'class' => 'form-control']) ?>
                            <?= form_error('content') ?>
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
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>