<?php 
    session_start();
    include '../../components/header.php';
    include '../../components/navigation.php';
    include '../../account/auth/dbConfig.php';

    $blogID = $_GET['blog_id'];

    $blogDetails = $conn->prepare('SELECT 
    b.id,
    b.title,
    b.blog_content,
    b.created_on,
    b.img_path
   FROM userBlog ub
   LEFT JOIN blog b ON ub.fk_blog_id = b.id
   where b.id= '. $blogID .'
   
  ');
    $blogDetails->execute();
    $blogDetails->store_result();
    $blogDetails->bind_result($blogID, $blogTitle, $blogContent, $blogCreated, $imgPath);
    $blogDetails->fetch();

// comments
$comments = $conn->prepare('SELECT 
	
c.id,
c.heading,
c.comment,
c.date_added,
c.pending,
u.username,
u.active,
u.id

FROM comments c
LEFT JOIN userBlog ub ON c.fk_userBlog = ub.id
LEFT JOIN blog b ON ub.fk_blog_id = b.id
LEFT JOIN users u ON ub.fk_user_id = u.id
where ub.fk_blog_id= '. $blogID .' AND c.pending = 0 AND u.active = 1
');
$comments->execute();
$comments->store_result();
$comments->bind_result($cID, $cHeading, $comment, $cDateAdded, $pending, $username, $active, $userID);

?>
<section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center blog-mob">
        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                <?= $blogTitle ?>
                </h1>
                <p class="mt-4 text-gray-500 dark:text-gray-400">Added on: <?= $blogCreated ?></p>
                <hr>
                <div class="mt-6">
                    <pre class="mt-4 text-gray-500 dark:text-gray-400">
                        <?= $blogContent ?>
                    </pre>    
                </div>      
            </div>
            
        </div>
    </div>
</section>
<!-- 
    if not logged in, display a link to login
 -->
<section>
        <!-- main container round the login / add comment section -->
        <div class="container mx-auto">
			<div class="flex justify-center px-6 my-6">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
                    <!-- the left column with image, this is always visible -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
						style="background-image: url('<?= ROOT_DIR ?>assets/images/shows/<?= $imgPath ?>')"
					></div>
					<!-- Col -->
                    <?php if (!isset($_SESSION['loggedin'])): ?>

                    <!-- this is the column that will diplay if they are not loggin in -->
					<div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <div class="px-8 mb-4 text-center">
                            <h3 class="pt-4 mb-2 text-2xl">Already have an account?</h3>
                            <button 
                                onclick="window.location.href='../login';"
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">SIGN IN</button>
                        </div>
                        <div class="px-8 mb-4 text-center">
                            <h3 class="pt-4 mb-2 text-2xl">Get involved</h3>
                            <p class="mb-4 text-sm text-gray-700"> Sign up today to get access to early bird tickets</p>
                            <button 
                                onclick="window.location.href='../register';"
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">SIGN UP</button>
                        </div>
                    <?php else: ?>
                    <!-- this is the column that will diplay if they are not loggin in -->
                    <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Leave a comment</h3>
                    <p class="mb-4 text-sm text-gray-700">
                        Your post will be visible once it as been approved by our admin
                    </p>
                </div>
                <div class="max-w-2xl mx-auto">
                    <form action="../account/dashboard/user/addComment.php?blog_id=<?= $blogID ?>" method="post">
                        <input type="hidden" name="fk_user_id" value="<?= $userID ?>">
                        <input type="hidden" name="fk_blog_id" value="<?= $blogID ?>">
                    
                        <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="heading">
									Comment Heading
								</label>
								<input
									class="w-full mb-4 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="heading"
									type="text"
									placeholder="Enter heading..."
                                    name="heading"
								/>
                        </div>
                        <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                            <label for="editor" class="sr-only"></label>
                            <textarea name="comment" id="editor" rows="8" class="block px-0 w-full border rounded shadow py-5 px-5 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Add your comment" required></textarea>
                        </div>
                        <button 
                        type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Comment
                        </button>
                    </form>
                </div>  
            </div>

                </div>
                   <?php endif ?>
				</div>
			</div>
		</div>   
        
       

</section>
<!-- 
    Comments component 
-->
<div class="px-8">
    <div class="bg-white p-4 rounded-lg shadow-xl py-8 mt-12">
        <h4 class="text-4xl font-bold text-gray-800 tracking-widest uppercase text-center">Comments</h4>
        <div class="space-y-12 px-2 xl:px-16 mt-12">
            <hr>
                <?php while ($comments->fetch()): ?>
                    <?php if($comments->num_rows > 0 && $active == 1): ?>

                <div class="mt-4 flex">
                    <div>
                        <p>Comment by: <?= $username?> On: <?= $cDateAdded ?></p>
                        <div class="flex items-center h-16">
                            <span class="text-lg text-blue-600 font-bold"><?= $cHeading ?></span>
                        </div>
                        <div class="flex items-center py-2">
                            <span class="text-gray-500"><?= $comment ?></span>
                        </div>
                    </div>
                </div>
            <hr>
            <?php endif ?>

            <?php endwhile ?>
            <?php if($comments->num_rows < 1): ?>
                <p class="mb-4 text-sm text-gray-700">There are no comments for this show yet</p>
            <?php endif ?>
        </div>
    </div>
</div>

<?php 
    include '../../components/footer.php';
?>