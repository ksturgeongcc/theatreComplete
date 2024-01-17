<?php 
    session_start();
    include '../../../auth/dbConfig.php';
    include '../../../../components/header.php';
    include '../../../../components/navigation.php'; 

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
$pendingComment->bind_result($commentID, $commentDetails,$heading, $username, $bID, $blogTitle, $blogContent, $blogImg, $showName);

?>

<div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20">
  <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-4xl sm:px-6 lg:px-8">
     <?php if ($pendingComment->num_rows == 0): ?>
        <h3>There are no comments pending</h3>
          <?php else: ?>

      <div class="shadow-xl mt-8 mr-0 mb-0 ml-0 pt-4 pr-10 pb-4 pl-10 flow-root rounded-lg sm:py-2">
      <?php while ($pendingComment->fetch()): ?>
  
      <div class="pt--10 pr-0 pb-10 pl-0">
          <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
            <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
              <div class="flex items-center flex-1 min-w-0">
                <img
                    src="<?=ROOT_DIR ?>assets/images/shows/<?= $blogImg ?>" class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
                <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                  <p class="text-lg font-bold text-gray-800 truncate"><?= $heading ?></p>
                  <p class="text-gray-600 text-md"><?= $username ?></p>
                </div>
              </div>
              <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
              <button onclick="window.location.href='commentDetails/<?= $commentID ?>';"  class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                    duration-200 hover:bg-gray-700 rounded-lg">View Comment</button>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile ?>
            <?php endif ?> 
      </div>
      
    </div>
  </div>
</div>





<?php 
  
    include '../../../../components/footer.php'; 
?>