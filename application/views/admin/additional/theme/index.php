<?php foreach ($content as $theme) : ?>
<div class="content">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            <a href="<?= base_url("/administrator/theme/change/$theme->id") ?>" class="btn btn-primary shadow-md mr-2">
                <i data-feather="refresh-cw"></i>&nbsp; Change Theme Mode
            </a>
        </h2>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Light Mode
                    </h2>
                    <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <?= $theme->is_active ? 'Activated' : 'Not Activated' ?>
                    </div>
                </div>
                <div id="basic-accordion" class="p-5">
                    <div class="preview">
                        <div id="faq-accordion-1" class="accordion">
                            <div class="accordion-item">
                                <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="faq-accordion-content-1" data-bs-parent="#faq-accordion-1">
                                    <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                        <img src="<?= base_url() ?>assets/images/theme/1.png" alt="theme setting pools admin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Dark Mode
                    </h2>
                    <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <?= $theme->is_active ? 'Not Activated' : 'Activated' ?>
                    </div>
                </div>
                <div id="basic-accordion" class="p-5">
                    <div class="preview">
                        <div id="faq-accordion-1" class="accordion">
                            <div class="accordion-item">
                                <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="faq-accordion-content-1" data-bs-parent="#faq-accordion-1">
                                    <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                        <img src="<?= base_url() ?>assets/images/theme/0.png" alt="theme setting pools admin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>