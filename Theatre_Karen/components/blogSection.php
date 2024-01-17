<?php 

    

    $blog = $conn->prepare('SELECT 
	
    b.id,
    b.title,
    b.blog_content,
    b.created_on,
    b.img_path,
    b.show_name

   FROM blog b  
   LIMIT 4');

$blog->execute();
$blog->store_result();
$blog->bind_result($blogID, $blogTitle, $blogContent, $blogCreated, $imgPath, $showName);
echo $blogID;
?>
<!-- Product List -->
<section class="py-10 bg-gray-100">
<div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 justify-center capitalize lg:text-4xl dark:text-white">Latest Articles</h1>
</div>
  <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    
  <?php while ($blog->fetch()): ?>

  <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
      
        <div class="relative flex items-end overflow-hidden rounded-xl">
          <img src="<?= ROOT_DIR ?>assets/images/shows/<?= $imgPath ?>" alt="<?= $showName ?>" />
        </div>

        <div class="mt-1 p-2">
          <h2 class="text-slate-700"><?= $blogTitle ?></h2>
          <p class="mt-1 text-sm text-slate-400 blog-content">
            <?= $blogContent ?>
          </p>

          <div class="mt-3 flex items-end justify-between">
            <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
             
            <button onclick="window.location.href='blogDetails/<?= $blogID ?>'" class="text-sm">READ MORE...</button>

            </div>
          </div>
        </div>
      
    </article>
    <?php endwhile ?>
  
</section>
