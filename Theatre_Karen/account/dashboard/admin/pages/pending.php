<?php 
    session_start();
    include '../../../auth/dbConfig.php';
    include '../../../../components/header.php';
    include '../../../../components/navigation.php';

    $blogID = $_GET['blog_id'];
    // $userID = $_GET['user_id'];
    $userID = $_SESSION['id'];

    $blogDetails = $conn->prepare('SELECT 
	
    b.id,
    b.title,
    b.blog_content,
    b.created_on

   FROM userBlog ub
   LEFT JOIN blog b ON ub.fk_blog_id = b.id
   where b.id= '. $blogID .'
   
  ');
$blogDetails->execute();
$blogDetails->store_result();
$blogDetails->bind_result($blogID, $blogTitle, $blogContent, $blogCreated);
$blogDetails->fetch();
// only pending comments will show
$pendingComment = $conn->prepare('SELECT 
c.id,
c.comment,
c.heading,
-- c.fk_userBlog
u.username,
b.id,
b.title,
b.blog_content,
b.img_path,
b.show_name

FROM comments c 

LEFT JOIN userblog ub on c.fk_userBlog = ub.id 
LEFT JOIN users u on ub.fk_user_id = u.id 
LEFT JOIN blog b on ub.fk_blog_id = b.id 

WHERE pending = 1

');
$pendingComment->execute();
$pendingComment->store_result();
$pendingComment->bind_result($commentID, $commentDetails, $commentHeading, $username, $bID, $blogTitle, $blogContent, $blogImg, $showName, );

?>

<section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center min-h-screen blog-mob">
        <div class=" bg-cover lg:block lg:w-2/5" style="background-image: url('<?= ROOT_DIR ?>assets/images/mary_poppins.jpg'); background-position: center;">
        </div>

        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                <?= $blogTitle ?>
            </h1>

                <p class="mt-4 text-gray-500 dark:text-gray-400">Added on: <?= $blogCreated ?> by <?= $username ?></p>
                <hr>
                <div class="mt-6">
                    <pre class="mt-4 text-gray-500 dark:text-gray-400">
                        <?= $blogContent ?>
                    </pre>    
                </div>   
                <button 
                type="submit" 
                class="mt-10 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            edit blog
                        </button>   
            </div>
            
        </div>
    </div>
</section>

<!-- Comments component -->
<div class="p-8">
    <div class="bg-white p-4 rounded-lg shadow-xl py-8 mt-12">
        <h4 class="text-4xl font-bold text-gray-800 tracking-widest uppercase text-center">Pending Comments</h4>
        <div class="space-y-12 px-2 xl:px-16 mt-12">
   
            <div class="mt-4 flex items-center direction-col">
            <?php while ($pendingComment->fetch()): ?>

                <div>
                    <div class="flex items-center h-16">
                        <span class="text-lg text-blue-600 font-bold"><?= $commentHeading ?></span>
                    </div>
                    <div class="flex items-center py-2">
                        <span class="text-gray-500"><?= $commentDetails ?></span>

                    </div>
                    <div class="flex items-center py-2">
                        <span class="text-gray-500">Added By: <?= $username ?> </span>

                    </div>
                    <button 
                    onclick="window.location.href='../config/publishComment.php?cid=<?= $commentID ?>';"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Publish
                        </button>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</div>

<?php 
    include '../../../components/footer.php';
?>