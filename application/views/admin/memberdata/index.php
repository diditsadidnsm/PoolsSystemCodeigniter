<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        MEMBER DATA
    </h2>
    <?php $this->load->view('layouts/_alert') ?>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <button onclick="window.print();return false" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </button>
                        <a href="<?= base_url('/administrator/memberdata/generatexls') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <form action="<?= base_url("administrator/memberdata/search") ?>" method="POST">
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
                    <th class="whitespace-nowrap">REGISTER DATE <a href="<?= base_url("/administrator/memberdata/date/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberdata/date/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="whitespace-nowrap">USERNAME <a href="<?= base_url("/administrator/memberdata/username/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberdata/username/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">NAME <a href="<?= base_url("/administrator/memberdata/name/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberdata/name/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">EMAIL <a href="<?= base_url("/administrator/memberdata/email/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberdata/email/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">BALANCE <a href="<?= base_url("/administrator/memberdata/balance/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberdata/balance/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">STATUS <a href="<?= base_url("/administrator/memberdata/status/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberdata/status/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">DECISION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($content as $memberdata) : ?>
                <tr class="intro-x">
                    <td>
                        <?= $memberdata->date_created ?>
                    </td>
                    <td class="w-40">
                        <?= $memberdata->username ?>
                    </td>
                    <td class="text-center">
                        <?= $memberdata->name ?>
                    </td>
                    <td class="text-center">
                        <?= $memberdata->email ?>
                    </td>
                    <td class="text-center">
                        <?= $memberdata->active ?>
                    </td>
                    <td class="text-center">
                        <?= $memberdata->gratisan ? '<div class="flex items-center justify-center text-theme-25"> <i data-feather="users" class="w-4 h-4 mr-2"></i> MEMBER FREE </div>' : '<div class="flex items-center justify-center text-theme-10"> <i data-feather="users" class="w-4 h-4 mr-2"></i> MEMBER PAID </div>' ?>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3 text-theme-21" href="<?= base_url("/administrator/memberdata/detail/$memberdata->trxpin") ?>"> <i data-feather="eye" class="w-4 h-4 mr-1"></i> Detail </a>
                            <a class="flex items-center text-theme-22" href="<?= base_url("/administrator/memberdata/edit/$memberdata->trxpin") ?>"> <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                        </div>
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