<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Notification -->
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <?php $this->load->view('layouts/_alert') ?>
                </div>
                <!-- BEGIN: Notification -->
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex items-center text-theme-26 dark:text-theme-33"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-21"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $member ?></div>
                                    <div class="text-base text-gray-600 mt-1">Total Member</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="user" class="report-box__icon text-theme-22"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $free ?></div>
                                    <div class="text-base text-gray-600 mt-1">Member Free</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="user-check" class="report-box__icon text-theme-21"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $paid ?></div>
                                    <div class="text-base text-gray-600 mt-1">Member Paid</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="user-x" class="report-box__icon text-theme-24"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $banned ?></div>
                                    <div class="text-base text-gray-600 mt-1">Member Banned</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="credit-card" class="report-box__icon text-theme-22"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $member_kyc ?></div>
                                    <div class="text-base text-gray-600 mt-1">Total Member KYC</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="percent" class="report-box__icon text-theme-23"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $withdrawal_request ?> USDT</div>
                                    <div class="text-base text-gray-600 mt-1">Member Withdrawal</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="dollar-sign" class="report-box__icon text-theme-23"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $withdrawal ?> USDT</div>
                                    <div class="text-base text-gray-600 mt-1">Withdrawal Total</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="dollar-sign" class="report-box__icon text-theme-10"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $deposit ?> USDT</div>
                                    <div class="text-base text-gray-600 mt-1">Deposit Total</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Activity Deposit Success
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 xxl:col-span-3">
            <div class="xxl:border-l border-theme-25 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Problem Support -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Problem Support
                            </h2>
                        </div>
                        <div class="mt-5">
                            <?php foreach ($problem as $probelmpending) : ?>
                            <a href="<?= base_url("/administrator/problemsupport/answered/$probelmpending->id") ?>">
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium"><?= $probelmpending->username ?></div>
                                            <div class="text-gray-600 text-xs mt-0.5"><?= $probelmpending->tanggal ?></div>
                                            <div class="text-gray-600 text-xs mt-0.5"><?= substr($probelmpending->problem, 0 , 22) ?>..</div>
                                        </div>
                                        <div class="text-theme-24">Not Yet Answered</div>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach; ?>
                            <a href="<?= base_url('/administrator/problemsupport') ?>" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">View More</a>
                        </div>
                    </div>
                    <!-- END: Problem Support -->

                    <!-- BEGIN: Member KYC -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Member KYC
                            </h2>
                        </div>
                        <div class="mt-5">
                            <?php foreach ($kyc as $memberkyc) : ?>
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Member Not Uploaded" src="https://assets.pools.systems/<?= $memberkyc->img_selfie ?>">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium"><?= $memberkyc->username ?></div>
                                            <div class="text-gray-600 text-xs mt-0.5"><?= $memberkyc->nama ?></div>
                                        </div>
                                        <div class="text-theme-24">Pending</div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a href="<?= base_url('/administrator/memberverify') ?>" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">View More</a>
                        </div>
                    </div>
                    <!-- END: Member KYC -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    let ctx = document.getElementById('myChart').getContext('2d');
    let chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                if (count($graph)>0) {
                    foreach ($graph as $data) {
                        echo "'" .$data->username ."',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'USDT',
                backgroundColor: '#24acd3',
                borderColor: '#0153ce',
                data: [
                    <?php
                    if (count($graph)>0) {
                        foreach ($graph as $data) {
                            echo $data->amount . ", ";
                        }
                    }
                    ?>
                ],
            }]
        },
    });

</script>