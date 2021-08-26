<div class="content">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            <a href="<?= base_url("/administrator/popup/create") ?>" class="btn btn-primary shadow-md mr-2">
                <i data-feather="image"></i>&nbsp; Create New Popup
            </a>
        </h2>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <?php foreach ($content as $popup) : ?>
            <div class="col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            <?= $popup->name ?>
                        </h2>
                        <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="<?= base_url("/administrator/popup/edit/$popup->id") ?>" class="flex items-center text-theme-22"><i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit Popup</a>
                        </div>
                    </div>
                    <div id="basic-accordion" class="p-5">
                        <div class="preview">
                            <div id="faq-accordion-1" class="accordion">
                                <div class="accordion-item">
                                    <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="faq-accordion-content-1" data-bs-parent="#faq-accordion-1">
                                        <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                            <img src="https://files.pools.systems/popup/<?= $popup->image ?>" alt="Popup Not Successed Uploaded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <?= form_open(base_url("/administrator/popup/delete/$popup->id"), ['method' => 'POST']) ?>
                        <?= form_hidden('id', $popup->id) ?>
                        <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')" class="flex items-center text-theme-24"> <i data-feather="delete" class="w-4 h-4 mr-1"></i> Delete Popup </button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>