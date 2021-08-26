<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <?php foreach ($rows as $row) : ?>
        <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-12">
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        <a href="javascript:history.back(-1)" class="btn btn-danger shadow-md mr-2"><i data-feather="corner-down-left"></i>&nbsp; Back</a>
                    </h2>
                </div>
                <div id="faq-accordion-1" class="accordion p-5">
                    <div class="accordion-item">
                        <div id="faq-accordion-content-1" class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-1" aria-expanded="true" aria-controls="faq-accordion-collapse-1"> <?= $row->question ?></button>
                        </div>
                        <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="faq-accordion-content-1" data-bs-parent="#faq-accordion-1">
                            <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                <?= $row->answer ?>
                                <br /><br />
                                FAQ Priority : <?= $row->priority ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>