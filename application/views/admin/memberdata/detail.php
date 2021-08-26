<?php foreach ($rows as $datamember) : ?>
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            <a href="javascript:history.back(-1)" class="btn btn-danger shadow-md mr-2"><i data-feather="corner-down-left"></i>&nbsp; Back</a>
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="User Not Uploaded" class="rounded-full" src="https://assets.pools.systems/<?= $datamember->img ?>">
                    <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-17 rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </div>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?= $datamember->name ?></div>
                    <div class="text-gray-600"><?= $datamember->email ?></div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> Register by : <?= $datamember->register_by ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Last Activity : <?= $datamember->last_activity ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Last Login : <?= $datamember->last_login ?></div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Date Active : <?= $datamember->date_active ?></div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Date Expired : <?= $datamember->date_expired ?></div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> Username : <?= $datamember->username ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Address : <?= $datamember->address ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> City : <?= $datamember->kabkota ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Provinsi : <?= $datamember->provinsi ?></div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> Country : <?= $datamember->negara ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">
        <div id="dashboard" class="tab-pane active" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Member Bonus -->
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            MEMBER BONUS
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                            <table class="table table-report -mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">SALDO BONUS</th>
                                    <th class="whitespace-nowrap">BONUS REFERRAL</th>
                                    <th class="text-center whitespace-nowrap">BONUS ROYALTY</th>
                                    <th class="text-center whitespace-nowrap">TOP SPONSOR</th>
                                    <th class="text-center whitespace-nowrap">BONUS PNS</th>
                                    <th class="text-center whitespace-nowrap">BONUS NSP</th>
                                    <th class="text-center whitespace-nowrap">TOTAL BONUS</th>
                                    <th class="text-center whitespace-nowrap">ENABLE BONUS</th>
                                    <th class="text-center whitespace-nowrap">BONUS CLAIMED</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="intro-x">
                                    <td>
                                        <?= $datamember->active_bonus ?>
                                    </td>
                                    <td class="w-40">
                                        <?= $datamember->bonus_referral ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $datamember->bonus_royalty ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $datamember->bonus_topsponsor ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $datamember->bonus_pns ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $datamember->bonus_nsp ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $datamember->active_total ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $datamember->enable_bonus ? '<div class="flex items-center justify-center text-theme-10"> <i data-feather="check-circle" class="w-4 h-4 mr-2"></i> YES </div>' : '<div class="flex items-center justify-center text-theme-24"> <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> NO </div>' ?>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <button class="flex items-center mr-3 text-theme-21"> <?= $datamember->active_claimed ?> </button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END: Member Bonus -->
                <!-- BEGIN: Bonus History -->
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            BONUS HISTORY
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                            <table class="table table-report -mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">DATE</th>
                                    <th class="whitespace-nowrap">TYPE</th>
                                    <th class="text-center whitespace-nowrap">FROM</th>
                                    <th class="text-center whitespace-nowrap">AMOUNT</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="intro-x">
                                    <td></td>
                                    <td class="w-40"></td>
                                    <td class="text-center"></td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <button class="flex items-center mr-3 text-theme-21"></button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END: Bonus History -->
                <!-- BEGIN: Transfer History -->
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            TRANSFER HISTORY
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                            <table class="table table-report -mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">DATE</th>
                                    <th class="whitespace-nowrap">TYPE</th>
                                    <th class="text-center whitespace-nowrap">FROM</th>
                                    <th class="text-center whitespace-nowrap">AMOUNT</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="intro-x">
                                    <td></td>
                                    <td class="w-40"></td>
                                    <td class="text-center"></td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <button class="flex items-center mr-3 text-theme-21"></button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END: Transfer History -->
                <!-- BEGIN: Transaction History -->
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            TRANSACTION HISTORY
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                            <table class="table table-report -mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">DATE</th>
                                    <th class="whitespace-nowrap">TYPE</th>
                                    <th class="text-center whitespace-nowrap">FROM</th>
                                    <th class="text-center whitespace-nowrap">AMOUNT</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="intro-x">
                                    <td></td>
                                    <td class="w-40"></td>
                                    <td class="text-center"></td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <button class="flex items-center mr-3 text-theme-21"></button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END: Transaction History -->
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>