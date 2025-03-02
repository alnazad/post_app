<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p><?php echo e($post->title); ?></p>
                    </div>

                    <div class="card-body">
                        <h5>Display Comments</h5>

                        <?php echo $__env->make('post.partials.replies', ['comments' => $post->comments, 'post_id' => $post->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <hr/>
                    </div>

                    <div class="card-body">
                        <h5>Leave a comment</h5>
                        <form method="post" action="<?php echo e(route('comment.add')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" name="comment" class="form-control"/>
                                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-outline-danger py-0"
                                       style="font-size: 0.8em;" value="Add Comment"/>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ABDULLAH\xampp\htdocs\Laravel\Laravel-Post-Comment-System\resources\views/post/single.blade.php ENDPATH**/ ?>