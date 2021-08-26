<?php foreach ($rows as $detail) : ?>
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            <a href="javascript:history.back(-1)" class="btn btn-danger shadow-md mr-2"><i data-feather="corner-down-left"></i>&nbsp; Back</a>
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: FAQ Content -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="box">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        <?= $detail->username ?>
                    </h2>
                </div>
                <div id="faq-accordion-1" class="accordion p-5">
                    <div class="accordion-item">
                        <div id="faq-accordion-content-1" class="accordion-header">
                            <button class="accordion-button">
                                <?= $detail->problem ?>
                            </button>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="faq-accordion-content-2" class="accordion-header">
                            <button class="accordion-button collapsed">
                                <?= $detail->request_date ?>
                            </button>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="faq-accordion-content-2" class="accordion-header">
                            <button class="accordion-button collapsed">
                                <?= $detail->language ?>
                            </button>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="faq-accordion-content-3" class="accordion-header">
                            <button class="accordion-button collapsed">
                                <?= $detail->status ? '<div class="flex items-center justify-center text-theme-10"> <i data-feather="check-circle" class="w-4 h-4 mr-2"></i> Answered </div>' : '<div class="flex items-center justify-center text-theme-24"> <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> Not Yet Answered </div>' ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="box">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        <?= $detail->answer_by ?>
                    </h2>
                </div>
                <div id="faq-accordion-3" class="accordion p-5">
                    <div class="accordion-item">
                        <div id="faq-accordion-content-1" class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-9" aria-expanded="true" aria-controls="faq-accordion-collapse-9">
                                <?= $detail->answer ?>
                            </button>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="faq-accordion-content-2" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-10" aria-expanded="false" aria-controls="faq-accordion-collapse-10">
                                <?= $detail->answer_date ?>
                            </button>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="faq-accordion-content-2" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-10" aria-expanded="false" aria-controls="faq-accordion-collapse-10">
                                <img src="https://files.pools.systems/answer/<?= $detail->answer_img ?>" style="width: 80px;">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: FAQ Content -->
    </div>
</div>
<?php endforeach; ?>
</div>
</div>