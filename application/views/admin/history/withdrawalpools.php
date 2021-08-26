<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        HISTORY WITHDRAWAL POOLS
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <button onclick="window.print();return false" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </button>
                        <a href="<?= base_url('/administrator/historywithdrawal/generatexls') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <form action="<?= base_url("administrator/historywithdrawal/search") ?>" method="POST">
                        <input type="text" name="keyword" class="form-control w-56 box pr-10 placeholder-theme-8" placeholder="Search..." value="<?= $this->session->userdata('keyword') ?>">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">DATE <a href="<?= base_url("/administrator/historywithdrawal/date/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/historywithdrawal/date/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="whitespace-nowrap">USERNAME <a href="<?= base_url("/administrator/historywithdrawal/username/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/historywithdrawal/username/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">TRX ID <a href="<?= base_url("/administrator/historywithdrawal/trxid/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/historywithdrawal/trxid/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">SEND TO ADDRESS <a href="<?= base_url("/administrator/historywithdrawal/address/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/historywithdrawal/address/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">AMOUNT <a href="<?= base_url("/administrator/historywithdrawal/amount/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/historywithdrawal/amount/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">STATUS <a href="<?= base_url("/administrator/historywithdrawal/status/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/historywithdrawal/status/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($content as $historywithdrawal) : ?>
                    <tr class="intro-x">
                        <td>
                            <?= $historywithdrawal->date ?>
                        </td>
                        <td class="w-40">
                            <?= $historywithdrawal->username ?>
                        </td>
                        <td class="text-center">
                            <?= $historywithdrawal->trx_id ?>
                        </td>
                        <td class="text-center">
                            <?= $historywithdrawal->send_to ?>
                        </td>
                        <td class="text-center">
                            <?= $historywithdrawal->amount ?>
                        </td>
                        <td class="text-center">
                            <?php if ($historywithdrawal->status == 1) : ?>
                                <div class="flex items-center justify-center text-theme-10"> <i data-feather="check-circle" class="w-4 h-4 mr-2"></i> APPROVED </div>
                            <?php endif ?>
                            <?php if ($historywithdrawal->status == 2) : ?>
                                <div class="flex items-center justify-center text-theme-21"> <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> REJECTED </div>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <?= $pagination ?>
        </div>
        <!-- END: Pagination -->
    </div>
</div>
<!-- END: Content -->
</div>
</div>