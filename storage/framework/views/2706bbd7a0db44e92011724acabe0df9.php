<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <a href="/post" class="btn btn-primary">Add Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>User Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->id); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->slug); ?></td>
                            <td><?php echo e($post->user->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('home.show',$post->slug)); ?>"
                                   class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Read Post</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div> -->
            <div class="col-md-8" >
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="border:1px solid black">
                    <h3><?php echo e($post->user->name); ?></h3>
                    <p><?php echo e($post->title); ?></p>
                    <!-- Comments Section -->
                    <div class="comments">
                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- Assuming you have a `comments` relationship on Post -->
                            <p><strong><?php echo e($comment->user->name); ?>:</strong> <?php echo e($comment->content); ?></p> <!-- Adjust accordingly to how your comments are structured -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Add a new comment form -->
                    <form action="<?php echo e(route('post.comment', $post->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <textarea name="comment" placeholder="Add a comment..."></textarea>
                        <button class="btn btn-primary" type="submit">Add Comment</button>
                    </form>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ABDULLAH\xampp\htdocs\Laravel\Laravel-Post-Comment-System\resources\views/home.blade.php ENDPATH**/ ?>