<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->id); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td>
                                <a href="<?php echo e(route('post.show',$post->slug)); ?>"
                                   class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Read Post</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ABDULLAH\xampp\htdocs\Laravel\Laravel-Post-Comment-System\resources\views/post/index.blade.php ENDPATH**/ ?>