<?php if($paginator->hasPages()): ?>

    <div class="py-4 text-sm flex">
        <div class="w-full hidden my-auto sm:w-1/2 sm:block">
            Showing <?php echo e($paginator->firstItem()); ?> -  <?php echo e($paginator->lastItem()); ?> items out of <?php echo e($paginator->total()); ?>

        </div>

        <div class="w-full sm:w-1/2 my-auto">
            <div class="flex justify-end">
                <div class="mr-4 my-auto">
                    <?php echo e($paginator->currentPage()); ?> of <?php echo e($paginator->lastPage()); ?>

                </div>


                <div class="pagination">
                    <?php if($paginator->onFirstPage()): ?>
                        <div class="pagination-items group disabled">
                            <div class="fa fa-angle-left pagination-items-icon disabled"></div>
                            <div style="color: #aaa;">
                                Prev
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="pagination-items group">
                            <div class="fa fa-angle-left pagination-items-icon"></div>
                            <div>
                                Prev
                            </div>
                        </a>
                    <?php endif; ?>


                    
                    <?php if($paginator->hasMorePages()): ?>
                        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="pagination-items group">
                            <div>
                                Next
                            </div>
                            <div class="fa fa-angle-right pagination-items-icon text-right"></div>
                        </a>
                    <?php else: ?>
                        <div class="pagination-items group disabled">
                            <div style="color: #aaa;">
                                Next
                            </div>
                            <div class="fa fa-angle-right pagination-items-icon text-right disabled"></div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>