<?php 
    session_start();
    include '../../../../components/header.php';
    include '../../../../components/navigation.php';
    include '../../../../account/auth/dbConfig.php';

    $cid = $_GET['cid'];
    $commentDetails = $conn->prepare('SELECT 
    c.id,
    c.comment,
    c.heading,
    -- c.fk_userBlog
    u.id,
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
    $commentDetails->execute();
    $commentDetails->store_result();
    $commentDetails->bind_result($commentID, $commentDetails, $heading, $uid, $username, $bID, $blogTitle, $blogContent, $blogImg, $showName);
    $commentDetails->fetch();
    ?>
    <div class="overflow-y-auto sm:p-0 pt-4 pr-4 pb-20 pl-4 bg-gray-800">
  <div class="flex justify-center items-end text-center min-h-screen sm:block">
    <div class="bg-gray-500 transition-opacity bg-opacity-75"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">​</span>
    <div class= "inline-block text-left bg-gray-900 rounded-lg overflow-hidden align-bottom transition-all transform
        shadow-2xl sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
      <div class="items-center w-full mr-auto ml-auto relative max-w-7xl md:px-12 lg:px-24">
        <div class="grid grid-cols-1">
          <div class="mt-4 mr-auto mb-4 ml-auto bg-gray-900 max-w-lg">
            <div class="flex flex-col items-center pt-6 pr-6 pb-6 pl-6">
              <img
                  src="<?= ROOT_DIR ?>assets/images/shows/<?= $blogImg ?>" class="flex-shrink-0 object-cover object-center btn- flex w-16 h-16 mr-auto -mb-8 ml-auto rounded-full shadow-xl">
              <p class="mt-8 text-2xl font-semibold leading-none text-white tracking-tighter lg:text-3xl">
              <?=$heading ?></p>
              <p class="mt-3 text-base leading-relaxed text-center text-gray-200"><?= $commentDetails ?></p>
              <p class="mt-3 text-base leading-relaxed text-center text-gray-200">Comment by: <?= $username ?></p>

              <div class="w-full mt-6">
                <button onclick="window.location.href='<?= ROOT_DIR ?>account/dashboard/admin/config/publishComment.php?cid=<?= $commentID ?>';" class="flex text-center items-center justify-center w-full pt-4 pr-10 pb-4 pl-10 text-base
                    font-medium text-white rounded-xl transition duration-500 ease-in-out transform
                     focus:outline-none focus:ring-2 focus:ring-offset-2 bg-yellow-500">Publish</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>