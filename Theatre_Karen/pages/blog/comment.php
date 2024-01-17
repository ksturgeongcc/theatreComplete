<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                style="background-image: url('https://source.unsplash.com/oWTW-jNGl9I/600x800')">
            </div>
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Leave a comment</h3>
                    <p class="mb-4 text-sm text-gray-700">
                        Your post will be visible once it as been approved by our admin
                    </p>
                </div>
                <div class="max-w-2xl mx-auto">
                    <form action="../../accunt/dashboard/user/addComment.php?blog_id=<?= $blogID ?>" method="post">
                        <input type="hidden" name="fk_user_id" value="<?= $userID ?>">
                        <input type="hidden" name="fk_blog_id" value="<?= $blogID ?>">
                        <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600">
                                <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600"> 
                                    <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                                        <p class="mb-4 text-sm text-gray-700">Leave a comment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                            <label for="editor" class="sr-only"></label>
                            <textarea name="comment" id="editor" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Add your comment" required></textarea>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Comment
                        </button>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>