<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        MEMBER KYC
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
                        <a href="<?= base_url('/administrator/memberverify/generatexls') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <form action="<?= base_url("administrator/memberverify/search") ?>" method="POST">
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
                    <th class="whitespace-nowrap">PROFILE <a href="<?= base_url("/administrator/memberverify/profile/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberverify/profile/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="whitespace-nowrap">ID CARD <a href="<?= base_url("/administrator/memberverify/idcard/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberverify/idcard/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">ID NUMBER <a href="<?= base_url("/administrator/memberverify/idnumber/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberverify/idnumber/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">FULLNAME <a href="<?= base_url("/administrator/memberverify/fullname/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberverify/fullname/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">USERNAME <a href="<?= base_url("/administrator/memberverify/username/asc") ?>" class="badge badge-primary">&#8593;</a> <a href="<?= base_url("/administrator/memberverify/username/desc") ?>" class="badge badge-primary">&#8595;</a></th>
                    <th class="text-center whitespace-nowrap">DECISION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($content as $memberverify) : ?>
                    <tr class="intro-x">
                        <td>
                            <img src="https://assets.pools.systems/<?= $memberverify->img_selfie ?>" alt="Member Not Uploaded" style="width: 50px;">
                        </td>
                        <td class="w-40">
                            <img src="https://assets.pools.systems/<?= $memberverify->img_ktp ?>" alt="Member Not Uploaded" style="width: 50px;">
                        </td>
                        <td class="text-center">
                            <?= $memberverify->no_ktp ?>
                        </td>
                        <td class="text-center">
                            <?= $memberverify->name ?>
                        </td>
                        <td class="text-center">
                            <?= $memberverify->username ?>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a href="javascript:;" data-toggle="modal" data-target="#approved<?=$memberverify->id;?>" class="flex items-center mr-3 text-theme-10"> <i data-feather="check-circle" class="w-4 h-4 mr-1"></i> APPROVE </a>
                                <a href="javascript:;" data-toggle="modal" data-target="#rejected<?=$memberverify->id;?>" class="flex items-center text-theme-24"> <i data-feather="x-circle" class="w-4 h-4 mr-1"></i> REJECT </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <?= $pagination ?>
        </div>
    </div>
    <?php $no=0; foreach($content as $approved): $no++; ?>
    <div id="approved<?=$approved->id;?>" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url('/administrator/memberverify/edit'); ?>" method="post">
                    <div class="modal-body p-0">
                        <input type="hidden" readonly value="<?=$approved->id;?>" name="id">
                        <input type="hidden" readonly value="1" name="can_wd">
                        <div class="p-5 text-center">
                            <i data-feather="check-circle" class="w-16 h-16 text-theme-10 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-gray-600 mt-2">
                                Do you really want to approve this member?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-success w-24">Approve</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php $no=0; foreach($content as $rejected): $no++; ?>
        <div id="rejected<?=$rejected->id;?>" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo site_url('/administrator/memberverify/edit'); ?>" method="post">
                        <div class="modal-body p-0">
                            <input type="hidden" readonly value="<?=$rejected->id;?>" name="id">
                            <input type="hidden" readonly value="2" name="can_wd">
                            <div class="p-5 text-center">
                                <i data-feather="x-circle" class="w-16 h-16 text-theme-24 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-gray-600 mt-2">
                                    Do you really want to reject this member?
                                    <br>
                                    This process cannot be undone.
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <button type="submit" class="btn btn-danger w-24">Reject</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<!-- END: Content -->
</div>
</div>